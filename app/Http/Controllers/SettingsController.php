<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function update(Request $request){
        foreach ($request->settings as $key => $value) {
            updatesettings($key, $value);
        }
        return back();
    }
}
