<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Categoria;
use App\Puesto;
use App\ImagenProducto;
use App\UsuarioPuesto;
use App\PuestoSubcategoria;
use App\Centroscomerciale;

class PublicController extends Controller
{
    public function productos() {
        $productos = collect();
        $categorias = Categoria::all();
        return view('publicas.productos', compact('productos', 'categorias'));
    }

    public function detailProducto(Producto $producto) {
        $categorias = Categoria::all();
        $usuario_puestos = $producto->grupo->puestosubcategoria->puesto->usuario_puestos->first();
        $latitud = $usuario_puestos->user->latitud;
        $longitud = $usuario_puestos->user->longitud;
        return view('publicas.detailProducto', compact('producto', 'categorias', 'latitud', 'longitud','usuario_puestos'));
    }

    public function puestoAll() {
    	$puestos = Puesto::all();
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

    public function create(Request $request) {
        // dd($request->only('name','categoria_id', 'phone'));
        $rules = [
            'name'          =>  'required|min:3|max:100|unique:puestos',
            'phone'         =>  'min:9|max:12',
            'subcategoria_id' => 'required'
        ];
        $this->validate($request, $rules);

        if(auth()->user()->maxpuestos > 0) {
            $puesto = Puesto::create([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'maxsubcategorias' => 2,
                'plan_id' => 1
            ]);
            $subcategorias = $request->input('subcategoria_id');

            if($subcategorias != null) {
                $total =  ($puesto->maxsubcategorias >= count($subcategorias))? count($subcategorias) : $puesto->maxsubcategorias;
                $puesto->maxsubcategorias = $puesto->maxsubcategorias - $total;
                $puesto->save();
                
                for($i=0 ; $i < $total; ++$i) {
                    PuestoSubcategoria::create([
                        "puesto_id"         =>  $puesto->id,
                        "subcategoria_id"   =>  $subcategorias[$i]
                    ]);
                }
                UsuarioPuesto::create([
                    'usuario_id' => auth()->user()->id,
                    'puesto_id'  => $puesto->id
                ]);
            }
            
            $contents = file_get_contents('./img/logost.jpg');
            $fileName = 'public/'.$puesto->id.'/logo/logoxdefecto.jpg';
            \Storage::disk('local')->put($fileName,  $contents);
            $puesto->perfil = 'logoxdefecto.jpg';
        
            $contents = file_get_contents('./img/registro.jpg');
            $fileName = 'public/'.$puesto->id.'/banner/bannerxdefecto.jpg';
            \Storage::disk('local')->put($fileName, $contents);
            $puesto->banner = 'bannerxdefecto.jpg';
            
            $puesto->save();
    
            $notification = 'Su Tienda ha sido creada correctamente.';
        }else {
            $notification = 'Usted no Tiene acceso para crear más Productos.';
        }

        return redirect('/home')->with(compact('notification'));
    }

    public function centrocomercial(Centroscomerciale $centrocomercial){
        $categorias = Categoria::all();
        $puestos = Puesto::where('cencom_id',$centrocomercial->id)->get(); // where(plan = premium);
       
        return view('publicas.centro', compact('centrocomercial','puestos', 'categorias'));
    }
}
