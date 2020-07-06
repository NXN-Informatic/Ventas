<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UsuarioPuesto;
use App\Puesto;
use App\Pago;
use App\PagoPuesto;
use App\EntregaPuesto;
use App\CentrosComerciale;
use App\Bannercat;
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
        $cencom = centroscomerciale::all();
        
        return view('cliente.puestos.edit', compact('puesto', 'categorias', 'subcategorias', 'formapagos', 'formaentregas', 'cencom'));
    }
    public function catalog() {
        $usuariopuesto = UsuarioPuesto::where('usuario_id', auth()->user()->id)->first();
        $puesto = $usuariopuesto->puesto;
        $catalog_url = $this->storeExcel($puesto->id);
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

        $formapagosuser = PagoPuesto::where('puesto_id', $puesto->id)->get();
        
        //$pago_id = old('pago_id');
        $formaentregas = Entrega::all();
        //$entrega_id = old('entrega_id');

        $formaentregasuser = EntregaPuesto::where('puesto_id', $puesto->id)->get();

        $latitud = auth()->user()->latitud;
        $longitud = auth()->user()->longitud;

        $categs = [];
        $categsid = [];
        $subcat = [];
        foreach($puesto->puestosubcategorias as $subcategorias){
            $sub = $subcategorias->subcategoria->id;
            $name = $subcategorias->subcategoria->categoria->name;
            $id = $subcategorias->subcategoria->categoria->id;
            if(!in_array($name, $categs)) {
                $categs[] = $name;
                $categsid[] = $id;
            }
            if(!in_array($sub, $subcat)){
                $subcat[] = $sub;
            }
        }
        $cen = 0;
        if($puesto->cencom_id){
            $cen = $puesto->cencom_id;
        }
        
        $subcategorias = Subcategoria::where('categoria_id', $categsid[0])->get();
        $cencom = CentrosComerciale::all();
        return view('cliente.puestos.edit', compact('categs','subcat','formapagosuser', 'formaentregasuser','latitud','longitud','puesto', 'categorias', 'subcategorias', 'formapagos', 'formaentregas','cencom','cen'));
    }

    public function personalizar(){
        $usuariopuesto = UsuarioPuesto::where('usuario_id', auth()->user()->id)->first();
        $puesto = $usuariopuesto->puesto;
        $categorias = Categoria::all();
        $categoria_id = old('categoria_id');
        if ($categoria_id) {
            $banners = Bannercat::where('categoria_id',$categoria_id)->get();
            $categoria = Categoria::find($categoria_id);
            $subcategorias = $categoria->subcategorias;
        } else {
            $subcategorias = collect();
            $categoria_id = $puesto->puestosubcategorias->first()->subcategoria->categoria->id;
            $banners = Bannercat::where('categoria_id',$categoria_id)->get();
        }
        $formapagos = Pago::all();
        //$pago_id = old('pago_id');
        $formaentregas = Entrega::all();
        //$entrega_id = old('entrega_id');
        
        return view('cliente.puestos.personalizar', compact('puesto', 'categorias', 'subcategorias', 'formapagos', 'formaentregas','banners'));
    }

    public function contacto(){
        $usuariopuesto = UsuarioPuesto::where('usuario_id', auth()->user()->id)->first();
        $puesto = $usuariopuesto->puesto;
        
        return view('cliente.puestos.contacto', compact('puesto'));
    }
    public function contactoupdate(Request $request, Puesto $puesto){
        $rules = [
            'phone2'        =>  'max:14',
            'phone'         =>  'max:14',
            'fbpageid'  => 'max:15',
            'wsp' => 'max:15',
        ];

        $this->validate($request, $rules);

        $puesto->phone2 = $request->input('phone2');
        $puesto->phone = $request->input('phone');
        $puesto->fbpageid = $request->input('fbpageid');
        $puesto->fbpage = $request->input('fbpage');
        $puesto->wsp = $request->input('wsp');  
        $puesto->save();

        $notification = 'Se ha actualizado los datos de su Tienda correctamente';
        return redirect('/home')->with(compact('notification'));
    }

    public function store(Request $request) {
        $rules = [
            'name'          =>  'required|min:3|max:100|unique:puestos',
            'description'   =>  'max:256',
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
                'direccion' => $request->input('direccion'),
                'phone' => $request->input('phone'),
                'phone2' => $request->input('phone2'),
                'maxsubcategorias' => 2,
                'plan_id' => $request->input('planid'),
                'wsp' => $request->input('phone')
            ]);
            $file = $request->file('logo');

            $banner = $request->file('banner');

            if($file != null) {
                $name = $file->getClientOriginalName();
                if(strlen($name)> 49){
                    $name = substr($name,40);
                }
                $fileName = 'public/'.$puesto->id.'/logo/'.$name;
                \Storage::disk('local')->put($fileName,  \File::get($file));
                $puesto->perfil = $name;
            }
            if($banner != null) {
                $name = $banner->getClientOriginalName();
                if(strlen($name)> 49){
                    $name = substr($name,40);   
                }
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
    
            $notification = 'Su Tienda ha sido creada con éxito.';
        }else {
            $notification = 'Usted no Tiene acceso para crear más Productos.';
        }

        return redirect('/puesto/create')->with(compact('notification'));
    }

    public function update(Request $request, Puesto $puesto) {
        $rules = [
            'name'          =>  'min:3|max:100',
            'description'   =>  'max:256',
            'phone2'        =>  'max:14',
            'phone'         =>  'max:14'
        ];

        $this->validate($request, $rules);
        if($request->input('name')){
            $puesto->name = $request->input('name');
        }
        if($request->input('description')){
            $puesto->description = $request->input('description');
        }
        if($request->input('phone')){
            $puesto->phone = $request->input('phone');
        }
        if($request->input('phone2')){
            $puesto->phone2 = $request->input('phone2');
        }
        if($request->input('nombrebanner')){
            $puesto->nombrebanner = $request->input('nombrebanner');
        }
        if($request->input('colornombre')){
            $puesto->colornombre = $request->input('colornombre');
        }
        if($request->input('elegirnos') != null){
            $puesto->elegirnos = $request->input('elegirnos');
        }
        if($request->input('nosotros') != null){
            $puesto->nosotros = $request->input('nosotros');
        }
        if($request->input('direccion')){
            $puesto->direccion = $request->input('direccion');
        }
        if($request->input('wsp')){
            $puesto->wsp = $request->input('wsp');
        }

        if($request->input('cencom')){
            $puesto->completado = 1;
            if($request->input('cencom') != $puesto->cencom_id){
                if($puesto->cencom_id){
                    $ccantiguo = CentrosComerciale::find($puesto->cencom_id);
                    $puesto->cencom_id = $request->input('cencom');
                    $cc = CentrosComerciale::find($puesto->cencom_id);
                    $ccantiguo->cantidad = $ccantiguo->cantidad - 1;
                    $cc->cantidad = $cc->cantidad + 1;
                    $cc->save();
                    $ccantiguo->save();
                }else{
                    $puesto->cencom_id = $request->input('cencom');
                    $cc = CentrosComerciale::find($request->input('cencom'));
                    $cc->cantidad = 1;
                    $cc->save();
                }
            }
        }
        //$puesto->precio_min = $request->input('precio_min');
        $aux=0;
        $file = $request->file('logo');
        $banner = $request->file('banner');
        $banner2 = $request->input('bannerdefault');

        if($banner == null){
            if($banner2 != null){
                $aux=1;
            }
        }

        if($file != null) {
            $name = $file->getClientOriginalName();
            $fileName = 'public/'.$puesto->id.'/logo/'.$name;
            \Storage::disk('local')->put($fileName,  \File::get($file));
            $puesto->perfil = $name;
            $puesto->personalizado = 1;
        }
        
        if($aux==0){
            if($banner != null) {
                $name = $banner->getClientOriginalName();
                $fileName = 'public/'.$puesto->id.'/banner/'.$name;
                \Storage::disk('local')->put($fileName,  \File::get($banner));
                $puesto->banner = $name;
                $puesto->personalizado = 1;
            }
        }else{
            $contents = file_get_contents('.'.$banner2);
            $name = 'public/'.$puesto->id.'/banner/banerdef.jpg';
            \Storage::disk('local')->put($name, $contents);
            $puesto->banner= 'banerdef.jpg';
            $puesto->personalizado = 1;
        }
        
        
        $puesto->save();

        $subcategorias = $request->input('subcategoria_id');
        if($subcategorias != null) {
            $puesto->completado = 1;
            for($i=0 ; $i < count($subcategorias); ++$i) {
                $subcategoria = PuestoSubcategoria::where('subcategoria_id', $subcategorias[$i])->where('puesto_id', $puesto->id)->first();
                if($subcategoria == null){
                    PuestoSubcategoria::create([
                        "puesto_id"         =>  $puesto->id,
                        "subcategoria_id"   =>  $subcategorias[$i]
                    ]);
                }
            }
        }
        $formapagos = $request->input('formapago_id');
        if($formapagos != null) {
            $puesto->completado = 1;
            for($i=0 ; $i < count($formapagos); ++$i) {
                $formapago = PagoPuesto::where('pago_id', $formapagos[$i])->where('puesto_id',$puesto->id)->first();
                if($formapago == null){
                    PagoPuesto::create([
                        "puesto_id"         =>  $puesto->id,
                        "pago_id"   =>  $formapagos[$i]
                    ]);
                }
            }
        }
        $formaentregas = $request->input('formaentrega_id');
        if($formaentregas != null) {
            $puesto->completado = 1;
            for($i=0 ; $i < count($formaentregas); ++$i) {
                $formaentrega = EntregaPuesto::where('entrega_id', $formaentregas[$i])->where('puesto_id',$puesto->id)->first();
                if($formaentrega == null){
                    EntregaPuesto::create([
                        "entrega_id"   =>  $formaentregas[$i],
                        "puesto_id"         =>  $puesto->id
                    ]);
                }
            }
        }
        $notification = 'Se ha actualizado los datos de su Tienda correctamente';
        return redirect('/home')->with(compact('notification'));
    }

    public function compartir(Puesto $puesto) {
        foreach($puesto->usuario_puestos as $usuario_puestos){

        }
        $latitud = $usuario_puestos->user->latitud;
        $longitud = $usuario_puestos->user->longitud;

        $categs = [];
        $categorias = Categoria::all();
        foreach($puesto->puestosubcategorias as $subcategorias){
            $name = $subcategorias->subcategoria->categoria->name;
            if(!in_array($name, $categs)) {
                $categs[] = $name;
            }
        }
        return view('/publicas/puestos', compact('puesto', 'categs', 'categorias', 'latitud', 'longitud'));
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