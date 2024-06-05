<?php

namespace App\Services;

use App\Models\Audiometric;
use App\Models\Client;
use Illuminate\Support\Arr;

class AudiometricService
{
    public function crea($request)
    {
        Audiometric::create($request);
    }

    public function lista($idClient)
    {
        return Client::with('audiometrics')->find($idClient)->audiometrics;
    }

    public function caricaAudiometriaById($idAudiometria)
    {
        return Audiometric::find($idAudiometria);
    }

    public function caricaAudiometriaPiuRecenteByIdClient($idClient)
    {
        /*dd(array_values(Arr::only(Client::with(['audiometrics' => function($a){
            $a->latest();
        }])->find($idClient)->audiometrics->first()->toArray(), ['d250', 'd500', 'd1000', 'd2000', 'd6000', 'd8000'])));*/

        $esisteAudiomestria = [ [], [] ];

        if (count(Client::with('audiometrics')->find($idClient)->audiometrics) > 0){
            return [
                array_values(Arr::only(Client::with(['audiometrics' => function($a){
                    $a->latest();
                }])->find($idClient)->audiometrics->first()->toArray(),
                    ['d250', 'd500', 'd1000', 'd2000', 'd6000', 'd8000'])),
                array_values(Arr::only(Client::with(['audiometrics' => function($a){
                    $a->latest();
                }])->find($idClient)->audiometrics->first()->toArray(),
                    ['s250', 's500', 's1000', 's2000', 's6000', 's8000']))
            ];
        }

        return $esisteAudiomestria;

        /*return array_values(Arr::only(Client::with(['audiometrics' => function($a){
            $a->latest();
        }])->find($idClient)->audiometrics->first()->toArray(), ['d250', 'd500', 'd1000', 'd2000', 'd6000', 'd8000']));*/
    }
}
