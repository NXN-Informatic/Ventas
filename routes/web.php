<?php

use Illuminate\Support\Facades\Route;
use App\Categoria;
use App\Subcategoria;
use App\CentrosComerciale;
use App\Producto;
use App\Puesto;

Route::get('/', function () {
    $puestos = collect();
    $pst = Puesto::orderBy('id','desc')->limit(5)->get();
    $productos = Producto::limit(8)->get();
    $tiendas = collect();
    $categorias = Categoria::all();
    $subcategorias = Subcategoria::all();
    $cccc = CentrosComerciale::orderBy('id','desc')->limit(10)->get();
    return view('welcome', compact('puestos', 'productos', 'categorias', 'tiendas','pst','subcategorias','cccc'));
});

Auth::routes();
/**
 * Rutas Publicas
 */

 
Route::get('_oauth/{driver}' , 'Auth\LoginController@redirectToProvider')->name('social_auth');
Route::get('login/{driver}/callback' , 'Auth\LoginController@handleProviderCallback');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/puesto/{puesto}/detail', 'Cliente\PuestoController@compartir');
Route::get('/all/productos', 'PublicController@productos');
Route::get('/producto/{producto}/detailProd', 'PublicController@detailProducto');
Route::get('/puestos/all', 'PublicController@puestoAll');
Route::get('/produc/{puesto}/all', 'PublicController@apiproductos');
Route::post('/tienda/create', 'PublicController@create');

/**
 * api rest Publicas
 */ 
Route::get('/productos/{name}/all', 'Cliente\ProductoController@apiProductos');
Route::get('/categoria/{cateogiraId}/apiProductosCategoria', 'Cliente\ProductoController@apiProductosCategoria');
Route::get('/tiendas/{name}/apiTiendas', 'Cliente\PuestoController@apiTiendas');

