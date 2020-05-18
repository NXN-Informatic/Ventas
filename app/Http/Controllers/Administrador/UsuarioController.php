<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Identidad;
use App\Distrito;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $usuarios = User::all();
        return view('admin.usuario.index', compact('usuarios'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function info(User $usuario) {
        return view('admin.usuario.info', compact('usuario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $identidades = Identidad::all();
        $distritos = Distrito::all();
        return view('admin.usuario.create', compact('identidades', 'distritos'));
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
            'email'         =>  'required|email|unique:users',
            'identidad_id'  =>  'required',
            'ndocumento'    =>  'required',
            'distrito_id'   =>  'required'
        ];
        $this->validate($request, $rules);

        $usuario = User::create([
            'name' => $request->input('name'),
            'sur_name' => $request->input('sur_name'),
            'email' => $request->input('email'),
            'maxpuestos' => $request->input('maxpuestos'),
            'role' => $request->input('role'),
            'identidad_id' => $request->input('identidad_id'),
            'ndocumento' => $request->input('ndocumento'),
            'address' => $request->input('address'),
            'distrito_id' => $request->input('distrito_id'),
            'password' => bcrypt('secret')
        ]);

        $notification = 'El usuario '. $usuario->name .' se ha creado correctamente';
        return back()->with(compact('notification'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario) {
        $identidades = Identidad::all();
        return view('admin.usuario.edit', compact('usuario', 'identidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     */
    public function updateActive(User $usuario) {
        $usuario->status = 'activo';
        $usuario->save();
        $notification = 'El usuario ' . $usuario->name . ' se ha activado correctamente.';
        return redirect('/usuarios')->with(compact('notification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     */
    public function updateDelete(User $usuario) {
        $usuario->status = 'desactivo';
        $usuario->save();
        $notification = 'El usuario ' . $usuario->name . ' se ha desactivado correctamente.';
        return redirect('/usuarios')->with(compact('notification'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario) {
        $rules = [
            'name'          =>  'required|min:3|max:25',
            'email'         =>  'required|email',
            'identidad_id'  =>  'required',
            'ndocumento'    =>  'required'
        ];
        $this->validate($request, $rules);

        $usuario->name = $request->input('name');
        $usuario->sur_name = $request->input('sur_name');
        $usuario->email = $request->input('email');
        $usuario->maxpuestos = $request->input('maxpuestos');
        $usuario->role = $request->input('role');
        $usuario->identidad_id = $request->input('identidad_id');
        $usuario->ndocumento = $request->input('ndocumento');
        $usuario->address = $request->input('address');
        $usuario->save();
        
        $notification = 'El usuario '. $usuario->name .' se ha actualizado correctamente';
        return back()->with(compact('notification'));
    }
}
