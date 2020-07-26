<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Corporativa extends Controller
{
    public function index(){
        return view('publicas.corporativa.inicio'); 
    }
}
