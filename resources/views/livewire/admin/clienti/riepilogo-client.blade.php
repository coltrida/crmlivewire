<div class="container mx-auto p-8">

    <h2 class="text-xl font-semibold text-center mb-4">Riepilogo Pazienti </h2>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="p-4">
                    <div class="flex items-center">

                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    Filiale
                </th>
                <th scope="col" class="px-6 py-3">
                    cli
                </th>
                <th scope="col" class="px-6 py-3">
                    pc
                </th>
                <th scope="col" class="px-6 py-3">
                    clc
                </th>
                <th scope="col" class="px-6 py-3">
                    normo
                </th>
                <th scope="col" class="px-6 py-3">
                    tappo
                </th>
                <th scope="col" class="px-6 py-3">
                    dec
                </th>
                <th scope="col" class="px-6 py-3">
                    tot
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($riepilogoAllClients as $filiale)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{$loop->index}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{$filiale->name}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{$filiale->cli}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{$filiale->pc}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{$filiale->clc}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{$filiale->normo}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{$filiale->tappo}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{$filiale->dec}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{$filiale->tot}}
                    </td>
                </tr>
            @endforeach
            <tr class="bg-white text-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                <td class="px-6 py-4 whitespace-nowrap">

                </td>
                <td class="px-6 py-4 whitespace-nowrap">

                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{$riepilogoAllClients->sum('cli')}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{$riepilogoAllClients->sum('pc')}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{$riepilogoAllClients->sum('clc')}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{$riepilogoAllClients->sum('normo')}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{$riepilogoAllClients->sum('tappo')}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{$riepilogoAllClients->sum('dec')}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{$riepilogoAllClients->sum('tot')}}
                </td>
            </tr>
            </tbody>
        </table>
    </div>

</div>


