    @extends('layouts.app')

    @section('content')
        <section class="heroother">
            <div class="heroother-content">
                <h1 class="fade-in">Accommodatie aanmaken</h1>
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
                        <div class="flex flex-wrap">
                            @foreach ($voorzieningen as $voorziening)
                                <div class="w-1/2 flex items-center mb-2">
                                    <input type="checkbox" name="voorzieningen[]" value="{{ $voorziening->id }}"
                                        {{ in_array($voorziening->id, old('voorzieningen', [])) ? 'checked' : '' }}
                                        class="mr-2">
                                    <span>{{ $voorziening->naam }}</span>
                                </div>
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
        </div>
    @endsection
