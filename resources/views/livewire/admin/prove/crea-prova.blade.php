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
            <h2 class="font-semibold text-center text-xl">Prova in corso</h2>

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
                                {{$product->productList->prize}}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    @endif
</div>
