<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Categoria;

class PublicController extends Controller
{
    public function productos() {
        $productos = collect();
        $categorias = Categoria::all();
        return view('publicas.productos', compact('productos', 'categorias'));
    }

    public function detailProducto(Producto $producto) {
        $categorias = Categoria::all();
        return view('publicas.detailProducto', compact('producto', 'categorias'));
    }
}
