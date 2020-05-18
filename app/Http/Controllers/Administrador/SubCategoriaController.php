<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Subcategoria;
use App\Categoria;

class SubCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $subcategorias = Subcategoria::all();
        return view('admin.subcategoria.index', compact('subcategorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $categorias = Categoria::all();
        return view('admin.subcategoria.create', compact('categorias'));
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
            'descripcion'   =>  'max:200',
            'categoria_id'  =>  'required'
        ];
        $this->validate($request, $rules);

        $subcategoria = Subcategoria::create([
            'name'  => $request->input('name'),
            'descripcion' => $request->input('descripcion'),
            'categoria_id' => $request->input('categoria_id')
        ]);

        $file = $request->file('file');
        if($file != null) {
            $name = $file->getClientOriginalName();
            $fileName = 'public/subcategorias/'.$subcategoria->categoria_id.'/'.$subcategoria->id.'/'.$name;
            \Storage::disk('local')->put($fileName,  \File::get($file));
            $subcategoria->imagen = $name;
            $subcategoria->save();
        }

        $notification = 'Se ha creado la SubCategoria Correctamente';
        return redirect('/subcategoria/create')->with(compact('notification'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategoria $subcategoria) {
        $categorias = Categoria::all();
        return view('admin.subcategoria.edit', compact('categorias', 'subcategoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategoria $subcategoria) {
        $rules = [
            'name'          =>  'required|min:3|max:25|regex:/^[\pL\s\-]+$/u',
            'descripcion'   =>  'max:200',
            'categoria_id'  =>  'required'
        ];
        $this->validate($request, $rules);

        $subcategoria->name = $request->input('name');
        $subcategoria->descripcion = $request->input('descripcion');
        $subcategoria->categoria_id = $request->input('categoria_id');
        
        $file = $request->file('file');
        if($file != null) {
            $name = $file->getClientOriginalName();
            $fileName = 'public/subcategorias/'.$subcategoria->categoria_id.'/'.$subcategoria->id.'/'.$name;
            \Storage::disk('local')->put($fileName,  \File::get($file));
            $subcategoria->imagen = $name;
        }
        $subcategoria->save();

        $notification = 'Se ha actualizado la SubCategoria Correctamente';
        return redirect('/subcategoria/'.$subcategoria->id.'/edit')->with(compact('notification'));
    }
}
