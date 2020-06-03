@extends('layouts.app')
@section('title','Registro')
@section('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
@endsection
@section('content')
<main class="main h-200 w-100">
    <div class="container h-200">
        <div class="row h-200">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-200">
            <div class="d-table-cell align-middle">

            <div class="text-center mt-4">
                <h1 class="h2">{{ __('Complete el registro') }}</h1>
                <p class="lead">
                {{ __('Su tienda en linea ya está casi lista') }}
                </p>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="m-sm-4">
                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <div class="alert-message">
                            <strong>{{ $errors->first() }}</strong>
                        </div>
                    </div>
                    @endif
                        <form role="form" method="POST" action="{{ url('tienda/create') }}">
                        @csrf
                            <div class="form-group">
                            <strong><label>{{ __('¿Cuál es el nombre de su Tienda?') }}</label></strong>
                                <small class="form-text text-muted">{{ __('Introduzca el nombre de la Tienda como quiera que aparezca para sus clientes. Puede cambiar el nombre de su tienda en cualquier momento.') }}</small>
                                
                                <input style="margin-top:7px" class="form-control form-control-lg" type="text" name="name" value="{{ old('name') }}" required />
                                
                            </div>
                            <div class="form-group">
                               <strong><label class="form-label">¿A qué sector pertenece?</label></strong>
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
                            <strong><label class="form-label">¿Qué va a vender?</label></strong>
                                <small class="form-text text-muted">{{ __('Seleccione todas las opciones que requiera su Tienda') }}</small>
                                <div style="margin-top:7px" class="mb-3">
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
                            <strong><label>{{ __('¿A qué número llamarán sus clientes?') }}</label></strong>
                                <small class="form-text text-muted">{{ __('Este es su número principal y se mostrará a sus potenciales clientes.') }}</small>
                                <input style="margin-top:7px" class="form-control form-control-lg" type="text" name="phone" value="{{ old('phone') }}"/>
                                
                            </div>
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-lg btn-primary">{{ __('     Finalizar y seguir al Tablero     ') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </div>
    </div>
</main>
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