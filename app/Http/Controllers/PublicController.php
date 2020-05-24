<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Categoria;
use App\Puesto;
use App\ImagenProducto;

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

    public function puestoAll() {
    	$puestos = Puesto::paginate(10);
    	$categorias = Categoria::all();
    	return view('publicas.puestoAll' , compact('puestos', 'categorias')); 
    }

    public function apiproductos(Puesto $puesto) {
    	$data = array();
        foreach($puesto->puestosubcategorias as $puesto_subcategoria){
        	foreach($puesto_subcategoria->grupos as $grupo){
        		foreach($grupo->productos as $producto){
                    $image = ImagenProducto::where('producto_id', $producto->id)->first();
                    $data[] = array(
                        "name" => $producto->name,
                        "image" => $image->imagen,
                        "precio" => $producto->precio,
                        "puesto" => $puesto_subcategoria->puesto_id,
                        "id" => $producto->id,
                        "description" => $producto->description,
                        "stock" => $producto->stock
                    );
                }        	
        	}
        }
        return $data;
    }
}
