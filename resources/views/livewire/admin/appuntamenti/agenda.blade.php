<div >
    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-4">
        <div class="flex justify-between">
            <h2 class="font-semibold text-center text-xl mb-4">Agenda - {{auth()->user()->name}}</h2>
        </div>
        <div id='calendar'></div>
    </div>
</div>

@script
<script>
        let calendarEl = document.getElementById('calendar');
        let calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridWeek',
            slotMinTime: '09:00',
            slotMaxTime: '20:00',
            slotLabelFormat:{
                hour: 'numeric',
                minute: '2-digit',
            },
            firstDay: 1,
            locale:'it',
            buttonText:{
                today:    'oggi',
            },
            selectable:true,
            editable:true,

            eventDrop: function(info) {
                $wire.dispatchSelf('spostaEvento', { evento: info.event });
            },

            events: @json($events)

            /*events:
                [
                    {"client_id":5,"start":"2024-06-12 18:00:00","title":"ciao","allDay":false},
                    {"client_id":5,"start":"2024-06-12 16:00:00","title":"ciao","allDay":false},
                    {"client_id":5,"start":"2024-06-12 10:00:00","title":"ciao","allDay":false}
                ]*/
        });

        calendar.render();

</script>
@endscript
