<div class="w-3/12 mr-2">
    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-4" style="height: 530px">
        <div class="w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            <p aria-current="true" class="block w-full px-4 py-2 text-white bg-blue-700 border-b border-gray-200 rounded-t-lg dark:bg-gray-800 dark:border-gray-600">
                Telefonate di oggi
            </p>
            @foreach($listaTelefonataDaFareOggi as $telefonata)
            <a href="{{route('clienti', ['idClient' => $telefonata->client->id,
                                                'idShop' => $telefonata->client->shop_id])}}" class="block w-full px-4 py-2 border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                {{$telefonata->client->fullname}} - Ore: {{$telefonata->recallTime}}
            </a>
            @endforeach
        </div>
    </div>
</div>
