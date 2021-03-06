<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Grupo;
use App\UsuarioPuesto;
use App\Producto;
use App\Puesto;
use App\Subcategoria;
use App\PuestoSubcategoria;
use App\ImagenProducto;
use App\Categoria;
use App\Exports\CatalogsExport;

class ProductoController extends Controller
{
    public function index() {
        $usuarioPuesto = UsuarioPuesto::where('usuario_id', auth()->user()->id)->first();
        $puestoSubcategorias = PuestoSubcategoria::where('puesto_id', $usuarioPuesto->puesto_id)->get();
        return view('cliente.producto.index', compact('puestoSubcategorias', 'usuarioPuesto'));  
    }

    public function puestos() {
        $usuarios_puestos = UsuarioPuesto::where('usuario_id', auth()->user()->id)->get();
        return view('cliente.producto.puestos', compact('usuarios_puestos'));
    }

    public function create_grupo() {
        $usuarioPuesto = UsuarioPuesto::where('usuario_id', auth()->user()->id)->first();
        $puestoSubcategorias = PuestoSubcategoria::where('puesto_id', $usuarioPuesto->puesto_id)->get();
        return view('cliente.producto.grupo', compact('usuarioPuesto', 'puestoSubcategorias'));
    }
    public function editargrupo() {
        $usuarioPuesto = UsuarioPuesto::where('usuario_id', auth()->user()->id)->first();
        $puestoSubcategorias = PuestoSubcategoria::where('puesto_id', $usuarioPuesto->puesto_id)->get();
        return view('cliente.grupo.editar', compact('usuarioPuesto', 'puestoSubcategorias'));
    }

    public function create(Producto $producto) {
        $usuarioPuesto = UsuarioPuesto::where('usuario_id', auth()->user()->id)->first();
        $puestoSubcategorias = PuestoSubcategoria::where('puesto_id', $usuarioPuesto->puesto_id)->get();
        $id = Producto::orderBy('id', 'desc')->first();
        $id = $id->id + 1;
        $grupos = collect();
        $producto = collect();
        return view('cliente.producto.create', compact('id', 'puestoSubcategorias', 'usuarioPuesto', 'grupos', 'producto'));  
    }

