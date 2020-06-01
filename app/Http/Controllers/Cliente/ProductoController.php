<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Grupo;
use App\UsuarioPuesto;
use App\Producto;
use App\PuestoSubcategoria;
use App\ImagenProducto;
use App\Categoria;
use App\Exports\CatalogsExport;

class ProductoController extends Controller
{
    public function index(UsuarioPuesto $usuarioPuesto) {
        $puestoSubcategorias = PuestoSubcategoria::where('puesto_id', $usuarioPuesto->puesto_id)->get();
        return view('cliente.producto.index', compact('puestoSubcategorias', 'usuarioPuesto'));  
    }

    public function productos(Grupo $grupo, usuarioPuesto $usuarioPuesto) {
        $productos = Producto::where('grupo_id', $grupo->id)->paginate(10);
        return view('cliente.producto.productos', compact('productos', 'usuarioPuesto'));
    }

    public function puestos() {
        $usuarios_puestos = UsuarioPuesto::where('usuario_id', auth()->user()->id)->get();
        return view('cliente.producto.puestos', compact('usuarios_puestos'));
    }

    public function create_grupo(UsuarioPuesto $usuarioPuesto) {
        $puestoSubcategorias = PuestoSubcategoria::where('puesto_id', $usuarioPuesto->puesto_id)->get();
        return view('cliente.producto.grupo', compact('usuarioPuesto', 'puestoSubcategorias'));
    }

    public function create(UsuarioPuesto $usuarioPuesto) {
        $puestoSubcategorias = PuestoSubcategoria::where('puesto_id', $usuarioPuesto->puesto_id)->get();
        $id = Producto::orderBy('id', 'desc')->first();
        $id = $id->id + 1;
        $grupos = collect();
        $producto = collect();
        return view('cliente.producto.create', compact('id', 'puestoSubcategorias', 'usuarioPuesto', 'grupos', 'producto'));  
    }

