<div class="w-6/12 mr-2">
    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-4">
        <h2 class="font-semibold text-center text-xl">Crea prova - {{$client->fullname}}</h2>
        <form wire:submit="creaOrUpdateProva">
            <div class="grid md:grid-cols-4 md:gap-6">
                <div class="relative z-0 w-full mb-5 group">
                    <select wire:model.live="supplierId" class="block py-2.5 px-4 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                        <option selected value=0>Fornitori</option>
                        @foreach($suppliers as $supplier)
                            <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                        @endforeach
                    </select>
                    {{--<div>
                        @error('codeclient_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>--}}
                </div>

                @if($supplierId)
                <div class="relative z-0 w-full mb-5 group">
                    <select wire:model.live="listinoId" class="block py-2.5 px-4 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                        <option selected value=0>listino</option>
                        @foreach($listinoProdotti as $listinoProdotto)
                            <option value="{{$listinoProdotto->id}}">{{$listinoProdotto->name}}</option>
                        @endforeach
                    </select>
                    {{--<div>
                        @error('codeclient_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>--}}
                </div>
                @endif

                @if($listinoId)
                    <div class="relative z-0 w-full mb-5 group">
                        <select wire:model.live="productId" class="block py-2.5 px-4 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                            <option selected value=0>Matricole</option>
                            @foreach($prodottiOfListinoInFilialeById as $prodotto)
                                <option value="{{$prodotto->id}}">{{$prodotto->matricola}}</option>
                            @endforeach
                        </select>
                        {{--<div>
                            @error('codeclient_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>--}}
                    </div>
                @endif

                @if($productId)
                    <button type="submit" class="h-12 text-white bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        {{$trialUnderConstruction ? 'Inserisci in prova' : 'Crea prova'}}
                    </button>
                @endif
            </div>
        </form>
    </div>

    @if($trialUnderConstruction)
        <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-4 mt-4">
            <div class="flex justify-between items-center mb-3">
                <h2 class="font-semibold text-xl">Prova in corso</h2>
                <button type="submit"
                        wire:click="salvaProva"
                        class="h-12 px-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    salva prova
                </button>
            </div>


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
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($trialUnderConstruction->products as $product)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4">
                                {{$product->matricola}}
                            </th>
                            <td class="px-6 py-4">
                                {{$product->productList->name}}
                            </td>
                            <td class="px-6 py-4">
                                {{$product->productList->prizeFormattato}}
                            </td>
                            <td>
                                <button title="reso"
                                        wire:click="togliProdotto({{$product->id}})"
                                        class="h-10 px-2 text-white bg-red-700 hover:bg-red-800 focus:ring-2 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm sm:w-auto text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4">
                            <textarea wire:model="note" rows="4" class="mt-6 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Inserisci Note..."></textarea>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
    @endif
</div>
