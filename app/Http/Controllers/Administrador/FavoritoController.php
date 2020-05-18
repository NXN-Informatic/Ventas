<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Visitante;
use App\Producto;
use App\Favorito;

class FavoritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $favoritos = Favorito::all();
        return view('admin.favorito.index', compact('favoritos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $productos = Producto::all();
        $visitantes = Visitante::all();
        return view('admin.distrito.create', compact('productos', 'visitantes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $rules = [
            'visitante_id'  =>  'required',
            'producto_id '  =>  'required'
        ];
        $this->validate($request, $rules);

        Favorito::create([
            'visitante_id'  => $request->input('visitante_id'),
            'producto_id' => $request->input('producto_id')
        ]);

        $notification = 'Se ha creado el Registro Correctamente';
        return redirect('/favorito/create')->with(compact('notification'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Favorito $favorito) {
        $productos = Producto::all();
        $visitantes = Visitante::all();
        return view('admin.distrito.edit', compact('productos', 'visitantes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favorito $favorito) {
        $rules = [
            'visitante_id'  =>  'required',
            'producto_id '  =>  'required'
        ];
        $this->validate($request, $rules);

        $favorito->visitante_id = $request->input('visitante_id');
        $favorito->producto_id = $request->input('producto_id');
        $favorito->save();

        $notification = 'Se ha actualizado el Registro Correctamente';
        return redirect('/favorito/'.$favorito->id.'/edit')->with(compact('notification'));
    }
}
