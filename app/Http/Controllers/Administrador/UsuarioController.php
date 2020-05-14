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
}
