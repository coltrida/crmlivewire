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

    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg  mt-4" style="height: 373px; overflow-y: scroll">
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
