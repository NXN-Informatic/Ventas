<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UsuarioPuesto;
use App\Producto;
use App\PuestoSubcategoria;
use App\Puesto;
use App\CentrosComerciale;
use App\Categoria;
use App\Grupo;
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
        $verificar = UsuarioPuesto::where('usuario_id', auth()->user()->id)->first();
        if($verificar == null) {
            $categorias = Categoria::all();

            $categoria_id = old('categoria_id');
            if ($categoria_id) {
                $categoria = Categoria::find($categoria_id);
                $subcategorias = $categoria->subcategorias;
            } else $subcategorias = collect();
            $cencom = CentrosComerciale::all();
            return view('publicas.tienda', compact('categorias','subcategorias','cencom'));
        }
        $usercompletado = User::find(auth()->user()->id);
        $up = UsuarioPuesto::where('usuario_id', $usercompletado->id)->get();
        if ($up->isNotEmpty()) {
            $personalizado = Puesto::find($up->first()->puesto_id)->personalizado;
            $puestocompletado = Puesto::find($up->first()->puesto_id)->completado;
        } else {
            $puestocompletado = 0;
            $personalizado = 0;
        }
        $prods = Puesto::find($up->first()->puesto_id)->puestosubcategorias()->get();
        $productocompletado = 0;
        foreach ($prods as $prod) {
            $grupos = Grupo::where('puestosubcategoria_id',$prod->id)->get();
            foreach($grupos as $grupo){
                if($grupo->productos->isNotEmpty()) {
                    $productocompletado = 1;
                }
            }
            
        }
        $usuarios_puestos = UsuarioPuesto::where('usuario_id', auth()->user()->id)->get();
        $fbconectado = \Storage::exists('public/'.$up->first()->puesto_id.'/fb_catalog.csv');
        //$pc = new Puesto;
        //$puestocompletado = $pc->usuario_puestos()->where('usuario_id',auth()->user()->id)->get();
        //dd($puestocompletado);
        //$puestocompletado = Producto::find(1)->grupo->puestosubcategoria->puesto->usuario_puestos->where('user_id',auth()->user()->id)->first()->get();
        return view('home', compact('usercompletado','puestocompletado','productocompletado','usuarios_puestos','fbconectado','personalizado'));
    }
}
