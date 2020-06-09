@extends('layouts.app')

@section('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
@endsection
@section('title','Mi Puesto')
@section('content')
@include('layouts.partials.menu')
@include('layouts.partials.navbar')

<main class="content">
    <div class="container-fluid">
        <div class="header">
            <h1 class="header-title">
                {{ __('Panel de Usuario') }}
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">{{ __('Feria_Tacna') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Mis puestos') }}</li>
                </ol>
                <div class="row">
                    <div class="col-12">
                        <a href="{{ url('puesto/'.auth()->user()->usuario_puestos->first()->puesto_id.'/detail')}}" target="black"><button class="btn btn-info btn-lg" style="margin-bottom: 4px"><span style="margin-left:20px; margin-right:20px">Ver mi Tienda</span></button></a>
                        <a target="_blank" href="http://www.facebook.com/sharer.php?u=https://feriatacna.com/puesto/{{ auth()->user()->usuario_puestos->first()->puesto_id }}/detail">
                            <button class="btn mb-1 btn-facebook btn-lg" style="margin-bottom: 4px"><i class="align-left fab fa-facebook" title="Compartir"></i><span style="margin-left:20px; margin-right:20px">{{ __('Compartir') }}</span></button>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        
        <div class="row">
            <!-- Formulario de Usuario -->
            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ __('Nuevo Puesto') }}</h5>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <div class="alert-message">
                                <strong>{{ $errors->first() }}</strong>
                            </div>
                        </div>
                        @endif
                        @if (session('notification'))
                        <div class="alert alert-primary alert-dismissible" role="alert">
                            <div class="alert-icon">
                                <i class="far fa-fw fa-bell"></i>
                            </div>
                            <div class="alert-message">
                                <strong>{{ session('notification') }}</strong>
                            </div>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                            </button>
						</div>
                        @endif
                        <form action="{{ url('puesto/store/') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="name">Nombre del Puesto</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                                <small class="form-text text-muted">{{ __('Campo Requerido.') }}</small>
                            </div>
                            <div class="form-group">
                               <label class="form-label">Seleccione su categoria</label>
                               <div class="mb-3">
								<select class="form-control select2" id="categoria" name="categoria_id" data-toggle="select2">
                                    <optgroup label="Categorias Disponibles">
                                    <option value=""></option>
                                    @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                                    @endforeach
                                    </optgroup>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Seleccione las subcategorias</label>
                                <div class="mb-3">
								<select class="form-control select2" id="subcategoria" name="subcategoria_id[]" data-toggle="select2" multiple>
                                <optgroup label="Subcategorias Disponibles">
                                    @foreach($subcategorias as $subcategoria)
                                        <option value="{{ $subcategoria->id }}">{{ $subcategoria->name }}</option>
                                    @endforeach
                                </optgroup>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="phone">Celular del Puesto</label>
                                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="phone2">Celular opcional del Puesto</label>
                                <input type="text" class="form-control" name="phone2" value="{{ old('phone2') }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="logo">Suba el logo de su puesto</label>
                                <input type="file" class="form-control-file" name="logo">
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="form-label" for="banner">Suba el Banner de su puesto</label>
                                <input type="file" class="form-control-file" name="banner">
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="form-label" for="description">Descripción del Puesto</label>
                                <textarea name="description" data-provide="markdown" rows="14">{{ old('description') }}</textarea>
                            </div> 
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sizedModalLg">
                                Continuar
                            </button>
                           <div class="modal fade" id="sizedModalLg" tabindex="-1" role="dialog" aria-hidden="true">
                               <div class="modal-dialog modal-lg" role="document">
                                   <div class="modal-content">
                                       <div class="modal-header">
                                           <h5 class="modal-title">Elige un Plan</h5>
                                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                            </button>
                                       </div>
                                       <div class="modal-body m-3">
                                        <div class="container-fluid">
                                            <div class="row mt-n3">
                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mx-auto">
                                                    <div class="row justify-content-center mt-3 mb-2">
                                                        <div class="col-auto">
                                                            <nav class="nav btn-group">
                                                                <a href="#monthly" class="btn btn-primary active" data-toggle="tab">Mensual</a>
                                                                <a href="#annual" class="btn btn-light" data-toggle="tab">Anual</a>
                                                            </nav>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-content">
                                                    <div class="tab-pane fade show active" id="monthly">
                                                        <div class="row py-5">
                                                            <div class="col-md-3 mb-3 mb-md-0">
                                                                <div class="card text-center h-100">
                                                                    <div class="card-body d-flex flex-column">
                                                                        <div class="mb-4">
                                                                            <h5>Gratuito</h5>
                                                                            <span class="display-4">S/.0</span>
                                                                        </div>
                                                                        <h6>Incluye:</h6>
                                                                        <ul class="list-unstyled">
                                                                            <li class="mb-2">
                                                                                10 productos
                                                                            </li>
                                                                            <li class="mb-2">
                                                                                1 puesto
                                                                            </li>
                                                                            <li class="mb-2">
                                                                                1 oferta/mes
                                                                            </li>
                                                                        </ul>
                                                                        <div class="mt-auto">
                                                                        <button type="button" class="btn btn-lg btn-outline-primary" name="p1" id="p1">Elegir</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 mb-3 mb-md-0">
                                                                <div class="card text-center h-100">
                                                                    <div class="card-body d-flex flex-column">
                                                                        <div class="mb-4">
                                                                            <h5>Estándar</h5>
                                                                            <span class="display-4">S/.29</span>
                                                                            <span>/mes</span>
                                                                        </div>
                                                                        <h6>Incluye:</h6>
                                                                        <ul class="list-unstyled">
                                                                            <li class="mb-2">
                                                                                50 productos
                                                                            </li>
                                                                            <li class="mb-2">
                                                                                2 puestos
                                                                            </li>
                                                                            <li class="mb-2">
                                                                                1 oferta/sem
                                                                            </li>
                                                                            <li class="mb-2">
                                                                                Enlace Tienda FB
                                                                            </li>
                                                                            <li class="mb-2">
                                                                                Pagos virtuales
                                                                            </li>
                                                                        </ul>
                                                                        <div class="mt-auto">
                                                                            <button type="button" class="btn btn-lg btn-outline-primary" name="p2" id="p2">50% 1er Mes</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 mb-3 mb-md-0">
                                                                <div class="card text-center h-100">
                                                                    <div class="card-body d-flex flex-column">
                                                                        <div class="mb-4">
                                                                            <h5>Premium</h5>
                                                                            <span class="display-4">S/.49</span>
                                                                            <span>/mes</span>
                                                                        </div>
                                                                        <h6>Incluye:</h6>
                                                                        <ul class="list-unstyled">
                                                                            <li class="mb-2">
                                                                                productos ilimitados
                                                                            </li>
                                                                            <li class="mb-2">
                                                                                5 puestos
                                                                            </li>
                                                                            <li class="mb-2">
                                                                                1 oferta/día
                                                                            </li>
                                                                            <li class="mb-2">
                                                                                Posicionamiento
                                                                            </li>
                                                                            <li class="mb-2">
                                                                                Enlace Tienda FB
                                                                            </li>
                                                                            <li class="mb-2">
                                                                                Ventas 100% online
                                                                            </li>
                                                                            <li class="mb-2">
                                                                                Asesoria Comercial
                                                                            </li>
                                                                            <li class="mb-2">
                                                                                Google Analytics
                                                                            </li>
                                                                        </ul>
                                                                        <div class="mt-auto">
                                                                            <button type="button" class="btn btn-lg btn-outline-primary" name="p3" id="p3">50% 1er Mes</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 mb-3 mb-md-0">
                                                                <div class="card text-center h-100">
                                                                    <div class="card-body d-flex flex-column">
                                                                        <div class="mb-4">
                                                                            <h5>Premium</h5>
                                                                            <span class="display-4">S/.49</span>
                                                                            <span>/mes</span>
                                                                        </div>
                                                                        <h6>Incluye:</h6>
                                                                        <ul class="list-unstyled">
                                                                            <li class="mb-2">
                                                                                productos ilimitados
                                                                            </li>
                                                                            <li class="mb-2">
                                                                                5 puestos
                                                                            </li>
                                                                            <li class="mb-2">
                                                                                1 oferta/día
                                                                            </li>
                                                                            <li class="mb-2">
                                                                                Posicionamiento
                                                                            </li>
                                                                            <li class="mb-2">
                                                                                Enlace Tienda FB
                                                                            </li>
                                                                            <li class="mb-2">
                                                                                Ventas 100% online
                                                                            </li>
                                                                            <li class="mb-2">
                                                                                Asesoria Comercial
                                                                            </li>
                                                                            <li class="mb-2">
                                                                                Google Analytics
                                                                            </li>
                                                                        </ul>
                                                                        <div class="mt-auto">
                                                                            <button type="button" class="btn btn-lg btn-outline-primary" name="p4" id="p4">60% 1er mes</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="annual">
                                                        <div class="row py-4">
                                                            <div class="col-sm-3 mb-3 mb-md-0">
                                                                <div class="card text-center h-100">
                                                                    <div class="card-body d-flex flex-column">
                                                                        <div class="mb-4">
                                                                            <h5>Gratuito</h5>
                                                                            <span class="display-4">$0</span>
                                                                        </div>
                                                                        <h6>Incluye:</h6>
                                                                        <ul class="list-unstyled">
                                                                            <li class="mb-2">
                                                                                10 productos
                                                                            </li>
                                                                            <li class="mb-2">
                                                                                1 puesto
                                                                            </li>
                                                                            <li class="mb-2">
                                                                                1 oferta/mes
                                                                            </li>
                                                                        </ul>
                                                                        <div class="mt-auto">
                                                                            <button type="button" class="btn btn-lg btn-outline-primary" name="p5" id="p5">Elegir</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mb-3 mb-md-0">
                                                                <div class="card text-center h-100">
                                                                    <div class="card-body d-flex flex-column">
                                                                        <div class="mb-4">
                                                                            <h5>Estándar</h5>
                                                                            <span class="display-4">S/.399</span>
                                                                            <span class="text-small4">/año</span>
                                                                        </div>
                                                                        <h6>Incluye:</h6>
                                                                        <ul class="list-unstyled">
                                                                            <li class="mb-2">
                                                                                50 productos
                                                                            </li>
                                                                            <li class="mb-2">
                                                                                2 puestos
                                                                            </li>
                                                                            <li class="mb-2">
                                                                                1 oferta/sem
                                                                            </li>
                                                                            <li class="mb-2">
                                                                                Enlace Tienda FB
                                                                            </li>
                                                                            <li class="mb-2">
                                                                                Pagos virtuales
                                                                            </li>
                                                                        </ul>
                                                                        <div class="mt-auto">
                                                                            <button type="button" class="btn btn-lg btn-outline-primary" name="p6" id="p6">10% dscto</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mb-3 mb-md-0">
                                                                <div class="card text-center h-100">
                                                                    <div class="card-body d-flex flex-column">
                                                                        <div class="mb-4">
                                                                            <h5>Premium</h5>
                                                                            <span class="display-4">S/.649</span>
                                                                            <span>/año</span>
                                                                        </div>
                                                                        <h6>Incluye:</h6>
                                                                        <ul class="list-unstyled">
                                                                            <li class="mb-2">
                                                                                productos ilimitados
                                                                            </li>
                                                                            <li class="mb-2">
                                                                                5 puestos
                                                                            </li>
                                                                            <li class="mb-2">
                                                                                1 oferta/día
                                                                            </li>
                                                                            <li class="mb-2">
                                                                                Posicionamiento
                                                                            </li>
                                                                            <li class="mb-2">
                                                                                Enlace Tienda FB
                                                                            </li>
                                                                            <li class="mb-2">
                                                                                Ventas 100% online
                                                                            </li>
                                                                            <li class="mb-2">
                                                                                Asesoria Comercial
                                                                            </li>
                                                                            <li class="mb-2">
                                                                                Google Analytics
                                                                            </li>
                                                                        </ul>
                                                                        <div class="mt-auto">
                                                                            <button type="button" class="btn btn-lg btn-outline-primary" name="p7" id="p7">20% dscto</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 mb-3 mb-md-0">
                                                                <div class="card text-center h-100">
                                                                    <div class="card-body d-flex flex-column">
                                                                        <div class="mb-4">
                                                                            <h5>Premium</h5>
                                                                            <span class="display-4">S/.649</span>
                                                                            <span>/año</span>
                                                                        </div>
                                                                        <h6>Incluye:</h6>
                                                                        <ul class="list-unstyled">
                                                                            <li class="mb-2">
                                                                                productos ilimitados
                                                                            </li>
                                                                            <li class="mb-2">
                                                                                5 puestos
                                                                            </li>
                                                                            <li class="mb-2">
                                                                                1 oferta/día
                                                                            </li>
                                                                            <li class="mb-2">
                                                                                Posicionamiento
                                                                            </li>
                                                                            <li class="mb-2">
                                                                                Enlace Tienda FB
                                                                            </li>
                                                                            <li class="mb-2">
                                                                                Ventas 100% online
                                                                            </li>
                                                                            <li class="mb-2">
                                                                                Asesoria Comercial
                                                                            </li>
                                                                            <li class="mb-2">
                                                                                Google Analytics
                                                                            </li>
                                                                        </ul>
                                                                        <div class="mt-auto">
                                                                            <button type="button" class="btn btn-lg btn-outline-primary" name="p8" id="p8">30% dscto</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                   <div class="modal-footer">
                                        <input type="hidden" name="planid" id="planid" value="">
                                       <button type="submit" class="btn btn-primary">Guardar</button>
                                       <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                   </div>
                                </div>
                               </div>
                           </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Formulario de Usuario -->
        </div>
    </div>
