<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Corporativa extends Controller
{
    public function index(){
        return view('publicas.corporativa.inicio'); 
    }

    public function quienes(){
        return view('publicas.corporativa.quienes_somos');
    }

    public function precios(){
        return view('publicas.corporativa.precios');
    }

    public function contacto(){
        return view('publicas.corporativa.contacto');
    }
}
