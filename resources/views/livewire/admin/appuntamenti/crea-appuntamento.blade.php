<div>
    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-4">
        <div class="flex justify-between">
            <h2 class="font-semibold text-center">{{$client->fullname}}</h2>
            <a href="{{route('admin.clienti', $client->shop_id)}}" wire:navigate
               class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-2 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-3.5 text-center me-2 mb-2">
                indietro
            </a>
        </div>
    </div>

    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-4 mt-4">

        <form wire:submit="salvaAppuntamento">
            <div class="grid gap-6 mb-6 md:grid-cols-1">
                <div class="mt-2">
                    <label for="startDate"
                           class="block text-sm font-medium leading-6 text-gray-900">Data
                        Appuntamento</label>
                    <div class="mt-1">
                        <input type="date" wire:model="startDate" id="startDate"
                               autocomplete="given-name"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>


                    <div class="sm:col-span-3 mt-4">
                        <label for="startTime"
                               class="block text-sm font-medium leading-6 text-gray-900">Orario
                            Appuntamento</label>
                        <div class="mt-1">
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

            <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Submit
            </button>
        </form>

    </div>
</div>