</main>
@include('layouts.partials.footer')
@endsection

@section('scripts')
<script>
    $(function() {
   $("#p1,#p5").on('click', function() {
        $('#planid').val('1');
    });
});
</script>
<script>
    $(function() {
   $("#p2").on('click', function() {
        $('#planid').val('2');
    });
});
</script>
<script>
    $(function() {
   $("#p3").on('click', function() {
        $('#planid').val('3');
    });
});
</script>
<script>
    $(function() {
   $("#p4").on('click', function() {
        $('#planid').val('4');
    });
});
</script>
<script>
    $(function() {
   $("#p5").on('click', function() {
        $('#planid').val('1');
    });
});
</script>
<script>
    $(function() {
   $("#p6").on('click', function() {
        $('#planid').val('5');
    });
});
</script>
<script>
    $(function() {
   $("#p7").on('click', function() {
        $('#planid').val('6');
    });
});
</script>
<script>
    $(function() {
   $("#p8").on('click', function() {
        $('#planid').val('7');
    });
});
</script>
<script>
    $(function() {
        $(".select2").each(function() {
            $(this)
                .wrap("<div class=\"position-relative\"></div>")
                .select2({
                    placeholder: "Select value",
                    dropdownParent: $(this).parent()
                });
        })
        $categoria = $('#categoria');
        $subcategoria = $('#subcategoria');

        $categoria.change(() => {
            const categoriaId = $categoria.val();
            const url = `/categorias/${ categoriaId }/subcategorias`;
            $.getJSON(url, onSubcategorias);
        });

        function onSubcategorias(data) {
            let htmlOptions = '';
            data.forEach(subcategoria => {
                htmlOptions += `<option value="${subcategoria.id}">${subcategoria.name}</option>`;
            });
            $subcategoria.html(htmlOptions);
        }
    });
</script>
@endsection
