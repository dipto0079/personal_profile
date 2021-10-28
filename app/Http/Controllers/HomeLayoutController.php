<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeLayoutController extends Controller
{
    public function index(){
        return view('HomeLayout.index');
    }
}
