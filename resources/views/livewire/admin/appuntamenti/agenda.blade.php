<div>
    @if($showModalTypeAppointment)
        <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <form wire:submit="salvaAppuntamento">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Appuntamento per il {{$dataTimeAppointmentSelected}}</h3>
                                <div class="mt-2">

                                        <div class="grid gap-6 mb-6 md:grid-cols-1">
                                            <div class="mt-2">
                                                <div class="sm:col-span-3 mt-4">
                                                    <label for="appointment_type_id" class="block text-sm font-medium leading-6 text-gray-900">Tipo Appuntamento</label>
                                                    <div class="mt-1">
                                                        <select id="appointment_type_id" wire:model="appointment_type_id" autocomplete="country-name"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                                            <option selected></option>
                                                            @foreach($listaTipiAppuntamenti as $tipoAppuntamento)
                                                                <option value="{{$tipoAppuntamento->id}}">{{$tipoAppuntamento->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-span-full mt-2">
                                                    <label for="note" class="block text-sm font-medium leading-6 text-gray-900">Note</label>
                                                    <div class="mt-1">
                                                        <textarea id="note" wire:model="note" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button type="submit" class="inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto">Salva Appuntamento</button>
                        <button type="button" wire:click="cancelPrenotaAppuntamento" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-4">
        <div class="flex justify-between mb-4">
            <h2 class="font-semibold text-center text-xl mb-4">Agenda - {{auth()->user()->name}}</h2>
            <a href="{{route('admin.clienti', $client->shop_id)}}" wire:navigate
               class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-2 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-3.5 text-center me-2 mb-2">
                indietro
            </a>
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
            nowIndicator: true,
            height:700,
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

            dateClick: function(info) {
             //   alert('Clicked on: ' + info.dateStr);
                $wire.dispatchSelf('dataTimeSelected', { dataOra: info.dateStr });
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
