<div>
    <div class="py-12">
        <div class="max-w-full px-6 mx-auto flex">
            @if(session('phone') && session('phone') == 'appuntamento')
                <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true" >

                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

                    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">

                            <div
                                class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:w-4/12">
                                <form wire:submit="salvaAppuntamento">
                                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                        <div class="sm:flex sm:items-start">
                                            <div
                                                class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-green-600">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                                </svg>
                                            </div>
                                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                                <h3 class="text-base font-semibold leading-6 text-gray-900"
                                                    id="modal-title">Salva Appuntamento</h3>
                                            </div>
                                        </div>

                                        <div class="mt-4 flex justify-between">
                                            <div>
                                                <label for="startDate"
                                                       class="block text-sm font-medium leading-6 text-gray-900">Data
                                                    Appuntamento</label>
                                                <div class="mt-2">
                                                    <input type="date" wire:model="startDate" id="startDate"
                                                           autocomplete="given-name"
                                                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                </div>
                                            </div>

                                            <div>
                                                <label for="startTime"
                                                       class="block text-sm font-medium leading-6 text-gray-900">Orario
                                                    Appuntamento</label>
                                                <div class="mt-2">
                                                    <input type="time" wire:model="startTime" id="startTime"
                                                           list="avail"
                                                           autocomplete="given-name"
                                                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    <datalist id="avail">
                                                        <option value="09:00">
                                                        <option value="10:00">
                                                        <option value="11:00">
                                                        <option value="12:00">
                                                        <option value="13:00">
                                                        <option value="14:00">
                                                        <option value="15:00">
                                                        <option value="16:00">
                                                        <option value="17:00">
                                                        <option value="18:00">
                                                    </datalist>
                                                </div>
                                            </div>

                                            <div>
                                                <label for="appointment_type_id" class="block text-sm font-medium leading-6 text-gray-900">Tipo Appuntamento</label>
                                                <div class="mt-2">
                                                    <select id="appointment_type_id" wire:model="appointment_type_id" autocomplete="country-name"
                                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                                        <option selected></option>
                                                        @foreach($listaTipiAppuntamenti as $tipoAppuntamento)
                                                            <option value="{{$tipoAppuntamento->id}}">{{$tipoAppuntamento->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <label for="note" class="block text-sm font-medium leading-6 text-gray-900">About</label>
                                            <div class="mt-2">
                                                <textarea id="note" wire:model="note" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                        <button type="submit"
                                                class="inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto">
                                            salva
                                        </button>
                                        <button type="button"
                                                class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
                                            Cancel
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            @endif

            <div class="w-2/12 mr-2">
                <livewire:admin.telefonate.crea-telefonata :idClient="$idClient"/>
            </div>
            <div class="w-10/12 mr-2">
                <livewire:admin.appuntamenti.agenda :idClient="$idClient"/>
            </div>
        </div>
    </div>
</div>
