<div>
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

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>

    </div>
</div>
