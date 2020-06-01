<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UsuarioPuesto;
use App\Puesto;
use App\Pago;
use App\PagoPuesto;
use App\EntregaPuesto;
use App\Entrega;
use App\Categoria;
use App\Subcategoria;
use App\PuestoSubcategoria;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CatalogsExport;

class PuestoController extends Controller
{
    public function index() {
        $usuarios_puestos = UsuarioPuesto::where('usuario_id', auth()->user()->id)->get();
        $usupuesto = $usuarios_puestos->first();
        $puesto = Puesto::find($usupuesto->puesto_id);
        return view('cliente.puestos.index', compact('usuarios_puestos', 'puesto'));
    }

    public function create() {
        $categorias = Categoria::all();

        $categoria_id = old('categoria_id');
        if ($categoria_id) {
            $categoria = Categoria::find($categoria_id);
            $subcategorias = $categoria->subcategorias;
        } else $subcategorias = collect();
        return view('cliente.puestos.create', compact('categorias', 'subcategorias'));
    }

    public function edit(Puesto $puesto) {
        $categorias = Categoria::all();
        $categoria_id = old('categoria_id');
        if ($categoria_id) {
            $categoria = Categoria::find($categoria_id);
            $subcategorias = $categoria->subcategorias;
        } else $subcategorias = collect();

        $formapagos = Pago::all();
        //$pago_id = old('pago_id');
        $formaentregas = Entrega::all();
        //$entrega_id = old('entrega_id');
        
        return view('cliente.puestos.edit', compact('puesto', 'categorias', 'subcategorias', 'formapagos', 'formaentregas'));
    }
    public function catalog() {
        $usuariopuesto = UsuarioPuesto::where('usuario_id', auth()->user()->id)->first();
        $puesto = $usuariopuesto->puesto;
        $catalog_url = $this->storeExcel($puesto);
        return view('cliente.puestos.catalog', compact('catalog_url'));
    }

    public function editar(){
        $usuariopuesto = UsuarioPuesto::where('usuario_id', auth()->user()->id)->first();
        $puesto = $usuariopuesto->puesto;
        $categorias = Categoria::all();
        $categoria_id = old('categoria_id');
        if ($categoria_id) {
            $categoria = Categoria::find($categoria_id);
            $subcategorias = $categoria->subcategorias;
        } else $subcategorias = collect();

        $formapagos = Pago::all();
        //$pago_id = old('pago_id');
        $formaentregas = Entrega::all();
        //$entrega_id = old('entrega_id');
        
        return view('cliente.puestos.edit', compact('puesto', 'categorias', 'subcategorias', 'formapagos', 'formaentregas'));
    }

    public function personalizar(){
        $usuariopuesto = UsuarioPuesto::where('usuario_id', auth()->user()->id)->first();
        $puesto = $usuariopuesto->puesto;
        $categorias = Categoria::all();
        $categoria_id = old('categoria_id');
        if ($categoria_id) {
            $categoria = Categoria::find($categoria_id);
            $subcategorias = $categoria->subcategorias;
        } else $subcategorias = collect();

        $formapagos = Pago::all();
        //$pago_id = old('pago_id');
        $formaentregas = Entrega::all();
        //$entrega_id = old('entrega_id');
        
        return view('cliente.puestos.personalizar', compact('puesto', 'categorias', 'subcategorias', 'formapagos', 'formaentregas'));
    }

    public function store(Request $request) {
        $rules = [
            'name'          =>  'required|min:3|max:100|unique:puestos',
            'description'   =>  'max:500',
            'phone2'        =>  'min:9|max:12',
            'phone'         =>  'min:9|max:12',
            'subcategoria_id' => 'required',
            'planid'        => 'required',
        ];
        $this->validate($request, $rules);

        if(auth()->user()->maxpuestos > 0) {
            $puesto = Puesto::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'phone' => $request->input('phone'),
                'phone2' => $request->input('phone2'),
                'maxsubcategorias' => 2,
                'plan_id' => $request->input('planid')
            ]);

