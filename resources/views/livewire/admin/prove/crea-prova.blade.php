<div class="w-6/12 mr-2">
    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-4">
        <h2 class="font-semibold text-center text-xl">Crea prova</h2>
        <form wire:submit="creaProva">
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
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Crea Prova
                </button>
                @endif
            </div>
        </form>
    </div>
</div>
