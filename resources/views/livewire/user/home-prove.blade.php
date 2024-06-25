<div class="w-5/12 mr-2">
    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-4 overflow-y-visible" style="height: 260px">

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr style="background: {{$secondaryColor}}; color: white">
                    <th scope="col" class="px-6 py-3">
                        Prove In Corso
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Importo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Data Prova
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($proveInCorso as $prova)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$prova->client->fullname}}
                    </th>
                    <td class="px-6 py-4">
                        {{$prova->importoTotFormattato}}
                    </td>
                    <td class="px-6 py-4">
                        {{$prova->created_at->format('d-m-Y')}}
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>

    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-4 mt-2 overflow-y-visible" style="height: 260px" >

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr style="background: {{$secondaryColor}}; color: white">
                    <th scope="col" class="px-6 py-3">
                        Prove Finalizzate nel mese
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Importo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Data Prova
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($proveFinalizzateNelMese as $prova)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$prova->client->fullname}}
                        </th>
                        <td class="px-6 py-4">
                            {{$prova->importoTotFormattato}}
                        </td>
                        <td class="px-6 py-4">
                            {{$prova->created_at->format('d-m-Y')}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
