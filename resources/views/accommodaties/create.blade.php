<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Beneluxe</title>
    <link rel="icon" type="image/x-icon" href="img/Favicon.png">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Flag icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.3.2/css/flag-icons.min.css" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB3QTFxyf8eFM1-O3P3ELImq3ILRx2RTCg&libraries=places">
    </script>
    <script>
        function initAutocomplete() {
            const input = document.getElementById("bestemming-autocomplete");
            const autocomplete = new google.maps.places.Autocomplete(input);

            autocomplete.addListener("place_changed", function() {
                const place = autocomplete.getPlace();

                if (!place.geometry) {
                    console.log("Geen details gevonden voor de locatie.");
                    return;
                }

                const lat = place.geometry.location.lat();
                const lng = place.geometry.location.lng();
                const address = place.formatted_address;
                const placeId = place.place_id;
                const types = place.types.join(", ");

                // Print naar console
                console.log("Adres:", address);
                console.log("Latitude:", lat);
                console.log("Longitude:", lng);
                console.log("Place ID:", placeId);
                console.log("Types:", types);
            });
        }

        window.onload = initAutocomplete;
    </script>
</head>

<body>

    @extends('layouts.app')

    @section('content')
        <section class="heroother">
            <div class="heroother-content">
                <h1>Accommodatie aanmaken</h1>
            </div>
        </section>
        <div class="about">
            <div class="container mx-auto max-w-xl py-6">
                <h1 class="text-2xl font-bold mb-4">Nieuw accommodatie Aanmaken</h1>

                @if ($errors->any())
                    <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                        <strong>Fouten gevonden:</strong>
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('accommodaties.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-medium">Titel</label>
                        <input type="text" name="titel" class="w-full border rounded p-2" value="{{ old('titel') }}">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Beschrijving</label>
                        <textarea name="beschrijving" class="w-full border rounded p-2">{{ old('beschrijving') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Locatie</label>
                        <input type="text" name="locatie" class="w-full border rounded p-2" value="{{ old('locatie') }}">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Aantal bedden</label>
                        <input type="number" name="aantal_bedden" class="w-full border rounded p-2"
                            value="{{ old('aantal_bedden') }}">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Aantal badkamers</label>
                        <input type="number" name="aantal_badkamers" class="w-full border rounded p-2"
                            value="{{ old('aantal_badkamers') }}">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Aantal personen</label>
                        <input type="number" name="aantal_personen" class="w-full border rounded p-2"
                            value="{{ old('aantal_personen') }}">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Prijs per nacht (€)</label>
                        <input type="number" step="0.01" name="prijs_per_nacht" class="w-full border rounded p-2"
                            value="{{ old('prijs_per_nacht') }}">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-2">Voorzieningen</label>
                        <div class="grid grid-cols-2 gap-2">
                            @foreach ($voorzieningen as $voorziening)
                                <label class="flex items-center">
                                    <input type="checkbox" name="voorzieningen[]" value="{{ $voorziening->id }}"
                                        {{ in_array($voorziening->id, old('voorzieningen', [])) ? 'checked' : '' }}>
                                    <span class="ml-2">{{ $voorziening->naam }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Foto upload en preview -->
                    <div id="photo-upload-area" class="mb-6">
                        <label class="block font-medium mb-2">Foto's uploaden (sleep om te sorteren)</label>
                        <input type="file" name="fotos[]" multiple id="fotos-input"
                            class="w-full border rounded p-2 mb-2">
                        <input type="hidden" name="foto_volgorde" id="foto_volgorde">
                        <ul id="photo-preview-list" class="space-y-2"></ul>
                    </div>

                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Opslaan</button>
                </form>
            </div>

            <script>
                const input = document.getElementById('fotos-input');
                const previewList = document.getElementById('photo-preview-list');
                const fotoVolgordeInput = document.getElementById('foto_volgorde');
                let fileList = [];

                input.addEventListener('change', () => {
                    fileList = [...input.files];
                    renderPreview();
                });

                function renderPreview() {
                    previewList.innerHTML = '';
                    fileList.forEach((file, index) => {
                        const li = document.createElement('li');
                        li.className = 'flex items-center gap-4 bg-gray-100 p-2 rounded';
                        li.dataset.index = index;

                        const reader = new FileReader();
                        reader.onload = (e) => {
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.className = 'w-20 h-20 object-cover rounded';

                            const deleteBtn = document.createElement('button');
                            deleteBtn.textContent = '✕';
                            deleteBtn.className = 'text-red-500 text-lg ml-auto';
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
                    const order = [...previewList.children].map(li => li.dataset.index);
                    fotoVolgordeInput.value = order.join(',');
                }

                new Sortable(previewList, {
                    animation: 150,
                    onEnd: updateOrder
                });
            </script>
        </div>
    @endsection
</body>

</html>
