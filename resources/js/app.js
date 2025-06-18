import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

// document.addEventListener('DOMContentLoaded', () => {
//     const loginTile = document.getElementById('logintile');
//     const registerTile = document.getElementById('registertile');
//     const overlay = document.getElementById('overlay');

//     const loginButton = document.querySelector('.header-button button');
//     const closeLogin = document.getElementById('closelogin');
//     const closeRegister = document.getElementById('closeregister');
//     const showRegister = document.getElementById('showregister');
//     const showLogin = document.getElementById('showlogin');

//     if (loginButton) {
//         loginButton.addEventListener('click', () => {
//             loginTile.style.display = 'block';
//             overlay.style.display = 'block';
//         });
//     }

//     if (closeLogin) {
//         closeLogin.addEventListener('click', () => {
//             loginTile.style.display = 'none';
//             overlay.style.display = 'none';
//         });
//     }

//     if (closeRegister) {
//         closeRegister.addEventListener('click', () => {
//             registerTile.style.display = 'none';
//             overlay.style.display = 'none';
//         });
//     }

//     if (showRegister) {
//         showRegister.addEventListener('click', (e) => {
//             e.preventDefault();
//             loginTile.style.display = 'none';
//             registerTile.style.display = 'block';
//             overlay.style.display = 'block';
//         });
//     }

//     if (showLogin) {
//         showLogin.addEventListener('click', (e) => {
//             e.preventDefault();
//             registerTile.style.display = 'none';
//             loginTile.style.display = 'block';
//             overlay.style.display = 'block';
//         });
//     }

//     if (overlay) {
//         overlay.addEventListener('click', () => {
//             loginTile.style.display = 'none';
//             registerTile.style.display = 'none';
//             overlay.style.display = 'none';
//         });
//     }
// });

// Google Maps API
function initAutocomplete() {
    const input = document.getElementById("bestemming-autocomplete");

    if (!input) {
        console.error(
            "Input element met id 'bestemming-autocomplete' niet gevonden."
        );
        return;
    }

    const autocomplete = new google.maps.places.Autocomplete(input);

    autocomplete.addListener("place_changed", function () {
        const place = autocomplete.getPlace();

        if (!place.geometry) {
            console.log("Geen details gevonden voor de locatie.");
            return;
        }

        const lat = place.geometry.location.lat();
        const lng = place.geometry.location.lng();
        const address = place.formatted_address;
        const placeId = place.place_id;
        const types = place.types?.join(", ");

        // Print in de console
        console.log("Adres:", address);
        console.log("Latitude:", lat);
        console.log("Longitude:", lng);
        console.log("Place ID:", placeId);
        console.log("Types:", types);
    });
}

window.initAutocomplete = initAutocomplete;

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

document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelector('.carousel-slides');
    if (!slides) return; // als er geen carousel is, doe niks
    const slideCount = slides.children.length;
    let currentIndex = 0;

    function updateCarousel() {
        slides.style.transform = `translateX(-${currentIndex * 100}%)`;
    }

    document.querySelector('.carousel-prev').addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + slideCount) % slideCount;
        updateCarousel();
    });

    document.querySelector('.carousel-next').addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % slideCount;
        updateCarousel();
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const track = document.querySelector('.carousel-track');
    const slides = Array.from(track.children);
    const nextButton = document.querySelector('.carousel-btn.next');
    const prevButton = document.querySelector('.carousel-btn.prev');
    const slideWidth = slides[0].getBoundingClientRect().width;

    // Zet slides op juiste positie
    slides.forEach((slide, index) => {
        slide.style.left = slideWidth * index + 'px';
    });

    let currentIndex = 0;

    function moveToSlide(targetIndex) {
        const amountToMove = slides[targetIndex].style.left;
        track.style.transform = 'translateX(-' + amountToMove + ')';
        currentIndex = targetIndex;
    }

    nextButton.addEventListener('click', () => {
        const targetIndex = (currentIndex + 1) % slides.length;
        moveToSlide(targetIndex);
    });

    prevButton.addEventListener('click', () => {
        const targetIndex = (currentIndex - 1 + slides.length) % slides.length;
        moveToSlide(targetIndex);
    });
});
