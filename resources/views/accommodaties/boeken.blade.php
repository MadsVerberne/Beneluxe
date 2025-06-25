<script>
    window.beschikbaarheden = @json($beschikbaarheden);
    window.boekingen = @json($boekingen);
</script>

<style>
    /* ❌ Niet beschikbaar: grijs */
    .fc-day-disabled {
        background-color: #e5e7eb !important;
        cursor: not-allowed;
        opacity: 0.5;
    }

    /* ✅ Vandaag: zachte groene achtergrond + groene rand */
    .fc-day-today {
        background-color: #e5e7eb !important;
    }

    /* ✅ Beschikbare dagen: groen */
    .fc-day-available {
        background-color: #d1fae5 !important;
    }

    .fc-highlight {
        background-color: rgba(16, 185, 129, 0.3);
        /* emerald-500, 30% opacity */
    }

    /* ✅ Geselecteerde (gesleepte) periode: zachte emerald kleur */
    .fc-highlight {
        background-color: rgba(16, 185, 129, 0.3) !important;
    }

    .fc-day-booked {
        background-color: transparent !important;
        position: relative;
    }

    .fc-day-booked::after {
        content: '✗';
        color: white;
        font-weight: 900;
        font-size: 1.6rem;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        pointer-events: none;
        user-select: none;
        z-index: 10;
        background-color: rgba(255, 0, 0, 0.85);
        border-radius: 50%;
        padding: 4px 7px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
        line-height: 1;
        text-align: center;
        width: 28px;
        height: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

@extends('layouts.app')

@section('content')
    <section class="heroother">
        <div class="heroother-content">
            <h1 class="fade-in">Boeken voor {{ $accommodatie->titel }}</h1>
        </div>
    </section>

    <div class="boeken">
        <div id="calendar" class="border p-4 rounded mb-6 size-[40rem]"></div>

        <form action="{{ route('boeken.store') }}" method="POST" class="formboeken">
            @csrf
            <input type="hidden" name="accommodatie_id" value="{{ $accommodatie->id }}">
            <input type="hidden" name="van_datum">
            <input type="hidden" name="tot_datum">
            <p>Geselecteerde aankomstdatum: <span id="selected-van-datum"></span></p>
            <p>Geselecteerde vertrekdatum: <span id="selected-tot-datum"></span></p>
            <button type="submit">Boek nu</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const beschikbaarheden = window.beschikbaarheden;

            function toUTC(date) {
                return new Date(Date.UTC(date.getFullYear(), date.getMonth(), date.getDate()));
            }

            function isWithinAvailability(start, lastNight) {
                return beschikbaarheden.some(function(periode) {
                    return new Date(periode.start) <= start && lastNight < new Date(periode.end);
                });
            }

            function isNotBooked(start, lastNight) {
                return !window.boekingen.some(function(boeking) {
                    const boekStart = new Date(boeking.start);
                    const boekEnd = new Date(boeking.end); // exclusief

                    return start < boekEnd && lastNight >= boekStart;
                });
            }

            function generateUnavailableRanges(beschikbaarheden, startDate, endDate) {
                const allDays = [];
                const oneDay = 1000 * 60 * 60 * 24;
                let date = new Date(startDate);

                while (date <= endDate) {
                    const iso = date.toISOString().split('T')[0];
                    const isAvailable = beschikbaarheden.some(periode => {
                        const start = new Date(periode.start);
                        const end = new Date(periode.end);
                        return date >= start && date < end;
                    });

                    if (!isAvailable) {
                        allDays.push({
                            start: iso,
                            end: iso,
                            display: 'background',
                            color: '#e5e7eb'
                        });
                    }

                    date = new Date(date.getTime() + oneDay);
                }

                return allDays;
            }

            function generateAvailableRanges(beschikbaarheden) {
                const availableDays = [];
                const oneDay = 1000 * 60 * 60 * 24;

                beschikbaarheden.forEach(periode => {
                    let current = new Date(periode.start);
                    const end = new Date(periode.end);

                    while (current < end) {
                        const startISO = current.toISOString().split('T')[0];
                        const nextDay = new Date(current.getTime() + oneDay);
                        const endISO = nextDay.toISOString().split('T')[0];

                        availableDays.push({
                            start: startISO,
                            end: endISO,
                            display: 'background',
                            allDay: true,
                            classNames: ['fc-day-available']
                        });

                        current = nextDay;
                    }
                });

                return availableDays;
            }

            // Nieuwe functie om per geboekte dag een event te maken met kruisje
            function generateBookedDayEvents(boekingen) {
                const oneDay = 1000 * 60 * 60 * 24;
                let bookedEvents = [];

                boekingen.forEach(boeking => {
                    let current = new Date(boeking.start);
                    const end = new Date(boeking.end); // exclusief

                    while (current < end) {
                        const dateISO = current.toISOString().split('T')[0];
                        bookedEvents.push({
                            title: '', // geen tekst zichtbaar
                            start: dateISO,
                            allDay: true,
                            display: 'background',
                            classNames: ['fc-day-booked']
                        });
                        current = new Date(current.getTime() + oneDay);
                    }
                });

                return bookedEvents;
            }

            function markAvailableDays(calendarEl, beschikbaarheden) {
                const cells = calendarEl.querySelectorAll('.fc-daygrid-day');
                cells.forEach(cell => {
                    const dateStr = cell.getAttribute('data-date');
                    const date = new Date(dateStr);
                    const isAvailable = beschikbaarheden.some(periode => {
                        const start = new Date(periode.start);
                        const end = new Date(periode.end);
                        return date >= start && date < end;
                    });

                    if (isAvailable) {
                        cell.classList.add('fc-day-available');
                    }
                });
            }

            const today = new Date();
            const farFuture = new Date();
            farFuture.setFullYear(today.getFullYear() + 2);

            const calendarEl = document.getElementById('calendar');

            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'nl',
                firstDay: 1,
                selectable: true,
                selectMirror: true,
                select: function(info) {
                    const start = toUTC(info.start);
                    const end = toUTC(info.end);
                    const lastNight = new Date(end);
                    lastNight.setUTCDate(end.getUTCDate() - 1);

                    if (!isWithinAvailability(start, lastNight)) {
                        alert('De geselecteerde periode is helaas niet beschikbaar.');
                    } else if (!isNotBooked(start, lastNight)) {
                        alert('De geselecteerde periode overlapt met een bestaande boeking.');
                    } else {
                        document.querySelector('input[name="van_datum"]').value = start.toISOString()
                            .split('T')[0];
                        document.querySelector('input[name="tot_datum"]').value = lastNight
                            .toISOString().split('T')[0];
                        document.getElementById('selected-van-datum').innerText = start.toISOString()
                            .split('T')[0];
                        document.getElementById('selected-tot-datum').innerText = lastNight
                            .toISOString().split('T')[0];
                    }
                },
                headerToolbar: {
                    left: 'prev,next',
                    center: 'title',
                    right: ''
                },
                events: [
                    // ❌ Niet-beschikbare dagen (lichtgrijs)
                    ...generateUnavailableRanges(beschikbaarheden, today, farFuture),

                    // ✅ Beschikbare dagen (lichtgroen)
                    ...generateAvailableRanges(beschikbaarheden),

                    // ❌ Geboekte dagen, per dag een kruisje
                    ...generateBookedDayEvents(window.boekingen)
                ],

                datesSet: function() {
                    markAvailableDays(calendarEl, beschikbaarheden);
                }
            });

            calendar.render();
        });
    </script>
@endsection
