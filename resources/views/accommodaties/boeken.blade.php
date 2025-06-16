<script>
    window.beschikbaarheden = @json($beschikbaarheden);
</script>

@extends('layouts.app')

@section('content')
    <section class="heroother">
        <div class="heroother-content">
            <h1>Boeken voor {{ $accommodatie->titel }}</h1>
        </div>
    </section>

    <div id="calendar" class="border p-4 rounded mb-6 size-[40rem]"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var beschikbaarheden = window.beschikbaarheden;

            function isWithinAvailability(start, end) {
                // Check if the range falls entirely within a single available period
                return beschikbaarheden.some(function(periode) {
                    return new Date(periode.start) <= start && new Date(periode.end) >= end;
                });
            }

            var calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
                initialView: 'dayGridMonth',
                locale: 'nl',
                firstDay: 1,
                selectable: true,
                select: function(info) {
                    var start = info.start;
                    var end = new Date(info.end);
                    end.setDate(end.getDate() - 1); // FullCalendar's select is exclusive

                    if (isWithinAvailability(start, end)) {
                        // Update hidden fields and displayed dates
                        document.querySelector('input[name="van_datum"]').value = start.toISOString()
                            .split('T')[0];
                        document.querySelector('input[name="tot_datum"]').value = end.toISOString()
                            .split('T')[0];

                        document.getElementById('selected-van-datum').innerText = start.toISOString()
                            .split('T')[0];
                        document.getElementById('selected-tot-datum').innerText = end.toISOString()
                            .split('T')[0];
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
