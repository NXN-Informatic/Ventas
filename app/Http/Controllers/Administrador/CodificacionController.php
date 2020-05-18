<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Codificacion;

class CodificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $codificaciones = Codificacion::all();
        return view('admin.codificacion.index', compact('codificaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.codificacion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $rules = [
            'acumulado'          =>  'required'
        ];
        $this->validate($request, $rules);

        Codificacion::create([
            'acumulado'  => $request->input('acumulado')
        ]);

        $notification = 'Se ha creado la Codificación Correctamente';
        return redirect('/codificacion/create')->with(compact('notification'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Codificacion $codificacion) {
        return view('admin.codificacion.edit', compact('codificacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Codificacion $codificacion) {
        $rules = [
            'acumulado'          =>  'required'
        ];
        $this->validate($request, $rules);

        $codificacion->name = $request->input('codificacion');
        $codificacion->save();

        $notification = 'Se ha actualizado la Codificación Correctamente';
        return redirect('/codificacion/'.$codificacion->id.'/edit')->with(compact('notification'));
    }
}
