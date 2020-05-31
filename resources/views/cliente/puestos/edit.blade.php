@extends('layouts.app')
@section('title','Editar Puesto')
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
            </nav>
        </div>
        <form action="{{ url('puesto/update/'.$puesto->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        <div class="row">
            <!-- Formulario de Usuario -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ __('Información General') }}</h5>
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
                        <div class="form-group">
                            <label class="form-label" for="name">Nombre del Puesto</label>
                            <input type="text" class="form-control form-control-lg" name="name" value="{{ old('name', $puesto->name) }}" required>
                            <small class="form-text text-muted">{{ __('Campo Requerido.') }}</small>
                        </div>
                        @if($puesto->maxsubcategorias != 0)
                        <div class="form-group">
                            <label class="form-label">A qué sector pertenece</label>
                            <div class="mb-3">
                            <select class="form-control select2 form-control-lg" id="categoria" name="categoria_id" data-toggle="select2">
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
                            <label class="form-label">Qué Venderas? (Multiple)</label>
                            <div class="mb-3">
                            <select class="form-control select2 form-control-lg" id="subcategoria" name="subcategoria_id[]" data-toggle="select2" multiple>
                            <optgroup label="Subcategorias Disponibles">
                                <option value=""></option>
                                @foreach($subcategorias as $subcategoria)
                                    <option value="{{ $subcategoria->id }}">{{ $subcategoria->name }}</option>
                                @endforeach
                            </optgroup>
                            </select>
                            </div>
                        </div>
                        @endif
                        <div class="form-group">
                            <label class="form-label">Cómo te pagarán los clientes? (Multiple)</label>
                            <div class="mb-3">
                            <select class="form-control select2 form-control-lg" id="formapago" name="formapago_id[]" data-toggle="select2" multiple>
                            <optgroup label="Formas de pago disponibles">
                                <option value=""></option>
                                @foreach($formapagos as $formapago)
                                    <option value="{{ $formapago->id }}">{{ $formapago->name }}</option>
                                @endforeach
                            </optgroup>
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Cómo entregarás los productos? (Multiple)</label>
                            <div class="mb-3">
                            <select class="form-control select2 form-control-lg" id="formaentrega" name="formaentrega_id[]" data-toggle="select2" multiple>
                            <optgroup label="Formas de entrega disponibles">
                                <option value=""></option>
                                @foreach($formaentregas as $formaentrega)
                                    <option value="{{ $formaentrega->id }}">{{ $formaentrega->name }}</option>
                                @endforeach
                            </optgroup>
                            </select>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="form-label" for="description">Describe tu puesto. </label>
                            <textarea name="description" data-provide="markdown" rows="8">{{ old('description', $puesto->description) }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ __('Información de contacto') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label" for="phone">Celular</label>
                            <input type="text" class="form-control form-control-lg" name="phone" value="{{ old('phone', $puesto->phone) }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="phone2">Celular (opcional)</label>
                            <input type="text" class="form-control form-control-lg" name="phone2" value="{{ old('phone2', $puesto->phone2) }}">
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ __('Personalización') }}</h5>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title mb-0">Logo</h5>
                        @if ($puesto->perfil)
                            <img src="{{ asset('storage/'.$puesto->id.'/logo/'.$puesto->perfil) }}" class="card-img-top mt-2" alt="Angelica Ramos">
                            <input type="file" class="form-control-file" name="logo">
                        @else
                            <img src="{{ asset('img/imagen.png') }}" class="card-img-top mt-2" alt="Sin imagen">
                            <input type="file" class="form-control-file" name="logo">
                        @endif
                        <hr>
                        <h5 class="card-title mb-0">Banner</h5>
                        @if ($puesto->banner))
                            <img src="{{ asset('storage/'.$puesto->id.'/banner/'.$puesto->perfil) }}" class="card-img-top mt-2" alt="Angelica Ramos">
                            <input type="file" class="form-control-file" name="banner">
                        @else
                            <img src="{{ asset('img/imagen.png') }}" class="card-img-top mt-2" alt="Sin imagen">
                            <input type="file" class="form-control-file" name="banner">
                        @endif
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
        </form>
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
    $bannerimg = $('#bannerimg');
    $bannerDefecto = $('#bannerDefecto');

    $bannerDefecto.change(() => {
            const img = $bannerDefecto.val();
            let htmlOptions = '';
            htmlOptions += `<img src="{{ asset('img/${img}') }}" width="100%">`;
            $bannerimg.html(htmlOptions);
        });

</script>
@endsection