    public function store(Request $request) {
        $rules = [
            'name'          =>  'required|min:3|max:100',
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
        
        foreach($files as $file){
            $name = $file->getClientOriginalName();
            if(strlen($name)> 49){
                $name = substr($name,40);
            }
            $fileName = 'public/'.$puesto.'/'.$producto->id.'/'.$name;
            $fname = 'storage/'.$puesto.'/'.$producto->id.'/'.$name;
            $imagenurl = 'https://feriatacna.com/storage/'.$puesto.'/'.$producto->id.'/'.$name;
            //indicamos que queremos guardar un nuevo archivo en el disco local
            $producto->imagen_url = $imagenurl;
            $producto->save();
            \Storage::disk('local')->put($fileName,  \File::get($file));
            Image::make($fname)->resize(1200, 1200, function ($constraint) {$constraint->aspectRatio(); $constraint->upsize();
            })->save($fname);
           
            ImagenProducto::create(
                [
                    'producto_id'    => $producto->id,
                    'imagen'   => $name,
                    'imagen_url'    => $imagenurl
                ]
            );
        }
        $pst = Puesto::find($puesto);
        $pst->completado = 1;
        $pst->save();
        
        $notification = '¡Subida Exitosa! Añada más productos';
        return redirect('/producto/add')->with(compact('notification'));
    }

    public function editar(UsuarioPuesto $usuarioPuesto, Producto $producto) {
        $usuarioPuesto = UsuarioPuesto::where('usuario_id', auth()->user()->id)->first();
        $puestoSubcategorias = PuestoSubcategoria::where('puesto_id', $usuarioPuesto->puesto_id)->get();
        return view('cliente.producto.editar', compact('usuarioPuesto', 'producto', 'puestoSubcategorias'));
    }

    public function update(Request $request, Producto $producto) {
        $rules = [
            'name'          =>  'required|min:3|max:100',
            'description'   =>  'max:1000',
            'precio'        =>  'required',
            'grupo'         =>  'required'
        ];
        $this->validate($request, $rules);
        
        $puesto = $request->input('puesto');
        $producto->name = $request->input('name');
        $producto->description = $request->input('description');
        $producto->precio = $request->input('precio');
        $producto->grupo_id = $request->input('grupo');
        $producto->save();
        $files = $request->file('attachment');
        //dd($files);
        if($files){
            foreach($files as $file){
                $name = $file->getClientOriginalName();
                $fileName = 'public/'.$puesto.'/'.$producto->id.'/'.$name;
                $fname = 'storage/'.$puesto.'/'.$producto->id.'/'.$name;
                $imagenurl = 'https://feriatacna.com/storage/'.$puesto.'/'.$producto->id.'/'.$name;
                //indicamos que queremos guardar un nuevo archivo en el disco local
                \Storage::disk('local')->put($fileName,  \File::get($file));
                Image::make($fname)->resize(1200, 1000)->save($fname);
               
                ImagenProducto::create(
                    [
                        'producto_id'    => $producto->id,
                        'imagen'   => $name,
                        'imagen_url'    => $imagenurl
                    ]
                );
            }
            $producto->save();
        }
        
        $notification = 'El producto se actualizó correctamente.';
        return  redirect('/producto/lista')->with(compact('notification'));
        
    }

    public function switch(Request $request, Producto $producto) {
        $producto->activo = $request->input('value');        
        $producto->save();
        $notification = 'El producto se actualizó correctamente.';
        return  redirect('/producto/lista')->with(compact('notification'));
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

        $notification = 'Categoria creada con éxito';
        return redirect('/producto/creargrupo')->with(compact('notification'));
    }
    public function updategrupo(Request $request) {
        $grupo = Grupo::find($request->input('grupo'));
        if($grupo){
            if($request->input('name')){
                $grupo->name = $request->input('name');
            }
            
            $grupo->activo = $request->input('activo');
            $grupo->save();
            $notification = 'La categoria ha sido actualizada';    
        }else{
            $notification = 'La categoria no fue actualizada';
                
        }
        return redirect('/producto/lista')->with(compact('notification'));
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
    public function deleteimagen(Request $request,ImagenProducto $ip) {
        ImagenProducto::destroy($ip->id);
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
            $productos = Producto::where('name', 'like', '%'.$name.'%')->where('activo','1')->get();
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

    public function productos() {
        $subcategorias = Subcategoria::select('subcategorias.*')->inRandomOrder()->get();
        $categorias = Categoria::all();
        $cantidad = \DB::table('productos')->where('activo',1)->count();
        $productos = Producto::where('activo',1)->orderBy('id','asc')->paginate(16);
        return view("publicas.productosDestacados",compact('productos','subcategorias','cantidad','categorias'));
    }
    public function productosDestacadosPaginate() {
        $productos = Producto::where('activo',1)->orderBy('id','asc')->paginate(16);
        return view("publicas.prevproductos",compact('productos'));
    }

    
    public function productosPaginate() {
        $hora = Carbon::parse(now())->format('H');
        $productos = Producto::where('activo','1')->inRandomOrder($hora)->paginate(12);
        return view('publicas.prevproductos', compact('productos'));  
    }
    

    public function productosCategoria($name) {
        $subcategorias = Subcategoria::select('subcategorias.*')->inRandomOrder()->get();
        $hora= Carbon::parse(now())->format('H');
        $categorias = Categoria::all();
        $cantidad = \DB::table('productos')->join('grupos','productos.grupo_id','grupos.id')
        ->join('puesto_subcategorias','puesto_subcategorias.id','grupos.puestosubcategoria_id')
        ->join('subcategorias','puesto_subcategorias.subcategoria_id','subcategorias.id')
        ->where('subcategorias.name',$name)->count();

        $productos = Producto::join('grupos','productos.grupo_id','grupos.id')
                                ->join('puesto_subcategorias','puesto_subcategorias.id','grupos.puestosubcategoria_id')
                                ->join('subcategorias','puesto_subcategorias.subcategoria_id','subcategorias.id')
                                ->select('productos.*')->where('subcategorias.name',$name)->inRandomOrder($hora)->paginate(16);
        return view("publicas.productoCategoria",compact('productos','name','subcategorias','cantidad','categorias'));
    }

    public function productosCategoriaPaginate($name) {
        $hora= Carbon::parse(now())->format('H');
        $productos = Producto::join('grupos','productos.grupo_id','grupos.id')
                                ->join('puesto_subcategorias','puesto_subcategorias.id','grupos.puestosubcategoria_id')
                                ->join('subcategorias','puesto_subcategorias.subcategoria_id','subcategorias.id')
                                ->select('productos.*')->where('subcategorias.name',$name)->inRandomOrder($hora)->paginate(16);
        return view("publicas.prevproductos",compact('productos'));
    }
}