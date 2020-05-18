<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Provincia;
use App\Region;
use App\Pais;

class ProvinciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $provincias = Provincia::all();
        return view('admin.provincia.index', compact('provincias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $paises = Pais::all();
        $regiones = collect();
        return view('admin.provincia.create', compact('regiones', 'paises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $rules = [
            'name'          =>  'required|min:3|max:25',
            'region_id'     =>  'required'
        ];
        $this->validate($request, $rules);

        Provincia::create([
            'nombre'  => $request->input('name'),
            'region_id' => $request->input('region_id')
        ]);

        $notification = 'Se ha creado la Provincia Correctamente';
        return redirect('/provincia/create')->with(compact('notification'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Provincia $provincia) {
        $regiones = Region::all();
        return view('admin.provincia.edit', compact('provincia', 'regiones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provincia $provincia) {
        $rules = [
            'name'          =>  'required|min:3|max:25',
            'region_id'     =>  'required'
        ];
        $this->validate($request, $rules);

        $provincia->nombre = $request->input('name');
        $provincia->region_id = $request->input('region_id');
        $provincia->save();

        $notification = 'Se ha actualizado la Provincia Correctamente';
        return redirect('/provincia/'.$provincia->id.'/edit')->with(compact('notification'));
    }
    
    /**
     * API REST PROVINCIAS
     *
     * @return \Illuminate\Http\Response
     */
    public function apiprovincias(Region $region) {
        return $region->provincias()->get([
            'provincias.id',
            'provincias.nombre',
        ]);
    }
}
