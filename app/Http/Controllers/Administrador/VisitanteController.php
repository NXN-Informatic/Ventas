<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Visitante;

class VisitanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $visitantes = Visitante::all();
        return view('admin.visitante.index', compact('visitantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.visitante.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $rules = [
            'ip'          =>  'required|min:3|max:25',
            'sessionid'   =>  'max:40',
            'latitud'     =>  'max:20',
            'longitud'    =>  'max:20',
            'useragent'   =>  'max:30'
        ];
        $this->validate($request, $rules);

        Visitante::create([
            'ip'  => $request->input('ip'),
            'sessionid'  => $request->input('sessionid'),
            'latitud'  => $request->input('latitud'),
            'longitud'  => $request->input('longitud'),
            'useragent'  => $request->input('useragent')
        ]);

        $notification = 'Se ha creado el Visitante Correctamente';
        return redirect('/visitante/create')->with(compact('notification'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Visitante $visitante) {
        return view('admin.visitante.edit', compact('visitante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visitante $visitante) {
        $rules = [
            'ip'          =>  'required|min:3|max:25',
            'sessionid'   =>  'max:40',
            'latitud'     =>  'max:20',
            'longitud'    =>  'max:20',
            'useragent'   =>  'max:30'
        ];
        $this->validate($request, $rules);

        $visitante->ip = $request->input('ip');
        $visitante->sessionid = $request->input('sessionid');
        $visitante->latitud = $request->input('latitud');
        $visitante->longitud = $request->input('longitud');
        $visitante->useragent = $request->input('useragent');
        $visitante->save();

        $notification = 'Se ha actualizado el Visitante Correctamente';
        return redirect('/visitante/'.$visitante->id.'/edit')->with(compact('notification'));
    }
}