            $file = $request->file('logo');
            $banner = $request->file('banner');
            if($file != null) {
                $name = $file->getClientOriginalName();
                $fileName = 'public/'.$puesto->id.'/logo/'.$name;
                \Storage::disk('local')->put($fileName,  \File::get($file));
                $puesto->perfil = $name;
            }
            if($banner != null) {
                $name = $banner->getClientOriginalName();
                $fileName = 'public/'.$puesto->id.'/banner/'.$name;
                \Storage::disk('local')->put($fileName,  \File::get($banner));
                $puesto->banner = $name;
            }
            $puesto->save();
    
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
    
            $notification = 'Se ha creado su Puesto Correctamente.';
        }else {
            $notification = 'Usted no Tiene acceso para crear más Productos.';
        }

        return redirect('/puesto/create')->with(compact('notification'));
    }

    public function update(Request $request, Puesto $puesto) {
        $rules = [
            'name'          =>  'required|min:3|max:100',
            'description'   =>  'max:200',
            'phone2'        =>  'max:14',
            'phone'         =>  'max:14'
        ];

        $this->validate($request, $rules);
        $puesto->name = $request->input('name');
        $puesto->description = $request->input('description');
        $puesto->phone2 = $request->input('phone2');
        $puesto->phone = $request->input('phone');
        $puesto->elegirnos = $request->input('elegirnos');
        $puesto->nosotros = $request->input('nosotros');
        //$puesto->precio_min = $request->input('precio_min');

        $file = $request->file('logo');
        $banner = $request->file('banner');
        if($file != null) {
            $name = $file->getClientOriginalName();
            $fileName = 'public/'.$puesto->id.'/logo/'.$name;
            \Storage::disk('local')->put($fileName,  \File::get($file));
            $puesto->perfil = $name;
        }

        if($request->input('bannerPrueba') != null) {
            $puesto->banner = $request->input('bannerPrueba');
        }else {
            
            if($banner != null) {
                $name = $banner->getClientOriginalName();
                $fileName = 'public/'.$puesto->id.'/banner/'.$name;
                \Storage::disk('local')->put($fileName,  \File::get($banner));
                $puesto->banner = $name;
            }
        }
        $puesto->save();

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
        }
        $formapagos = $request->input('formapago_id');
        if($formapagos != null) {
            for($i=0 ; $i < count($formapagos); ++$i) {
                PagoPuesto::create([
                    "puesto_id"         =>  $puesto->id,
                    "pago_id"   =>  $formapagos[$i]
                ]);
            }
        }
        $formaentregas = $request->input('formaentrega_id');
        if($formaentregas != null) {
            for($i=0 ; $i < count($formaentregas); ++$i) {
                EntregaPuesto::create([
                    "entrega_id"   =>  $formaentregas[$i],
                    "puesto_id"         =>  $puesto->id
                ]);
            }
        }
        $notification = 'Se ha actualizado los datos de su puesto Correctamente';
        return redirect('/puesto')->with(compact('notification'));
    }

    public function compartir(Puesto $puesto) {
        $categs = [];
        $categorias = Categoria::all();
        foreach($puesto->puestosubcategorias as $subcategorias){
            $name = $subcategorias->subcategoria->categoria->name;
            if(!in_array($name, $categs)) {
                $categs[] = $name;
            }
        }
        return view('/publicas/puestos', compact('puesto', 'categs', 'categorias'));
    }

    public function apiTiendas($name) 
    {
        if($name == "feriaTacna") {
            $puestos = Puesto::orderBy('id', 'desc')->limit(8)->get();
            
        }else{
            $puestos = Puesto::where('name', 'like', '%'.$name.'%')->get();
        }
        return $puestos;
    }
    public function storeExcel($puestito){ 
        $filepathh = 'storage/'.$puestito.'/fb_catalog.csv';
        $filePath = 'public/'.$puestito.'/fb_catalog.csv';
        $catalogo = new CatalogsExport();
        $catalogo->idpuesto=$puestito;
        Excel::store($catalogo, $filePath);

        return 'https://www.feriatacna.com/'.$filepathh;
    }
}