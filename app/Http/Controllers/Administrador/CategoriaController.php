<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $categorias = Categoria::all();
        return view('admin.categoria.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $rules = [
            'name'          =>  'required|min:3|max:25|regex:/^[\pL\s\-]+$/u',
            'descripcion'   =>  'max:100',
        ];
        $this->validate($request, $rules);

        Categoria::create([
            'name'  => $request->input('name'),
            'descripcion' => $request->input('descripcion')
        ]);

        $notification = 'Se ha creado la Categoria Correctamente';
        return redirect('/categoria/create')->with(compact('notification'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria) {
        return view('admin.categoria.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria) {
        $rules = [
            'name'          =>  'required|min:3|max:25|regex:/^[\pL\s\-]+$/u',
            'descripcion'   =>  'max:100',
        ];
        $this->validate($request, $rules);

        $categoria->name = $request->input('name');
        $categoria->descripcion = $request->input('descripcion');
        $categoria->save();

        $notification = 'Se ha actualizado la Categoria Correctamente';
        return redirect('/categoria/'.$categoria->id.'/edit')->with(compact('notification'));
    }
}
