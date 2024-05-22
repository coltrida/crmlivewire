<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
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
}
