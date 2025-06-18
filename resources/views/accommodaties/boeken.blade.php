<script>
    window.beschikbaarheden = json($beschikbaarheden);
</script>

@extends('layouts.app')

@section('content')
    <section class="heroother">
        <div class="heroother-content">
            <h1 class="fade-in">Boeken voor {{ $accommodatie->titel }}</h1>
        </div>
    </section>

    <div id="calendar" class="border p-4 rounded mb-6 size-[40rem]"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var beschikbaarheden = window.beschikbaarheden;

            function toUTC(date) {
                return new Date(Date.UTC(date.getFullYear(), date.getMonth(), date.getDate()));
            }

            function isWithinAvailability(start, lastNight) {
                return beschikbaarheden.some(function(periode) {
                    return new Date(periode.start) <= start && lastNight < new Date(periode.end);
                });
            }

            var calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
                initialView: 'dayGridMonth',
                locale: 'nl',
                firstDay: 1,
                selectable: true,
                select: function(info) {
                    var start = toUTC(info.start);
                    var end = toUTC(info.end);
                    var lastNight = new Date(end);
                    lastNight.setUTCDate(end.getUTCDate() - 1);

                    if (isWithinAvailability(start, lastNight)) {
                        // Update hidden fields and displayed dates
                        document.querySelector('input[name="van_datum"]').value = start.toISOString().split('T')[0];
                        document.querySelector('input[name="tot_datum"]').value = lastNight.toISOString().split('T')[0];
                        document.getElementById('selected-van-datum').innerText = start.toISOString().split('T')[0];
                        document.getElementById('selected-tot-datum').innerText = lastNight.toISOString().split('T')[0];
                    } else {
                        alert('De geselecteerde periode is helaas niet beschikbaar');
                    }
                },
                events: beschikbaarheden
            });

            calendar.render();
        });
    </script>

    <form action="{{ route('boeken.store') }}" method="POST">
        @csrf
        <input type="hidden" name="accommodatie_id" value="{{ $accommodatie->id }}">
        <input type="hidden" name="van_datum">
        <input type="hidden" name="tot_datum">
        <p>Geselecteerde aankomstdatum: <span id="selected-van-datum"></span></p>
        <p>Geselecteerde vertrekdatum: <span id="selected-tot-datum"></span></p>

        <button type="submit" class="bg-blue-600 text-white p-2 rounded">
            Boek nu
        </button>
    </form>
@endsection
