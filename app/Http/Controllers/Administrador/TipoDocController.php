<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TipoDocumento;

class TipoDocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $tipoDocs = TipoDocumento::all();
        return view('admin.tipoDoc.index', compact('tipoDocs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.tipoDoc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $rules = [
            'description'          =>  'required|min:3|max:50'
        ];
        $this->validate($request, $rules);

        TipoDocumento::create([
            'description'  => $request->input('description')
        ]);

        $notification = 'Se ha creado el Tipo de Documento Correctamente';
        return redirect('/tipoDoc/create')->with(compact('notification'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoDocumento $tipoDoc) {
        return view('admin.tipoDoc.edit', compact('tipoDoc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoDocumento $tipoDoc) {
        $rules = [
            'description'          =>  'required|min:3|max:50',
        ];
        $this->validate($request, $rules);

        $tipoDoc->description = $request->input('description');
        $tipoDoc->save();

        $notification = 'Se ha actualizado el Tipo de Documento Correctamente';
        return redirect('/tipoDoc/'.$tipoDoc->id.'/edit')->with(compact('notification'));
    }
}