Route::group(['middleware' => 'auth'], function () {
    /** 
     * CLIENTE
     */

    // Rutas de Cliente => Perfil de Usuario
    Route::get('/user', 'Cliente\UserController@edit');
    Route::get('/acceso', 'Cliente\UserController@acceso');
    Route::put('/acceso/update/{usuario}', 'Cliente\UserController@accesoupdate');
    Route::put('/user/update/{usuario}', 'Cliente\UserController@update');
    Route::get('/position/{latitud}/{longitud}','Cliente\UserController@position');

    Route::get('/movil', 'Cliente\UserController@movil');

    // Rutas de Cliente => Puesto
    Route::get('/puesto', 'Cliente\PuestoController@index');
    Route::get('/puesto/{puesto}/edit', 'Cliente\PuestoController@edit');
    Route::get('/puesto/canales', 'Cliente\PuestoController@catalog');
    Route::put('/puesto/update/{puesto}', 'Cliente\PuestoController@update');
    Route::get('/puesto/create', 'Cliente\PuestoController@create');
    Route::post('/puesto/store', 'Cliente\PuestoController@store');
    Route::get('/puesto/editar', 'Cliente\PuestoController@editar');
    Route::get('/puesto/personalizar', 'Cliente\PuestoController@personalizar');
    Route::get('/puesto/infocontacto', 'Cliente\PuestoController@contacto');
    Route::put('/puesto/contacto/update/{puesto}', 'Cliente\PuestoController@contactoupdate');

    // Productos Cliente
    Route::get('/producto/lista', 'Cliente\ProductoController@index');
    Route::get('/producto/create', 'Cliente\ProductoController@puestos');
    Route::get('/producto/add', 'Cliente\ProductoController@create');
    Route::post('/producto/store', 'Cliente\ProductoController@store');
    Route::get('/productos/{grupo}/all/{usuarioPuesto}', 'Cliente\ProductoController@productos');
    Route::get('/producto/{usuarioPuesto}/editar/{producto}' , 'Cliente\ProductoController@editar');
    Route::put('/producto/update/{producto}', 'Cliente\ProductoController@update');
    Route::put('/producto/{producto}/delete', 'Cliente\ProductoController@delete');

    // Subida de Imagenes
    Route::post('/producto/dropzoneFrom', 'Cliente\ProductoController@dropzoneFrom');
    Route::post('/producto/dropzonedelete', 'Cliente\ProductoController@dropzonedelete');

    // Grupos de Cliente
    Route::get('/producto/creargrupo', 'Cliente\ProductoController@create_grupo');
    Route::post('/producto/grupo', 'Cliente\ProductoController@grupo');

    // Suscripciones
    Route::get('/price', 'Cliente\PrecioController@index');

    /** 
     * ADMINISTRADOR
     */

    // Categorias
    Route::get('/categoria', 'Administrador\CategoriaController@index');
    Route::get('/categoria/create', 'Administrador\CategoriaController@create');
    Route::post('/categoria/store', 'Administrador\CategoriaController@store');
    Route::get('/categoria/{categoria}/edit', 'Administrador\CategoriaController@edit');
    Route::put('/categoria/{categoria}/update', 'Administrador\CategoriaController@update');

    // CentrosComerciales
    Route::get('/cccc', 'Administrador\CentroComercialController@index');
    Route::get('/cccc/create', 'Administrador\CentroComercialController@create');
    Route::post('/cccc/store', 'Administrador\CentroComercialController@store');
    Route::get('/cccc/{cc}/edit', 'Administrador\CategoriaController@edit');
    Route::put('/cccc/{cc}/update', 'Administrador\CategoriaController@update');

    // Codificación
    Route::get('/codificacion', 'Administrador\CodificacionController@index');
    Route::get('/codificacion/create', 'Administrador\CodificacionController@create');
    Route::post('/codificacion/store', 'Administrador\CodificacionController@store');
    Route::get('/codificacion/{codificacion}/edit', 'Administrador\CodificacionController@edit');
    Route::put('/codificacion/{codificacion}/update', 'Administrador\CodificacionController@update');

    // Distrito 
    Route::get('/distrito', 'Administrador\DistritoController@index');
    Route::get('/distrito/create', 'Administrador\DistritoController@create');
    Route::post('/distrito/store', 'Administrador\DistritoController@store');
    Route::get('/distrito/{distrito}/edit', 'Administrador\DistritoController@edit');
    Route::put('/distrito/{distrito}/update', 'Administrador\DistritoController@update');

    Route::get('/entregas', 'Administrador\EntregaController@index');
    Route::get('/entregas/create', 'Administrador\EntregaController@create');
    Route::post('/entregas/store', 'Administrador\EntregaController@store');
    Route::get('/entregas/{entrega}/edit', 'Administrador\EntregaController@edit');
    Route::put('/entregas/{entrega}/update', 'Administrador\EntregaController@update');

    // Documento
    Route::get('/documento', 'Administrador\DocumentoController@index');
    Route::get('/documento/create', 'Administrador\DocumentoController@create');
    Route::post('/documento/store', 'Administrador\DocumentoController@store');
    Route::get('/documento/{documento}/edit', 'Administrador\DocumentoController@edit');
    Route::put('/documento/{documento}/update', 'Administrador\DocumentoController@update');

    // Entrega
    Route::get('/entrega', 'Administrador\EntregaController@index');
    Route::get('/entrega/create', 'Administrador\EntregaController@create');
    Route::post('/entrega/store', 'Administrador\EntregaController@store');
    Route::get('/entrega/{entrega}/edit', 'Administrador\EntregaController@edit');
    Route::put('/entrega/{entrega}/update', 'Administrador\EntregaController@update');

    // Favorito
    Route::get('/favorito', 'Administrador\FavoritoController@index');
    Route::get('/favorito/create', 'Administrador\FavoritoController@create');
    Route::post('/favorito/store', 'Administrador\FavoritoController@store');
    Route::get('/favorito/{favorito}/edit', 'Administrador\FavoritoController@edit');
    Route::put('/favorito/{favorito}/update', 'Administrador\FavoritoController@update');

    // Grupo
    Route::get('/grupo', 'Administrador\GrupoController@index');
    Route::get('/grupo/create', 'Administrador\GrupoController@create');
    Route::post('/grupo/store', 'Administrador\GrupoController@store');
    Route::get('/grupo/{grupo}/edit', 'Administrador\GrupoController@edit');
    Route::put('/grupo/{grupo}/update', 'Administrador\GrupoController@update');

    // Identidad
    Route::get('/identidad', 'Administrador\IdentidadController@index');
    Route::get('/identidad/create', 'Administrador\IdentidadController@create');
    Route::post('/identidad/store', 'Administrador\IdentidadController@store');
    Route::get('/identidad/{identidad}/edit', 'Administrador\IdentidadController@edit');
    Route::put('/identidad/{identidad}/update', 'Administrador\IdentidadController@update');

    // Pago
    Route::get('/pago', 'Administrador\PagoController@index');
    Route::get('/pago/create', 'Administrador\PagoController@create');
    Route::post('/pago/store', 'Administrador\PagoController@store');
    Route::get('/pago/{pago}/edit', 'Administrador\PagoController@edit');
    Route::put('/pago/{pago}/update', 'Administrador\PagoController@update');

    // Paises
    Route::get('/pais', 'Administrador\PaisController@index');
    Route::get('/pais/create', 'Administrador\PaisController@create');
    Route::post('/pais/store', 'Administrador\PaisController@store');
    Route::get('/pais/{pais}/edit', 'Administrador\PaisController@edit');
    Route::put('/pais/{pais}/update', 'Administrador\PaisController@update');

    // Plan
    Route::get('/plan', 'Administrador\PlanController@index');
    Route::get('/plan/create', 'Administrador\PlanController@create');
    Route::post('/plan/store', 'Administrador\PlanController@store');
    Route::get('/plan/{plan}/edit', 'Administrador\PlanController@edit');
    Route::put('/plan/{plan}/update', 'Administrador\PlanController@update');

    // Provincias 
    Route::get('/provincia', 'Administrador\ProvinciaController@index');
    Route::get('/provincia/create', 'Administrador\ProvinciaController@create');
    Route::post('/provincia/store', 'Administrador\ProvinciaController@store');
    Route::get('/provincia/{provincia}/edit', 'Administrador\ProvinciaController@edit');
    Route::put('/provincia/{provincia}/update', 'Administrador\ProvinciaController@update');

    // Regiones
    Route::get('/region', 'Administrador\RegionController@index');
    Route::get('/region/create', 'Administrador\RegionController@create');
    Route::post('/region/store', 'Administrador\RegionController@store');
    Route::get('/region/{region}/edit', 'Administrador\RegionController@edit');
    Route::put('/region/{region}/update', 'Administrador\RegionController@update');    

    // Subcategorias
    Route::get('/subcategoria', 'Administrador\SubCategoriaController@index');
    Route::get('/subcategoria/create', 'Administrador\SubCategoriaController@create');
    Route::post('/subcategoria/store', 'Administrador\SubCategoriaController@store');
    Route::get('/subcategoria/{subcategoria}/edit', 'Administrador\SubCategoriaController@edit');
    Route::put('/subcategoria/{subcategoria}/update', 'Administrador\SubCategoriaController@update');

    // Tipo de Documento
    Route::get('/tipoDoc', 'Administrador\TipoDocController@index');
    Route::get('/tipoDoc/create', 'Administrador\TipoDocController@create');
    Route::post('/tipoDoc/store', 'Administrador\TipoDocController@store');
    Route::get('/tipoDoc/{tipoDoc}/edit', 'Administrador\TipoDocController@edit');
    Route::put('/tipoDoc/{tipoDoc}/update', 'Administrador\TipoDocController@update');

     // Usuarios
    Route::get('/usuarios', 'Administrador\UsuarioController@index');
    Route::get('/usuarios/create', 'Administrador\UsuarioController@create');
    Route::get('/usuarios/{usuario}/info', 'Administrador\UsuarioController@info');
    Route::get('/usuarios/{usuario}/active', 'Administrador\UsuarioController@updateActive');
    Route::get('/usuarios/{usuario}/desactivado', 'Administrador\UsuarioController@updateDelete');
    Route::get('/usuarios/{usuario}/edit', 'Administrador\UsuarioController@edit');
    Route::put('/usuarios/{usuario}/update', 'Administrador\UsuarioController@update');
    Route::post('/usuarios/store', 'Administrador\UsuarioController@store');

    // Visitantes
    Route::get('/visitante', 'Administrador\VisitanteController@index');
    Route::get('/visitante/create', 'Administrador\VisitanteController@create');
    Route::post('/visitante/store', 'Administrador\VisitanteController@store');
    Route::get('/visitante/{visitante}/edit', 'Administrador\VisitanteController@edit');
    Route::put('/visitante/{visitante}/update', 'Administrador\VisitanteController@update');

    /** 
     * API REST
     */
    // Subcategorias
    Route::get('/categorias/{categoria}/subcategorias', 'Cliente\CategoriaController@apiSubcategoria');
    // Grupos
    Route::get('/grupos/{id}/subcategorias', 'Cliente\ProductoController@apiSubcategoriaGrupo');
    // Producto
    Route::get('/producto/{producto}/getProducto', 'Cliente\ProductoController@getProducto');
    // Provincia
    Route::get('/provincia/{region}/apiprovincias', 'Administrador\ProvinciaController@apiprovincias');
    // Regiones
    Route::get('/region/{pais}/regiones', 'Administrador\RegionController@apiregiones');

});
