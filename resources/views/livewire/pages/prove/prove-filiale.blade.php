<div class="container mx-auto p-8">

    <div class="flex justify-between mb-4 items-center">
        <div>

        </div>
        <div>
            <h2 class="text-xl font-semibold text-center mb-4">Prove: {{$shopById->name}}</h2>
        </div>
        <div class="relative">
            <input wire:model.live="search"
                   type="search"
                   id="default-search"
                   class="block w-60 p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   placeholder="Search..."/>
        </div>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="p-4">
                    <div class="flex items-center">

                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    Data
                </th>
                <th scope="col" class="px-6 py-3">
                    Nome
                </th>
                <th scope="col" class="px-6 py-3">
                    Esito
                </th>
                <th scope="col" class="px-6 py-3">
                    Canale
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($listaProveByIdFilialePaginate as $trial)
                @php
                    $coloreSfondo='';
                    if ($trial->trialState->name == 'In Corso'){
                        $coloreSfondo = 'bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-yellow-300 border border-yellow-300';
                    } elseif ($trial->trialState->name == 'Positiva'){
                        $coloreSfondo = 'bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400';
                    } elseif ($trial->trialState->name == 'Reso'){
                        $coloreSfondo = 'bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400';
                    }
                @endphp
                <tr class="bg-white dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-4 p-4">
                        <div class="flex items-center">
                            <a title="visualizza prova" href="{{route('clienti.insert',
                                        ['idShop' => $idShop, 'idClient' => $trial->client->id])}}" wire:navigate
                               class="mr-2 bg-transparent hover:bg-blue-500 text-blue-600 font-semibold hover:text-white py-2 px-2 border border-blue-500 hover:border-transparent rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a title="visualizza paziente" href="{{route('clienti',
                                        ['idShop' => $idShop, 'idClient' => $trial->client->id])}}" wire:navigate
                               class="mr-2 bg-transparent hover:bg-green-500 text-green-600 font-semibold hover:text-white py-2 px-2 border border-green-500 hover:border-transparent rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                    <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{$trial->created_at->format('d/m/Y')}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{$trial->client->fullname}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="{{$coloreSfondo}}">
                            {{$trial->trialState->name}}
                        </span>

                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{$trial->canal->name}}
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="6">
                    {{$listaProveByIdFilialePaginate->links()}}
                </td>
            </tr>
            </tbody>
        </table>
    </div>

</div>
