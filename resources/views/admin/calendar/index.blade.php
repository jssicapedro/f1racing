@extends('layout.layout')

@section('title', 'F1Racing')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<style>
    .content {
        flex-direction: column;
    }

    #calendar {
        width: 90%;
        height: 80vh;
    }

    a {
        color: var(--default_color) !important;
    }

    button.fc-today-button.fc-button.fc-button-primary {
        background-color: var(--default_red);
    }

    .fc .fc-button-primary {
        background-color: var(--default_gray);
        border-color: var(--default_grayA);
        color: var(--default_white);
    }

    .fc .fc-button-primary:disabled {
        background-color: var(--default_gray);
        border-color: var(--default_grayA);
        color: var(--default_white);
    }

    .fc .fc-button-primary:hover {
        background-color: var(--default_red);
        border-color: var(--default_grayA);
        color: var(--default_white);
    }

    .fc .fc-daygrid-day.fc-day-today {
        background-color: var(--default_redA) !important;
    }


    .fc-scroller {
        scrollbar-width: none;
        -ms-overflow-style: none;
    }

    .fc-scroller::-webkit-scrollbar {
        display: none;
    }

    a.fc-event.fc-event-start.fc-event-end.fc-event-past.fc-daygrid-event.fc-daygrid-dot-event,
    .fc-direction-ltr .fc-daygrid-event.fc-event-end,
    .fc-direction-rtl .fc-daygrid-event.fc-event-start {
        margin-bottom: 10px;
        border-left: 5px solid var(--default_red);
        background: var(--default_white);
        padding: 5px;
    }
</style>
@push('links')

@endpush

@push('scripts')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js'></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'en',
            events: @json($events),
            eventContent: function(arg) {
                // Add 'h' to the end of the start time
                var startTime = arg.event.start;
                var formattedTime = startTime.toLocaleTimeString([], {
                    hour: '2-digit',
                    minute: '2-digit'
                }) + 'h';
                var title = arg.event.title;

                return {
                    html: `<div class="fc-event-time">${formattedTime}</div><div class="fc-event-title">${title}</div>`
                };
            },
            eventClick: function(info) {
                var eventId = info.event.id; // Certifique-se de que isso retorna o ID correto
                window.location.href = '/wp-admin/calendar/' + eventId;
            },
        });
        calendar.render();
    });
</script>
@endpush


@section('main')
@include('admin.partials.admin-navbar')
<div class="content">
    <h1>Calendar</h1>
    <div id="calendar">

    </div>
</div>
@endsection