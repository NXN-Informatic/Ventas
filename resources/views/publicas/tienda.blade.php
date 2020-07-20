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
            <div class="col-lg-4 col-sm-12 col-12">
                <div class="card" style="margin-top: 50px">
                    <img class="card-img-top" src="img/photos/unsplash-1.jpg" alt="Unsplash">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Card with image and links</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-sm-12 col-12 mx-auto d-table h-200">
                <div class="d-table-cell align-middle">
                    <div class="card shad" style="margin-top: 50px">
                        <div class="card-header">
                            <span class="bold16">Su tienda en linea ya casi esta lista</span>
                        </div>
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
                                        <small class="form-text text-muted">{{ __('Puede cambiar el nombre de su tienda en cualquier momento.') }}</small>
                                        <input style="margin-top:7px" class="form-control form-control-lg" type="text" name="name" value="{{ old('name') }}" required />
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12 col-12">
                                            <div class="form-group">
                                                <strong><label class="form-label">¿A qué sector pertenece?</label></strong>
                                                <div class="mb-3">
                                                    <select class="form-control select2" id="categoria" name="categoria_id" data-toggle="select2">
                                                        <optgroup label="Opciones disponibles">
                                                        <option value=""></option>
                                                        @foreach($categorias as $categoria)
                                                            <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                                                        @endforeach
                                                        </optgroup>
                                                    </select>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-12 col-12">
                                            <div class="form-group">
                                                <strong><label class="form-label">¿Qué productos venderá?</label></strong>
                                                <div class="mb-3">
                                                    <select class="form-control select2" id="subcategoria" name="subcategoria_id[]" data-toggle="select2" multiple>
                                                <optgroup label="Opciones disponibles">
                                                    @foreach($subcategorias as $subcategoria)
                                                        <option value="{{ $subcategoria->id }}">{{ $subcategoria->name }}</option>
                                                    @endforeach
                                                </optgroup>
                                                </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-lg btn-primary" style="background: linear-gradient(85deg, #8f33ac 0%, #ff1a00 100%)"><span class="bold12">Siguiente</span></button>
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