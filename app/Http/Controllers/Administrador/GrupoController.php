<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Grupo;
use App\PuestoSubcategoria;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $grupos = Grupo::all();
        return view('admin.grupo.index', compact('grupos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $puestoSubcategorias = PuestoSubcategoria::all();
        return view('admin.grupo.create', compact('puestoSubcategorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $rules = [
            'name'          =>  'required|min:3|max:30',
            'descripcion'   =>  'max:100',
            'puestosubcategoria_id' => 'required'

        ];
        $this->validate($request, $rules);

        Grupo::create([
            'name'  => $request->input('name'),
            'descripcion' => $request->input('descripcion'),
            'puestosubcategoria_id' => $request->input('puestosubcategoria_id')
        ]);

        $notification = 'Se ha creado el Grupo Correctamente';
        return back()->with(compact('notification'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Grupo $grupo) {
        $puestoSubcategorias = PuestoSubcategoria::all();
        return view('admin.grupo.edit', compact('grupo', 'puestoSubcategorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grupo $grupo) {
        $rules = [
            'name'          =>  'required|min:3|max:40',
            'descripcion'   =>  'max:100',
            'puestosubcategoria_id' => 'required'
        ];
        $this->validate($request, $rules);

        $grupo->name = $request->input('name');
        $grupo->descripcion = $request->input('descripcion');
        $grupo->puestosubcategoria_id = $request->input('puestosubcategoria_id');
        $grupo->save();

        $notification = 'Se ha actualizado el Grupo Correctamente';
        return back()->with(compact('notification'));
    }
}
