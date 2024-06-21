<div class="w-3/12">
    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg py-4 px-2">
        <h2 class="font-semibold text-center text-xl">Lista Audiometrie</h2>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Data Audiometria
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($audiometrics as $audiometric)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" wire:click="selezionaAudiometria({{$audiometric->id}})" class="px-6 py-4 cursor-pointer font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$audiometric->created_at->format('d-m-Y')}}
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
