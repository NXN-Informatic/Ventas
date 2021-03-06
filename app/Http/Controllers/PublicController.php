<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Categoria;
use App\Subcategoria;
use App\Puesto;
use App\Pago;
use App\Grupo;
use App\Entrega;
use App\EntregaPuesto;
use App\PagoPuesto;
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
        $puesto = $producto->grupo->puestosubcategoria->puesto;
        $latitud = $usuario_puestos->user->latitud;
        $longitud = $usuario_puestos->user->longitud;
        return view('publicas.detailProducto', compact('producto','puesto', 'categorias', 'latitud', 'longitud','usuario_puestos'));
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
            'name'          =>  'required|min:3|max:28|unique:puestos',
            'subcategoria_id' => 'required'
        ];
        $this->validate($request, $rules);

        if(auth()->user()->maxpuestos > 0) {
            $puesto = Puesto::create([
                'name' => $request->input('name'),
                'maxsubcategorias' => 10,
                'plan_id' => 1,
                'cencom_id' => 1,
            ]);
            $subcategorias = $request->input('subcategoria_id');
            /*if($request->input('wsp')) {
                $puesto->wsp=$request->input('phone');
            }*/
            /*$puesto->cencom_id = $request->input('cencom');*/
            
            if($subcategorias != null) {
                foreach($subcategorias as $subcategoria) {
                    $ps = PuestoSubcategoria::create([
                        "puesto_id"         =>  $puesto->id,
                        "subcategoria_id"   =>  $subcategoria
                    ]);
                    $subcat=Subcategoria::find($subcategoria);
                    Grupo::create([
                        "name" => $subcat->name,
                        'descripcion' => "Categoria por defecto",
                        'puestosubcategoria_id' => $ps->id,
                        'activo' => 1
                    ]);
                }
                UsuarioPuesto::create([
                    'usuario_id' => auth()->user()->id,
                    'puesto_id'  => $puesto->id
                ]);
            }
            $pago= Pago::find('1');
            PagoPuesto::create([
                "puesto_id"         =>  $puesto->id,
                "pago_id"   =>  $pago->id
            ]);
            

            $contents = file_get_contents('./img/logonuevo.png');
            $fileName = 'public/'.$puesto->id.'/logo/logoxdefecto.png';
            \Storage::disk('local')->put($fileName,  $contents);
            $puesto->perfil = 'logoxdefecto.png';
            $contents = file_get_contents('./img/defecto/bannerdefecto.jpg');
            $fileName = 'public/'.$puesto->id.'/banner/bannerxdefecto.jpg';
            \Storage::disk('local')->put($fileName, $contents);
            $puesto->banner = 'bannerxdefecto.jpg';
            
            $puesto->save();
    
        }
        return redirect('/completar');
    }
    public function completar(){
        $up = UsuarioPuesto::where('usuario_id', auth()->user()->id)->first();
        $puesto=$up->puesto_id;
        return view('publicas.tienda2', compact('puesto'));
    }
    public function centrocomercial(Centroscomerciale $centrocomercial){
        $categorias = Categoria::all();
        $puestos = Puesto::where('cencom_id',$centrocomercial->id)->get(); // where(plan = premium);
       
        return view('publicas.centro', compact('centrocomercial','puestos', 'categorias'));
    }

}
