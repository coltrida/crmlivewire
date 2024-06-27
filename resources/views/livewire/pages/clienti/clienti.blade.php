<div class="container mx-auto p-8">

    <div class="flex justify-between mb-4 items-center">
        <div>
            @if(!$idClient)
            <a href="{{route('clienti.insert', $idShop)}}" wire:navigate type="button"
               class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-2 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-3.5 text-center me-2 mb-2">
                Nuovo paziente
            </a>
            @endif
        </div>
        <div>
            <h2 class="text-xl font-semibold text-center mb-4">Clienti: {{$shopById->name}}</h2>
        </div>
        <div class="relative">
            @if($idClient)
                <a href="{{ url()->previous() }}" wire:navigate type="button"
                   class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-2 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-3.5 text-center me-2 mb-2">
                    Indietro
                </a>
            @else
                <input wire:model.live="search"
                       type="search"
                       id="default-search"
                       class="block w-60 p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       placeholder="Search..."/>
            @endif
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
                    Code
                </th>
                <th scope="col" class="px-6 py-3">
                    Nome
                </th>
                <th scope="col" class="px-6 py-3">
                    Cognome
                </th>
                <th scope="col" class="px-6 py-3">
                    Tel 1
                </th>
                <th scope="col" class="px-6 py-3">
                    Tel 2
                </th>
                <th scope="col" class="px-6 py-3">
                    Indirizzo
                </th>
                <th scope="col" class="px-6 py-3">
                    Città
                </th>
                <th scope="col" class="px-6 py-3">
                    PR
                </th>
                <th scope="col" class="px-6 py-3">
                    CAP
                </th>
                <th scope="col" class="px-6 py-3">
                    Canale
                </th>
                <th scope="col" class="px-6 py-3">
                    email
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($clientOfShopPaginate as $client)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-4 p-4">
                        <div class="flex items-center">
                            <button
                                wire:confirm="Sei sicuro di cancellare {{$client->fullname}}?"
                                wire:click="elimina({{$client->id}})"
                                title="elimina"
                                class="mr-2 bg-transparent hover:bg-red-500 text-red-600 font-semibold hover:text-white py-2 px-2 border border-red-500 hover:border-transparent rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                     class="size-6">
                                    <path fill-rule="evenodd"
                                          d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </button>

                            <a title="modifica" href="{{route('clienti.insert',
                                        ['idShop' => $idShop, 'idClient' => $client->id])}}" wire:navigate
                               class="mr-2 bg-transparent hover:bg-blue-500 text-blue-600 font-semibold hover:text-white py-2 px-2 border border-blue-500 hover:border-transparent rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                     class="size-6">
                                    <path
                                        d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z"/>
                                </svg>
                            </a>

                            <a title="prova" href="{{route('clienti.prova',$client->id)}}" wire:navigate
                               class="mr-2 bg-transparent hover:bg-green-500 text-green-600 font-semibold hover:text-white py-2 px-2 border border-green-500 hover:border-transparent rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                     class="size-6">
                                    <path
                                        d="M11.644 1.59a.75.75 0 0 1 .712 0l9.75 5.25a.75.75 0 0 1 0 1.32l-9.75 5.25a.75.75 0 0 1-.712 0l-9.75-5.25a.75.75 0 0 1 0-1.32l9.75-5.25Z"/>
                                    <path
                                        d="m3.265 10.602 7.668 4.129a2.25 2.25 0 0 0 2.134 0l7.668-4.13 1.37.739a.75.75 0 0 1 0 1.32l-9.75 5.25a.75.75 0 0 1-.71 0l-9.75-5.25a.75.75 0 0 1 0-1.32l1.37-.738Z"/>
                                    <path
                                        d="m10.933 19.231-7.668-4.13-1.37.739a.75.75 0 0 0 0 1.32l9.75 5.25c.221.12.489.12.71 0l9.75-5.25a.75.75 0 0 0 0-1.32l-1.37-.738-7.668 4.13a2.25 2.25 0 0 1-2.134-.001Z"/>
                                </svg>
                            </a>

                            <a title="audiometria" href="{{route('clienti.audiometria',$client->id)}}" wire:navigate
                               class="mr-2 bg-transparent hover:bg-purple-500 text-purple-600 font-semibold hover:text-white py-2 px-2 border border-purple-500 hover:border-transparent rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                     class="size-6">
                                    <path
                                        d="M18.75 12.75h1.5a.75.75 0 0 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5ZM12 6a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 12 6ZM12 18a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 12 18ZM3.75 6.75h1.5a.75.75 0 1 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5ZM5.25 18.75h-1.5a.75.75 0 0 1 0-1.5h1.5a.75.75 0 0 1 0 1.5ZM3 12a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 3 12ZM9 3.75a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5ZM12.75 12a2.25 2.25 0 1 1 4.5 0 2.25 2.25 0 0 1-4.5 0ZM9 15.75a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Z"/>
                                </svg>
                            </a>

                            <a title="telefonate" href="{{route('clienti.telefonate',$client->id)}}" wire:navigate
                               class="mr-2 bg-transparent hover:bg-orange-500 text-orange-600 font-semibold hover:text-white py-2 px-2 border border-orange-500 hover:border-transparent rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                     class="size-6">
                                    <path fill-rule="evenodd"
                                          d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </a>

                            <a title="appuntamenti" href="{{route('clienti.appuntamenti',$client->id)}}" wire:navigate
                               class="bg-transparent hover:bg-yellow-500 text-yellow-600 font-semibold hover:text-white py-2 px-2 border border-yellow-500 hover:border-transparent rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                     class="size-6">
                                    <path
                                        d="M12.75 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM7.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM8.25 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM9.75 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM10.5 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM12.75 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM14.25 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 13.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"/>
                                    <path fill-rule="evenodd"
                                          d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </a>

                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{$client->codeclient->name}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{$client->name}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{$client->surname}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{$client->phone1}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{$client->phone2}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{$client->address}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{$client->city}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{$client->province}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{$client->postcode}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{$client->canal->name}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{$client->email}}
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="6">
                    {{$clientOfShopPaginate->links()}}
                </td>
            </tr>
            </tbody>
        </table>
    </div>

</div>
