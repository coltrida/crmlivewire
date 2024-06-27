<div>

    @if($showProgrammaTelefonata)
        <form wire:submit="salvaTelefonataProgrammata">
            <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

                <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                        <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-xl">
                            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                        </svg>
                                    </div>
                                    <div class="mt-3 w-full mr-8 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                        <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Programma Telefonata Futura</h3>
                                        <div class="mt-2">

                                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                                                <div class="m-4">
                                                    <label>Giorno:</label>
                                                    <div class="relative">
                                                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                            </svg>
                                                        </div>
                                                        <input wire:model="recallDate" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start">
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="m-4">
                                                    <label for="time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select time:</label>
                                                    <div class="relative">
                                                        <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                                                            </svg>
                                                        </div>
                                                        <input type="time" wire:model="recallTime"
                                                               list="avail"
                                                               autocomplete="given-name"
                                                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                        <datalist id="avail">
                                                            <option value="09:00">
                                                            <option value="09:30">
                                                            <option value="10:00">
                                                            <option value="10:30">
                                                            <option value="11:00">
                                                            <option value="11:30">
                                                            <option value="12:00">
                                                            <option value="12:30">
                                                            <option value="13:00">
                                                            <option value="13:30">
                                                            <option value="14:00">
                                                            <option value="14:30">
                                                            <option value="15:00">
                                                            <option value="15:30">
                                                            <option value="16:00">
                                                            <option value="16:30">
                                                            <option value="17:00">
                                                            <option value="17:30">
                                                            <option value="18:00">
                                                            <option value="18:30">
                                                        </datalist>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <button type="submit" class="mt-3 text-white inline-flex w-full justify-center rounded-md bg-blue-500 px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-blue-700 sm:mt-0 sm:w-auto">
                                    Salva Telefonata
                                </button>

                                <a wire:click="annullaProgrammaTelefonata" class="cursor-pointer text-white mt-3 mr-4 inline-flex w-full justify-center rounded-md bg-yellow-500 px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-yellow-400 sm:mt-0 sm:w-auto">
                                    Annulla Telefonata
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endif

    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-4">
        <div class="flex justify-between text-sm mb-4">
            <h2 class="font-semibold text-center">{{$client->fullname}}</h2>
        </div>
        <p class="text-sm">
            <b>Telefono 1:</b> {{$client->phone1}}
        </p>
        <p class="text-sm">
            <b>Telefono 2:</b> {{$client->phone2}}
        </p>
    </div>

    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-4 mt-4">
        <form wire:submit="salvaTelefonata">
            <div class="grid gap-6 mb-6 md:grid-cols-1">
                <div>
                    <select wire:model="esito" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Seleziona Esito</option>
                        <option value="appuntamento">Preso Appuntamento</option>
                        <option value="non risponde">Non Risponde</option>
                        <option value="non interessato">Non Interessato</option>
                        <option value="errore">Errore</option>
                    </select>
                </div>
                <div>
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Note</label>
                    <textarea wire:model="note" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                </div>
            </div>

            <div class="flex justify-between">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Salva
                </button>

                <a wire:click="programmaTelefonata" class="text-white cursor-pointer bg-yellow-500 hover:bg-yellow-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Programma
                </a>
            </div>

        </form>
    </div>

    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg  mt-4 overflow-y-visible" style="height: 373px">
        <div class="bg-green-500 mb-2 p-3 text-white">
            Telefonate Passate
        </div>

        @foreach($client->phones as $phone)
            <button data-popover-target="popover-default{{$phone->id}}" data-popover-placement="right" type="button" class="mb-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <span style="font-size: 12px">{{$phone->created_at->format('d-m-Y')}}</span>   <br>
                <span style="font-size: 10px">Ore: {{$phone->created_at->format('h:i')}}</span>
            </button>

            <div data-popover id="popover-default{{$phone->id}}" role="tooltip" class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                    <h3 class="font-semibold text-gray-900 dark:text-white">{{$phone->esito}}</h3>
                </div>
                <div class="px-3 py-2">
                    <p>{{$phone->note}}</p>
                </div>
                <div data-popper-arrow></div>
            </div>

        @endforeach
    </div>
</div>
