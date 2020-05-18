<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pago;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $pagos = Pago::all();
        return view('admin.pago.index', compact('pagos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.pago.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $rules = [
            'name'          =>  'required|min:3|max:40',
            'description'   =>  'max:120'
        ];
        $this->validate($request, $rules);

        $pago = Pago::create([
            'name'  => $request->input('name'),
            'description' => $request->input('description')
        ]);

        $file = $request->file('file');
        if($file != null) {
            $name = $file->getClientOriginalName();
            $fileName = 'public/pagos/'.$pago->id.'/'.$name;
            \Storage::disk('local')->put($fileName,  \File::get($file));
            $pago->icono = $name;
            $pago->save();
        }

        $notification = 'Se ha creado el Pago Correctamente';
        return redirect('/pago/create')->with(compact('notification'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pago $pago) {
        return view('admin.pago.edit', compact('pago'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pago $pago) {
        $rules = [
            'name'          =>  'required|min:3|max:40',
            'description'   =>  'max:120'
        ];
        $this->validate($request, $rules);

        $pago->name = $request->input('name');
        $pago->description = $request->input('description');
        
        $file = $request->file('file');
        if($file != null) {
            $name = $file->getClientOriginalName();
            $fileName = 'public/pagos/'.$pago->id.'/'.$name;
            \Storage::disk('local')->put($fileName,  \File::get($file));
            $pago->icono = $name;
        }
        $pago->save();

        $notification = 'Se ha actualizado el Pago Correctamente';
        return redirect('/pago/'.$pago->id.'/edit')->with(compact('notification'));
    }
}
