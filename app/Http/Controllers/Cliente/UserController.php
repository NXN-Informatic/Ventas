<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Identidad;
use App\Distrito;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function edit() {
        $tipoDocuments = Identidad::all();
        $distritos = Distrito::all();
        return view('cliente.update', compact('tipoDocuments', 'distritos'));
    }
    public function acceso() {
        $userdata = User::find(auth()->user()->id);
        return view('cliente.acceso', compact('userdata'));
    }

    public function update(Request $request, User $usuario) {

        $rules = [
            'name'              =>  'required|min:3|max:45',
            'sur_name'          =>  'max:45',
            'identidad_id'      =>  'required',
            'ndocumento'        =>  'required|max:12',
            'address'           =>  'max:150',
        ];

        $this->validate($request, $rules);

        $usuario->name = $request->input('name');
        $usuario->sur_name = $request->input('sur_name');
        $usuario->identidad_id = $request->input('identidad_id');
        $usuario->ndocumento = $request->input('ndocumento');
        $usuario->address = $request->input('address');
        $usuario->distrito_id = $request->input('distrito_id');
        $usuario->latitud = $request->input('latitud');
        $usuario->longitud = $request->input('longitud');
        $password = $request->input('password');
        if(strlen($password) > 0) {
            $usuario->password = bcrypt($password);
        }
        $file = $request->file('imagen');
        if($file != null) {
            $name = $file->getClientOriginalName();
            $fileName = 'public/usuarios/'.$usuario->id.'/'.$name;
            \Storage::disk('local')->put($fileName,  \File::get($file));
            $usuario->imagen = $name;
        }
        $usuario->save();

        $notification = 'Sus datos fueron actualizados correctamente';
        return redirect('/home')->with(compact('notification'));
    }

    public function accesoupdate(Request $request, User $usuario) {

        $rules = [
            'email'              =>  'required|min:11|max:50',
            'new1'          =>  'required|min:8',
            'new2'      =>  'required|min:8',
            'actual'        =>  'required',
        ];

        $this->validate($request, $rules);

        $new1 = $request->input('new1');
        $new2 = $request->input('new2');
        $actual = $request->input('actual');
        if($new1!=$new2){
            $notification = 'Las contraseñas nuevas no coindciden.';
            return redirect('/acceso')->with(compact('notification'));
        }else{
            if(Hash::check($actual, $usuario->password)){
                $usuario->password = bcrypt($new1);
            }else{
                $notification = 'La contraseña actual es incorrecta';
                return redirect('/acceso')->with(compact('notification'));
            }
        }
        $usuario->save();

        $notification = 'Su contraseña fue actualizada correctamente';
        return redirect('/home')->with(compact('notification'));
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
