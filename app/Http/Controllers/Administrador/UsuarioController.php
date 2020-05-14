<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UsuarioController extends Controller
{
    public function index() {
        $usuarios = User::all();
        return view('admin.usuario.index', compact('usuarios'));
    }

    public function info(User $usuario) {
        return view('admin.usuario.info', compact('usuario'));
    }

    public function updateActive(User $usuario) {
        $usuario->status = 'activo';
        $usuario->save();
        $notification = 'El usuario ' . $usuario->name . ' se ha activado correctamente.';
        return redirect('/usuarios')->with(compact('notification'));
    }

    public function updateDelete(User $usuario) {
        $usuario->status = 'desactivo';
        $usuario->save();
        $notification = 'El usuario ' . $usuario->name . ' se ha desactivado correctamente.';
        return redirect('/usuarios')->with(compact('notification'));
    }
}
