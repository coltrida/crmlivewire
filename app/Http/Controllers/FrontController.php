<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Configuration;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class FrontController extends Controller
{
    public function index()
    {
        $configurationDone = Configuration::first()?->setConfiguration;
        if (!$configurationDone){
            return view('configuration');
        }
        return Redirect::route('login');
    }

    public function saveConfiguration(Request $request)
    {
        Configuration::create($request->except('logo', '_token'));
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = 'logo.' . $file->extension();
            Storage::disk('public')->putFileAs('images', $file, $filename);
        }
        return Redirect::route('inizio');
    }

    public function analisi()
    {
        $this->controlloTelefonateInBaseAlleRegoleRecall();
    }

    private function controlloTelefonateInBaseAlleRegoleRecall()
    {
        $dataDioggi = Carbon::now()->format('Y-m-d');
        $pazientiConStatoActiveRecall = Client::with('codeclient', 'appointments', 'phones')
            ->whereHas('codeclient', function ($cc){
                $cc->where('activeRecall', 1);
            })->get();

        foreach ($pazientiConStatoActiveRecall as $paziente){
            if    ((count($paziente->phones) == 0)
                && (count($paziente->appointments) == 0)
                && ($dataDioggi > Carbon::make($paziente->created_at)->addDays($paziente->codeclient->daysOfRecall)->format('Y-m-d'))
            ){
                echo($paziente->fullname.' '.$paziente->codeclient->name.' '.$paziente->codeclient->daysOfRecall)."\r\n"."<br>";
            }
        }
    }
}
