<div class="w-6/12">

    @if($showProducts)
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
                                <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Info Prova - {{$dettagliProva->importoTotFormattato}} - Rimane al Saldo: {{'€ '.number_format((float) $rimanenzaAlSaldo, '2', ',', '.')}}</h3>
                                <div class="mt-2">

                                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    Matricola
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Prodotto
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Prezzo
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($dettagliProva->products as $prodotto)
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <td class="px-6 py-4">
                                                   {{$prodotto->matricola}}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{$prodotto->productList->supplier->name}} - {{$prodotto->productList->name}}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{$prodotto->productList->prizeFormattato}}
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                        <div class="m-4">
                                            <label>Note:</label>
                                            {{$dettagliProva->note}}
                                        </div>

                                        <hr>

                                        @if($dettagliProva->trialState->name === 'Reso')
                                            <div class="m-4">
                                                Data Reso: {{$dettagliProva->dataFinalizzatoResoFormattato}}
                                            </div>
                                            @elseif($dettagliProva->trialState->name === 'Positiva')
                                            <div class="m-4">
                                                Data Finalizzazione: {{$dettagliProva->dataFinalizzatoResoFormattato}}
                                            </div>
                                            <hr>
                                            <div class="m-4">
                                                <b>Pagamenti effettuati:</b> <br>
                                                @foreach($pagamenti as $pagamento)
                                                    {{$pagamento->created_at->format('d/m/y')}} - {{$pagamento->name}} - {{$pagamento->importoFormattato}}
                                                    <br>
                                                @endforeach
                                            </div>
                                            @elseif($dettagliProva->trialState->name === 'In Corso')
                                                <div class="m-4">
                                                    Giorni in prova: {{$dettagliProva->giorniInProva}}
                                                </div>
                                        @endif

                                        @if($showNuovoPagamento)
                                            <form wire:submit="salvaPagamento">
                                                <div class="grid gap-6 mb-6 md:grid-cols-2">
                                                    <div>
                                                        <input type="text" wire:model="importoPagamento" class=" ml-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Importo" />
                                                    </div>
                                                    <div>
                                                        <button type="submit" class="inline-flex w-full h-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto">
                                                            Salva pagamento
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        @if($dettagliProva->trialState->name === 'Positiva')
                            @if(!$showNuovoPagamento && $rimanenzaAlSaldo != 0)
                                <button wire:click="aggiungiPagamento" type="button" class="inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto">
                                    Aggiungi pagamento
                                </button>
                            @endif
                            <button type="button" class="inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto">
                                Scarica Fattura
                            </button>
                        @endif
                        <button wire:click="chiudiModal" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
                            Chiudi
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

        @if($creaFattura)
            <form wire:submit="creazioneFattura">
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
                                        <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Info Prova</h3>
                                        <div class="mt-2">

                                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3">
                                                            Matricola
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Prodotto
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Prezzo
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($dettagliProva->products as $prodotto)
                                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                            <td class="px-6 py-4">
                                                                {{$prodotto->matricola}}
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                {{$prodotto->productList->supplier->name}} - {{$prodotto->productList->name}}
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                {{$prodotto->productList->prizeFormattato}}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>

                                                <div class="m-4">
                                                    <label>Note:</label>
                                                    {{$dettagliProva->note}}
                                                </div>

                                                <hr>
                                                <div class="m-4">
                                                    Giorni in prova: {{$dettagliProva->giorniInProva}}
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="grid gap-6 mb-6 md:grid-cols-2">
                                <div class="relative z-0 w-full mb-5 group m-4">
                                    <input type="text" id="acconto" wire:model="acconto" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                    <label for="acconto" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                        Acconto
                                    </label>
                                </div>
                            </div>

                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <button type="submit" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
                                    Crea Fattura
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        @endif

    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg py-4 px-2">
        <h2 class="font-semibold text-center text-xl">lista prove</h2>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Data Prova
                </th>
                <th scope="col" class="px-6 py-3">
                    Importo
                </th>
                <th scope="col" class="px-6 py-3">
                    Canale
                </th>
                <th scope="col" class="px-6 py-3">
                    Stato
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($prove as $prova)
            <tr class="text-xs odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4">
                    {{$prova->created_at->format('d/m/Y')}}
                </th>
                <td class="px-6 py-4">
                    {{$prova->importoTotFormattato}}
                </td>
                <td class="px-6 py-4">
                    {{$prova->canal->name}}
                </td>
                <td class="px-6 py-4">
                    @if($prova->trialState->name === 'In Corso')
                        <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-yellow-300 border border-yellow-300">
                            {{$prova->trialState->name}}
                        </span>
                        @elseif($prova->trialState->name === 'Reso')
                            <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">
                                {{$prova->trialState->name}}
                            </span>
                        @elseif($prova->trialState->name === 'Positiva')
                        <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">
                            {{$prova->trialState->name}}
                        </span>
                    @endif
                </td>
                <td class="flex justify-between px-3 py-4">
                    @if($prova->trialState->name === 'In Corso')
                        <button title="positivo"
                                wire:click="positivo({{$prova->id}})"
                                class="h-10 px-2 text-white bg-green-700 hover:bg-green-800 focus:ring-2 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm sm:w-auto text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z" />
                            </svg>
                        </button>
                        <button title="reso"
                                wire:click="reso({{$prova->id}})"
                                class="h-10 px-2 text-white bg-red-700 hover:bg-red-800 focus:ring-2 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm sm:w-auto text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.498 15.25H4.372c-1.026 0-1.945-.694-2.054-1.715a12.137 12.137 0 0 1-.068-1.285c0-2.848.992-5.464 2.649-7.521C5.287 4.247 5.886 4 6.504 4h4.016a4.5 4.5 0 0 1 1.423.23l3.114 1.04a4.5 4.5 0 0 0 1.423.23h1.294M7.498 15.25c.618 0 .991.724.725 1.282A7.471 7.471 0 0 0 7.5 19.75 2.25 2.25 0 0 0 9.75 22a.75.75 0 0 0 .75-.75v-.633c0-.573.11-1.14.322-1.672.304-.76.93-1.33 1.653-1.715a9.04 9.04 0 0 0 2.86-2.4c.498-.634 1.226-1.08 2.032-1.08h.384m-10.253 1.5H9.7m8.075-9.75c.01.05.027.1.05.148.593 1.2.925 2.55.925 3.977 0 1.487-.36 2.89-.999 4.125m.023-8.25c-.076-.365.183-.75.575-.75h.908c.889 0 1.713.518 1.972 1.368.339 1.11.521 2.287.521 3.507 0 1.553-.295 3.036-.831 4.398-.306.774-1.086 1.227-1.918 1.227h-1.053c-.472 0-.745-.556-.5-.96a8.95 8.95 0 0 0 .303-.54" />
                            </svg>
                        </button>
                    @endif
                        <button title="info"
                                wire:click="info({{$prova->id}})"
                                class="h-10 px-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                            </svg>
                        </button>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>

</div>
