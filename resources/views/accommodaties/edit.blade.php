@extends('layouts.app')

@section('content')
    <section class="heroother">
        <div class="heroother-content">
            <h1>Accommodatie aanpassen</h1>
        </div>
    </section>

    <div class="about py-6">
        <div class="container mx-auto max-w-xl">

            <h1 class="text-2xl font-bold mb-4">Accommodatie bewerken</h1>

            {{-- Validatiefouten --}}
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

            {{-- Formulier --}}
            <form method="POST" action="{{ route('accommodaties.update', $accommodatie) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Titel --}}
                <div class="mb-4">
                    <label class="block font-medium">Titel</label>
                    <input type="text" name="titel" class="w-full border rounded p-2"
                        value="{{ old('titel', $accommodatie->titel) }}" />
                </div>

                {{-- Beschrijving --}}
                <div class="mb-4">
                    <label class="block font-medium">Beschrijving</label>
                    <textarea name="beschrijving" class="w-full border rounded p-2">{{ old('beschrijving', $accommodatie->beschrijving) }}</textarea>
                </div>

                {{-- Locatie --}}
                <div class="mb-4">
                    <label class="block font-medium">Locatie</label>
                    <input type="text" name="locatie" class="w-full border rounded p-2"
                        value="{{ old('locatie', $accommodatie->locatie) }}" />
                </div>

                {{-- Aantal bedden, badkamers, personen --}}
                <div class="mb-4">
                    <label class="block font-medium">Aantal bedden</label>
                    <input type="number" name="aantal_bedden" class="w-full border rounded p-2"
                        value="{{ old('aantal_bedden', $accommodatie->aantal_bedden) }}" />
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Aantal badkamers</label>
                    <input type="number" name="aantal_badkamers" class="w-full border rounded p-2"
                        value="{{ old('aantal_badkamers', $accommodatie->aantal_badkamers) }}" />
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Aantal personen</label>
                    <input type="number" name="aantal_personen" class="w-full border rounded p-2"
                        value="{{ old('aantal_personen', $accommodatie->aantal_personen) }}" />
                </div>

                {{-- Prijs --}}
                <div class="mb-4">
                    <label class="block font-medium">Prijs per nacht (€)</label>
                    <input type="number" step="0.01" name="prijs_per_nacht" class="w-full border rounded p-2"
                        value="{{ old('prijs_per_nacht', $accommodatie->prijs_per_nacht) }}" />
                </div>

                {{-- Voorzieningen --}}
                <div class="mb-4">
                    <label class="block font-medium mb-2">Voorzieningen</label>
                    <div class="grid grid-cols-2 gap-2">
                        @foreach ($voorzieningen as $voorziening)
                            <label class="flex items-center">
                                <input type="checkbox" name="voorzieningen[]" value="{{ $voorziening->id }}"
                                    {{ in_array($voorziening->id, old('voorzieningen', $accommodatie->voorzieningen->pluck('id')->toArray())) ? 'checked' : '' }}>
                                <span class="ml-2">{{ $voorziening->naam }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                {{-- Bestaande foto's --}}
                @if ($accommodatie->fotos->count())
                    <div class="mb-6">
                        <label class="block font-medium mb-2">Bestaande foto's (versleep om te sorteren, klik ✕ om te verwijderen)</label>
                        <input type="hidden" name="bestaande_foto_volgorde" id="bestaande_foto_volgorde">
                        <ul id="bestaande-foto-lijst" class="space-y-2">
                            @foreach ($accommodatie->fotos->sortBy('volgorde') as $foto)
                                <li data-id="{{ $foto->id }}" class="relative border rounded overflow-hidden group bg-white p-1">
                                    <img src="{{ asset('storage/' . $foto->foto_url) }}" alt="Foto {{ $loop->iteration }}"
                                        class="w-full h-32 object-cover transition-opacity duration-300" />
                                    <button type="button"
                                        class="absolute top-1 right-1 bg-red-600 text-white rounded px-2 py-1 text-sm opacity-75 hover:opacity-100"
                                        onclick="toggleDelete(this)" title="Verwijderen">
                                        ✕
                                    </button>
                                    <input type="checkbox" name="verwijder_fotos[]" value="{{ $foto->id }}" class="hidden" />
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Nieuwe foto's uploaden --}}
                <div id="photo-upload-area" class="mb-6">
                    <label class="block font-medium mb-2">Nieuwe foto's uploaden (sleep om te sorteren)</label>
                    <input type="file" name="fotos[]" multiple id="fotos-input" class="w-full border rounded p-2 mb-2" />
                    <input type="hidden" name="foto_volgorde" id="foto_volgorde" />
                    <ul id="photo-preview-list" class="space-y-2"></ul>
                </div>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Opslaan</button>
            </form>

            {{-- Beschikbaarheid --}}
            <div class="mt-10">
                <h4 class="mb-3 font-semibold">Beschikbare periodes toevoegen</h4>

                <form method="POST" action="{{ route('accommodaties.beschikbaarheid.toevoegen', $accommodatie->id) }}" class="flex flex-wrap gap-4 mb-4">
                    @csrf
                    <div>
                        <label for="van_datum" class="block">Van</label>
                        <input type="date" name="van_datum" class="form-control border rounded p-2" required>
                    </div>
                    <div>
                        <label for="tot_datum" class="block">Tot</label>
                        <input type="date" name="tot_datum" class="form-control border rounded p-2" required>
                    </div>
                    <div class="flex items-end">
                        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Toevoegen</button>
                    </div>
                </form>

                <h5 class="mb-2 font-semibold">Huidige periodes</h5>
                <table class="table-auto w-full border">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="p-2">Van</th>
                            <th class="p-2">Tot</th>
                            <th class="p-2">Actie</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($accommodatie->beschikbaarheden ?? [] as $periode)
                            <tr class="border-t">
                                <td class="p-2">{{ $periode->van_datum }}</td>
                                <td class="p-2">{{ $periode->tot_datum }}</td>
                                <td class="p-2">
                                    <form method="POST" action="{{ route('accommodaties.beschikbaarheid.verwijderen', $periode->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800"
                                            onclick="return confirm('Weet je zeker dat je deze periode wilt verwijderen?')">🗑</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="p-2 text-center text-gray-500">Er zijn nog geen periodes toegevoegd.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    {{-- Sortable.js & Foto preview scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
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
                    updateNewOrder();
                };
                reader.readAsDataURL(file);
            });
        }

        function updateNewOrder() {
            const order = [...previewList.children].map(li => li.dataset.index);
            fotoVolgordeInput.value = order.join(',');
        }

        new Sortable(previewList, {
            animation: 150,
            onEnd: updateNewOrder
        });

        const bestaandeLijst = document.getElementById('bestaande-foto-lijst');
        const bestaandeVolgordeInput = document.getElementById('bestaande_foto_volgorde');

        if (bestaandeLijst) {
            new Sortable(bestaandeLijst, {
                animation: 150,
                onEnd: updateBestaandeOrder
            });

            function updateBestaandeOrder() {
                const ids = [...bestaandeLijst.children].map(li => li.dataset.id);
                bestaandeVolgordeInput.value = ids.join(',');
            }

            updateBestaandeOrder(); // initieel invullen
        }

        function toggleDelete(button) {
            const li = button.closest('li');
            const checkbox = li.querySelector('input[type="checkbox"]');
            checkbox.checked = !checkbox.checked;

            li.classList.toggle('opacity-50', checkbox.checked);
            li.classList.toggle('bg-red-100', checkbox.checked);
            button.classList.toggle('bg-red-600', !checkbox.checked);
            button.classList.toggle('bg-gray-400', checkbox.checked);
            button.textContent = checkbox.checked ? '✔' : '✕';
        }
    </script>
@endsection
