<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CentrosComerciale;

class CentroComercialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $cccc = CentrosComerciale::all();
        return view('admin.cccc.index', compact('cccc'));
    }

    /**
     * Display a listing of the resource.
     *
     *
     */

    /**
     * Show the form for creating a new resource.
     *
     * 
     */
    public function create() {
        return view('admin.cccc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * 
     */
    public function store(Request $request) {

        $cc = CentrosComerciale::create([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion')
        ]);

        $imagen1 = $request->file('imagena');
            dd($imagen1);
        $imagen2 = $request->file('imagenb');

            if($imagen1 != null) {
                $name = $imagen1->getClientOriginalName();
                $fileName = 'public/'.$cc->id.'/'.$name;
                \Storage::disk('local')->put($fileName,  \File::get($imagen1));
                $cc->imagen1 = $name;
            }
            if($imagen2 != null) {
                $name = $imagen2->getClientOriginalName();
                $fileName = 'public/'.$cc->id.'/'.$name;
                \Storage::disk('local')->put($fileName,  \File::get($imagen2));
                $cc->imagen2 = $name;
            }
            $cc->save();

        $notification = 'El cc '. $cc->nombre .' se ha creado correctamente';
        return back()->with(compact('notification'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * 
     */
 
    
}
