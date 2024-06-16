<?php

namespace App\Services;

use App\Models\Appointment;
use App\Models\AppointmentType;
use App\Models\Client;
use App\Models\User;
use Carbon\Carbon;

class AppointmentService
{
    public function clientByIdWithAppointments($idClient)
    {
        return Client::with('appointments')->find($idClient);
    }

    public function listaTipiAppuntamenti()
    {
        return AppointmentType::orderBy('name')->get();
    }

    public function crea($evento)
    {
        Appointment::create($evento);
    }

    public function modifica($evento)
    {
        Appointment::find($evento['id'])->update([
            'start' => Carbon::make($evento['start'])
        ]);
    }

    public function listaAppuntamentiDellaSettimanaByIdAudio($idAudio)
    {
        return User::with('appointments:id,client_id,user_id,start')->find($idAudio)->appointments;
    }
}