    public function store(Request $request) {
        $rules = [
            'name'          =>  'required|min:3|max:100|regex:/^[\pL\s\-]+$/u',
            'description'   =>  'max:1000',
            'precio'        =>  'required',
            'grupo'         =>  'required',
        ];
        $this->validate($request, $rules);
        
        $producto = Producto::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'precio' => $request->input('precio'),
            'grupo_id' => $request->input('grupo')
        ]);

        $files = $request->file('attachment');
        //dd($files);
        $puesto = $request->input('puesto');
        $producto = $producto->id;
        foreach($files as $file){
            $name = $file->getClientOriginalName();
            $fileName = 'public/'.$puesto.'/'.$producto.'/'.$name;
            $imagenurl = 'https://feriatacna.com/storage/'.$puesto.'/'.$producto.'/'.$name;
            //indicamos que queremos guardar un nuevo archivo en el disco local
            \Storage::disk('local')->put($fileName,  \File::get($file));

            ImagenProducto::create(
                [
                    'producto_id'    => $producto,
                    'imagen'   => $name,
                    'imagen_url'    => $imagenurl
                ]
            );
        }
        
        
        
        $notification = 'El producto se creo correctamente';
        return redirect('/producto/'.$request->input('puesto_id').'/add')->with(compact('notification'));
    }

    public function editar(UsuarioPuesto $usuarioPuesto, Producto $producto) {
        return view('cliente.producto.edit', compact('usuarioPuesto', 'producto'));
    }

    public function update(Request $request, Producto $producto) {
        $rules = [
            'name'          =>  'required|min:3|max:100|regex:/^[\pL\s\-]+$/u',
            'description'   =>  'max:1000',
            'precio'        =>  'required'
        ];
        $this->validate($request, $rules);

        $producto->name = $request->input('name');
        $producto->description = $request->input('description');
        $producto->precio = $request->input('precio');
        $producto->stock = $request->input('stock');
        $producto->save();

        $notification = 'El producto se actualizó correctamente.';
        return back()->with(compact('notification'));
        
    }

    public function grupo(Request $request) {
        $rules = [
            'name'              =>  'required|min:3|max:25',
            'description'       =>  'max:100',
            'subcategoria_id'   =>  'required'
        ];
        $this->validate($request, $rules);
        $subcategorias = $request->input('subcategoria_id');

        Grupo::create([
            'name'  => $request->input('name'),
            'descripcion' => $request->input('description'),
            'puestosubcategoria_id' => $request->input('subcategoria_id') 
        ]);

        $notification = 'Se ha creado su Grupo Correctamente';
        return redirect('/puesto')->with(compact('notification'));
    }

    public function dropzoneFrom(Request $request)
    {
        $files = $request->file('file');
        $puesto = $request->input('puesto');
        $producto = $request->input('producto');
        foreach($files as $file){
            $name = $file->getClientOriginalName();
            $fileName = 'public/'.$puesto.'/'.$producto.'/'.$name;
            $imagenurl = 'https://feriatacna.com/storage/'.$puesto.'/'.$producto.'/'.$name;
            //indicamos que queremos guardar un nuevo archivo en el disco local
            \Storage::disk('local')->put($fileName,  \File::get($file));

            ImagenProducto::create(
                [
                    'producto_id'    => $producto,
                    'imagen'   => $name,
                    'imagen_url'    => $imagenurl
                ]
            );
        }
        $this->storeExcel($puesto);
    }

    public function dropzonedelete(Request $request) {
        $name = $request->input('name');
        $producto_id = $request->input('producto');
        $puesto_id = $request->input('puesto');

        $imagen = ImagenProducto::where('producto_id', $producto_id)->where('imagen', $name)->delete();

        $fileName = 'public/'.$puesto_id.'/'.$producto_id.'/'.$name;
        \Storage::delete($fileName);
    }

    // API REST MODULE PRODUCT

    public function apiSubcategoriaGrupo($id){
        return Grupo::where('puestosubcategoria_id', $id)->get([
            'id', 'name'
        ]);
    }

    public function getProducto(Producto $producto) {
        return $producto;
    }

    public function delete(Request $request,Producto $producto) {
        $imagenes = $producto->imagen_productos;
        foreach($imagenes as $imagen) {
            $fileName = 'public/'.$request->input('puesto_id').'/'.$producto->id.'/'.$imagen->imagen;
            \Storage::delete($fileName);
            ImagenProducto::destroy($imagen->id);
        }
        Producto::destroy($producto->id);
        return back();
    }

    public function apiProductos($name) {
        $data = array();
        if($name == "feriaTacna") {
            $productos = Producto::orderBy('id', 'desc')->limit(8)->get();
            foreach($productos as $producto) {
                $image = ImagenProducto::where('producto_id', $producto->id)->first();
                $data[] = array(
                    "name" => $producto->name,
                    "image" => ($image)? $image->imagen : null,
                    "precio" => $producto->precio,
                    "puesto" => $producto->grupo->puestosubcategoria->puesto->id,
                    "id" => $producto->id,
                    "description" => $producto->description,
                    "stock" => $producto->stock
                );
            }
        }else{
            $productos = Producto::where('name', 'like', '%'.$name.'%')->get();
            foreach($productos as $producto) {
                $image = ImagenProducto::where('producto_id', $producto->id)->first();
                $data[] = array(
                    "name" => $producto->name,
                    "image" => ($image)? $image->imagen : null,
                    "precio" => $producto->precio,
                    "puesto" => $producto->grupo->puestosubcategoria->puesto->id,
                    "id" => $producto->id,
                    "description" => $producto->description,
                    "stock" => $producto->stock
                );
            }
        }
        return $data;
    }

    public function apiProductosCategoria(Categoria $cateogiraId) {
        $data = array();
        foreach($cateogiraId->subcategorias as $subcategorias) {
            if($subcategorias->puestosubcategorias != null) {
                foreach($subcategorias->puestosubcategorias as $puestoSubcategorias) {
                    if($puestoSubcategorias->grupos != null){
                        foreach($puestoSubcategorias->grupos as $grupos) {
                            if($grupos->productos != null) {
                                foreach($grupos->productos as $productos) {
                                    $image = ImagenProducto::where('producto_id', $productos->id)->first();
                                    $data[] = array(
                                        "name" => $productos->name,
                                        "image" => ($image)? $image->imagen : null,
                                        "precio" => $productos->precio,
                                        "puesto" => $puestoSubcategorias->puesto_id,
                                        "id" => $productos->id,
                                        "description" => $productos->description,
                                        "stock" => $productos->stock
                                    );
                                }
                            }
                        }
                    }
                }
            }
        }
        return $data;
    }
}