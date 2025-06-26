import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

// Google Maps API
window.initAutocomplete = function () {
    const input = document.getElementById("bestemming-autocomplete");
    if (!input) return;

    const autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.addListener("place_changed", () => {
        const place = autocomplete.getPlace();
        if (!place.geometry) return;
        console.log("Adres:", place.formatted_address);
        console.log("Lat:", place.geometry.location.lat());
        console.log("Lng:", place.geometry.location.lng());
    });
};

function loadGoogleMaps() {
    if (document.getElementById("google-maps-script")) return;

    const script = document.createElement("script");
    script.id = "google-maps-script";
    script.src =
        "https://maps.googleapis.com/maps/api/js?key=AIzaSyB3QTFxyf8eFM1-O3P3ELImq3ILRx2RTCg&libraries=places&callback=initAutocomplete";
    script.async = true;
    script.defer = true;
    document.head.appendChild(script);
}

// Load it after DOM ready
document.addEventListener("DOMContentLoaded", loadGoogleMaps);

//Fotos opslaan en sorteren
document.addEventListener("DOMContentLoaded", () => {
    const input = document.getElementById("fotos-input");
    const previewList = document.getElementById("photo-preview-list");
    const fotoVolgordeInput = document.getElementById("foto_volgorde");
    let fileList = [];

    if (input && previewList && fotoVolgordeInput) {
        // Check of de elementen bestaan op deze pagina
        input.addEventListener("change", () => {
            fileList = Array.from(input.files);
            renderPreview();
        });

        function renderPreview() {
            previewList.innerHTML = "";
            fileList.forEach((file, index) => {
                const li = document.createElement("li");
                li.className =
                    "flex items-center gap-4 bg-gray-100 p-2 rounded";
                li.dataset.index = index;

                const reader = new FileReader();
                reader.onload = (e) => {
                    const img = document.createElement("img");
                    img.src = e.target.result;
                    img.className = "w-20 h-20 object-cover rounded";

                    const deleteBtn = document.createElement("button");
                    deleteBtn.textContent = "✕";
                    deleteBtn.className = "text-red-500 text-lg ml-auto";
                    deleteBtn.onclick = () => {
                        fileList.splice(index, 1);
                        renderPreview();
                    };

                    li.appendChild(img);
                    li.appendChild(deleteBtn);
                    previewList.appendChild(li);
                    updateOrder();
                };
                reader.readAsDataURL(file);
            });
        }

        function updateOrder() {
            const order = Array.from(previewList.children).map(
                (li) => li.dataset.index
            );
            fotoVolgordeInput.value = order.join(",");
        }

        new Sortable(previewList, {
            animation: 150,
            onEnd: updateOrder,
        });
    }
});

// Sortable voor bestaande foto’s
document.addEventListener("DOMContentLoaded", () => {
    const bestaandeLijst = document.getElementById("bestaande-foto-lijst");
    const bestaandeVolgorde = document.getElementById(
        "bestaande_foto_volgorde"
    );

    if (bestaandeLijst) {
        new Sortable(bestaandeLijst, {
            animation: 150,
            onEnd: () => {
                const ids = [...bestaandeLijst.children].map(
                    (li) => li.dataset.id
                );
                bestaandeVolgorde.value = ids.join(",");
            },
        });

        // Initialiseer de volgorde bij het laden
        const ids = [...bestaandeLijst.children].map((li) => li.dataset.id);
        bestaandeVolgorde.value = ids.join(",");
    }
});

// Verwijderen foto’s
window.toggleDelete = function (button) {
    const li = button.closest("li");
    const checkbox = li.querySelector('input[type="checkbox"]');
    checkbox.checked = !checkbox.checked;

    li.classList.toggle("opacity-50", checkbox.checked);
    li.classList.toggle("bg-red-100", checkbox.checked);
    button.classList.toggle("bg-red-600", !checkbox.checked);
    button.classList.toggle("bg-gray-400", checkbox.checked);
    button.textContent = checkbox.checked ? "✔" : "✕";
};
document.addEventListener("DOMContentLoaded", () => {
    // CAROUSEL
    const track = document.querySelector(".carousel-track");
    const slides = Array.from(track.children);
    const nextButton = document.querySelector(".carousel-btn.next");
    const prevButton = document.querySelector(".carousel-btn.prev");
    const currentDisplay = document.getElementById("carousel-current");
    const totalDisplay = document.getElementById("carousel-total");

    let currentIndex = 0;
    totalDisplay.textContent = slides.length;

    function updateCarousel() {
        const slideWidth = slides[0].getBoundingClientRect().width;
        track.style.transform =
            "translateX(-" + slideWidth * currentIndex + "px)";
        currentDisplay.textContent = currentIndex + 1;
    }

    nextButton.addEventListener("click", () => {
        currentIndex = (currentIndex + 1) % slides.length;
        updateCarousel();
    });

    prevButton.addEventListener("click", () => {
        currentIndex = (currentIndex - 1 + slides.length) % slides.length;
        updateCarousel();
    });

    updateCarousel();

    /* Lightbox */
    const lightbox = document.getElementById("lightbox");
    const lightboxImg = lightbox.querySelector(".lightbox-img");
    const closeBtn = document.getElementById("lightbox-close");
    const prevBtn = document.getElementById("lightbox-prev");
    const nextBtn = document.getElementById("lightbox-next");
    const lightboxCounter = document.getElementById("lightbox-counter");

    const imgSlides = document.querySelectorAll(".carousel-slide img");
    let lightboxIndex = 0;

    function updateLightboxImage() {
        lightboxImg.src = imgSlides[lightboxIndex].src;
        lightboxImg.alt = imgSlides[lightboxIndex].alt;
        lightboxCounter.textContent = `${lightboxIndex + 1} / ${
            imgSlides.length
        }`;
    }

    function openLightbox(index) {
        lightboxIndex = index;
        lightbox.style.display = "flex";
        updateLightboxImage();
    }

    function closeLightbox() {
        lightbox.style.display = "none";
    }

    function showPrev() {
        lightboxIndex =
            (lightboxIndex - 1 + imgSlides.length) % imgSlides.length;
        updateLightboxImage();
    }

    function showNext() {
        lightboxIndex = (lightboxIndex + 1) % imgSlides.length;
        updateLightboxImage();
    }

    imgSlides.forEach((img, index) => {
        img.addEventListener("click", () => {
            openLightbox(index);
        });
    });

    closeBtn.addEventListener("click", closeLightbox);
    prevBtn.addEventListener("click", showPrev);
    nextBtn.addEventListener("click", showNext);

    document.addEventListener("keydown", (e) => {
        if (lightbox.style.display === "flex") {
            if (e.key === "Escape") closeLightbox();
            if (e.key === "ArrowLeft") showPrev();
            if (e.key === "ArrowRight") showNext();
        }
    });
});

/* Telefoon menu */
document.addEventListener("DOMContentLoaded", function () {
  const navToggle = document.querySelector(".nav-toggle");
  const nav = document.querySelector(".nav");

  navToggle.addEventListener("click", () => {
    nav.classList.toggle("active");
  });
});
