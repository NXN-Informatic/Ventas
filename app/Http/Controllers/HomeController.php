<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UsuarioPuesto;
use App\Producto;
use App\Puesto;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $usercompletado = User::find(auth()->user()->id);
        
        //$pc = new Puesto;
        //$puestocompletado = $pc->usuario_puestos()->where('usuario_id',auth()->user()->id)->get();
        //dd($puestocompletado);
        //$puestocompletado = Producto::find(1)->grupo->puestosubcategoria->puesto->usuario_puestos->where('user_id',auth()->user()->id)->first()->get();
        return view('home', compact('usercompletado'));
    }
}
