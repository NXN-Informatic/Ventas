<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entrega;

class EntregaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $entregas = Entrega::all();
        return view('admin.entrega.index', compact('entregas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.entrega.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $rules = [
            'name'          =>  'required|min:3|max:40|regex:/^[\pL\s\-]+$/u',
            'description'   =>  'max:110'
        ];
        $this->validate($request, $rules);

        $entrega = Entrega::create([
            'name'  => $request->input('name'),
            'description' => $request->input('description')
        ]);

        $file = $request->file('file');
        if($file != null) {
            $name = $file->getClientOriginalName();
            $fileName = 'public/entregas/'.$entrega->id.'/'.$name;
            \Storage::disk('local')->put($fileName,  \File::get($file));
            $entrega->name = $name;
            $entrega->save();
        }

        $notification = 'Se ha creado la Entrega Correctamente';
        return redirect('/entrega/create')->with(compact('notification'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Entrega $entrega) {
        return view('admin.entrega.edit', compact('entrega'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entrega $entrega) {
        $rules = [
            'name'          =>  'required|min:3|max:40|regex:/^[\pL\s\-]+$/u',
            'description'   =>  'max:110'
        ];
        $this->validate($request, $rules);

        $entrega->name = $request->input('name');
        $entrega->descripcion = $request->input('description');
        $file = $request->file('file');

        if($file != null) {
            $name = $file->getClientOriginalName();
            $fileName = 'public/entregas/'.$entrega->id.'/'.$name;
            \Storage::disk('local')->put($fileName,  \File::get($file));
            $entrega->name = $name;
        }

        $entrega->save();

        $notification = 'Se ha actualizado la Entrega Correctamente';
        return redirect('/entrega/'.$entrega->id.'/edit')->with(compact('notification'));
    }
}
