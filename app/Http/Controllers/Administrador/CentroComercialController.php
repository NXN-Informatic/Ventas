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

        $imagena = $request->file('imagena');
        $imagenb = $request->file('imagenb');

            if($imagena != null) {
                $name = $imagena->getClientOriginalName();
                $fileName = 'public/'.$cc->id.'/'.$name;
                \Storage::disk('local')->put($fileName,  \File::get($imagena));
                $cc->banner = $name;
            }
            if($imagenb != null) {
                $name = $imagenb->getClientOriginalName();
                $fileName = 'public/'.$cc->id.'/'.$name;
                \Storage::disk('local')->put($fileName,  \File::get($imagenb));
                $cc->logo = $name;
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
