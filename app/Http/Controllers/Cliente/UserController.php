<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Identidad;
use App\Distrito;

class UserController extends Controller
{
    public function edit() {
        $tipoDocuments = Identidad::all();
        $distritos = Distrito::all();
        return view('cliente.update', compact('tipoDocuments', 'distritos'));
    }

    public function update(Request $request, User $usuario) {

        $rules = [
            'name'              =>  'required|min:3|max:45',
            'sur_name'          =>  'max:45',
            'identidad_id'      =>  'required',
            'ndocumento'        =>  'required|max:12',
            'address'           =>  'max:150',
            'email'             =>  'required|max:150'
        ];

        $this->validate($request, $rules);

        $usuario->name = $request->input('name');
        $usuario->sur_name = $request->input('sur_name');
        $usuario->identidad_id = $request->input('identidad_id');
        $usuario->ndocumento = $request->input('ndocumento');
        $usuario->address = $request->input('address');
        $usuario->email = $request->input('email');
        $usuario->distrito_id = $request->input('distrito_id');
        $usuario->latitud = $request->input('latitud');
        $usuario->longitud = $request->input('longitud');
        $password = $request->input('password');
        if(strlen($password) > 0) {
            $usuario->password = bcrypt($password);
        }
        $usuario->save();

        $notification = 'Se ha actualizado Sus datos Correctamente';
        return redirect('/user')->with(compact('notification'));
    }

    public function position($latitud, $longitud){
        $usuario = User::where('id', auth()->user()->id)->first();
        $usuario->latitud = $latitud;
        $usuario->longitud = $longitud;
        $usuario->save();
    }

    public function movil(){
        return view('cliente.movil');
    }
}
