@extends('layouts.app')
@section('title','Editar Puesto')
@section('content')
@include('layouts.partials.fbchat')
@include('layouts.partials.menu')
@include('layouts.partials.navbar')

<main class="content">
    <div class="container-fluid">
        <div class="header">
            <div class="row">
                <div class="col-lg-2 col-sm-2 col-4">
                    @if(auth()->user()->usuario_puestos->first()->puesto->perfil)
                        <img src="{{ asset('storage/'.auth()->user()->usuario_puestos->first()->puesto_id.'/logo/'.auth()->user()->usuario_puestos->first()->puesto->perfil)  }}" width="100" height="100" class="img-fluid rounded-circle mb-2" style="border: 6px solid #fff">
                    @else
                        <img src="{{ asset('img/defecto/avatar-159236_1280.png') }}" width="100" height="100" class="rounded-circle mt-2" style="border: 6px solid #fff">
                    @endif
                </div>
                <div class="col-lg-10 col-sm-10 col-8">
                    <a href="{{ url('puesto/'.auth()->user()->usuario_puestos->first()->puesto_id.'/detail')}}" target="black">
                    <h1 style="font-size: 20px" class="header-title">
                        {{ auth()->user()->usuario_puestos->first()->puesto->name }}
                    </h1>
                    </a>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><span style="color: #ffffff70">{{'Miembro desde '.auth()->user()->usuario_puestos->first()->puesto->created_at->format('M, Y')}}</span></li>
                        </ol>
                    </nav>
                </div>
            </div>
		</div>
        <div class="row">
            <!-- Formulario de Usuario -->
            <div class="col-xxl-9">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ __('Actualizar Puesto') }}</h5>
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
                        <form action="{{ url('puesto/update/'.$puesto->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="form-label" for="name">Nombre del Puesto</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name', $puesto->name) }}" required>
                                <small class="form-text text-muted">{{ __('Campo Requerido.') }}</small>
                            </div>
                            @if($puesto->maxsubcategorias != 0)
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
                            @endif
                            <div class="form-group">
                                <label class="form-label" for="phone">Celular del Puesto</label>
                                <input type="text" class="form-control" name="phone" value="{{ old('phone', $puesto->phone) }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="phone2">Celular opcional del Puesto</label>
                                <input type="text" class="form-control" name="phone2" value="{{ old('phone2', $puesto->phone2) }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="logo">Suba el logo de su puesto</label>
                                <input type="file" class="form-control-file" name="logo">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Seleccione Banner por defecto</label>
                                <div class="mb-3">
								<select class="form-control select2" id="bannerDefecto">
                                    <option value="">Selecione</option>
                                    <option value="">Banner1</option>
                                    <option value="">Banner2</option>
                                    <option value="">Banner3</option>
                                </select>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="form-label" for="banner">Suba el Banner de su puesto</label>
                                <input type="file" class="form-control-file" name="banner">
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="form-label" for="description">Descripción del Puesto</label>
                                <textarea name="description" data-provide="markdown" rows="14">{{ old('description', $puesto->description) }}</textarea>
                            </div> 
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Formulario de Usuario -->
            
            <!-- Vista de Usuario -->
            <div class="col-xxl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row no-gutters">
                            <div class="col-sm-12 col-xl-12 col-xxl-12 text-center">
                                <img src="{{ asset('img/store.jpg') }}" width="140" height="140" class="rounded-circle mt-2" alt="Angelica Ramos">
                            </div>
                        </div>
                        <br>
                        <table class="table table-sm my-2">
                            <tbody>
                                <tr>
                                    <th>Nombre</th>
                                    <td>{{ $puesto->name }}</td>
                                </tr>
                                <tr>
                                    <th>Productos Disponibles</th>
                                    <td>{{ $puesto->maxproductos }}</td>
                                </tr>
                                <tr>
                                    <th>Subcategorias Disponibles</th>
                                    <td>{{ $puesto->maxsubcategorias }}</td>
                                </tr>
                                <tr>
                                    <th>Calificación</th>
                                    <td>{{ $puesto->calification }} / 5</td>
                                </tr>
                                <tr>
                                    <th>Celular 1</th>
                                    <td>{{ $puesto->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Celular 2</th>
                                    <td>{{ $puesto->phone2 }}</td>
                                </tr>
                                <tr>
                                    <th>Estado</th>
                                    @if(auth()->user()->status)
                                        <td><span class="badge badge-success">Activado</span></td>
                                    @else
                                        <td><span class="badge badge-danger">Desactivado</span></td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End Vista de Usuario -->
        </div>
    </div>
</main>
@include('layouts.partials.footer')
@endsection

@section('scripts')
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
