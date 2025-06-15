    @extends('layouts.app')

    @section('content')
        <section class="heroother">
            <div class="heroother-content">
                <h1>Boeken</h1>
            </div>
        </section>
        {{-- Beschikbaarheid --}}
        <div class="mt-10">
            <h4 class="mb-3 font-semibold">Beschikbare periodes toevoegen</h4>

            <form method="POST" class="flex flex-wrap gap-4 mb-4">
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
                    <button type="submit"
                        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Toevoegen</button>
                </div>
            </form>
            <div id="calendar" class="border p-4 rounded mb-6 size-[40rem]"></div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    locale: 'nl',
                    firstDay: 1,
                    selectable: true,
                    select: function(info) {
                        document.querySelector('input[name="van_datum"]').value = info.startStr;
                        document.querySelector('input[name="tot_datum"]').value = new Date(info.end)
                            .toISOString().split('T')[0];
                    },
                    headerToolbar: {
                        left: '',
                        center: 'title',
                        right: 'prev,next'
                    },
                    events: window.beschikbaarheden,
                });
                calendar.render();
            });
        </script>
    @endsection
