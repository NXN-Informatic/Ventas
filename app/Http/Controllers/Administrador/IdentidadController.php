<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Identidad;

class IdentidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $identidades = Identidad::all();
        return view('admin.identidad.index', compact('identidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.identidad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $rules = [
            'name'          =>  'required|min:3|max:40'
        ];
        $this->validate($request, $rules);

        Identidad::create([
            'name'  => $request->input('name')
        ]);

        $notification = 'Se ha creado la Identidad Correctamente';
        return redirect('/identidad/create')->with(compact('notification'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Identidad $identidad) {
        return view('admin.identidad.edit', compact('identidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Identidad $identidad) {
        $rules = [
            'name'          =>  'required|min:3|max:40',
        ];
        $this->validate($request, $rules);

        $identidad->name = $request->input('name');
        $identidad->save();

        $notification = 'Se ha actualizado la Identidad Correctamente';
        return redirect('/identidad/'.$identidad->id.'/edit')->with(compact('notification'));
    }
}
