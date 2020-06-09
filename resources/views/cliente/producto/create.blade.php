@extends('layouts.app')
@section('title','Nuevo Producto')
@section('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
@endsection

@section('content')
@include('layouts.partials.menu')
@include('layouts.partials.navbar')
    
<main class="content">
    <div class="container-fluid">

        <div class="header">
            <h1 style="font-size: 50px" class="header-title">
                {{ __('Catálogo') }}
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('puesto/'.auth()->user()->usuario_puestos->first()->puesto_id.'/detail')}}" target="black">Tablero</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Añadir Producto</li>
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
        <form action="{{ url('producto/store/') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-4 col-12">
                @if (session('notification'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <div class="alert-icon">
                    <i class="far fa-fw fa-heart"></i>
                </div>
                <div class="alert-message">
                    <strong>{{ session('notification') }}</strong>
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            @endif
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="card-title mb-0">{{ __('Nuevo Producto') }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <div class="alert-message">
                                <strong>{{ $errors->first() }}</strong>
                            </div>
                        </div>
                        @endif
                        
                            <div class="form-group">
                                <label class="form-label" for="name">Nombre de producto</label>
                                <input type="text" class="form-control form-control-lg" name="name" value="{{ old('name') }}" required>
                                <small class="form-text text-muted">{{ __('Campo Requerido.') }}</small>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="precio">Precio</label>
                                <input type="number" class="form-control form-control-lg" name="precio" value="{{ old('precio') }}" required>
                                <small class="form-text text-muted">{{ __('Campo Requerido.') }}</small>
                            </div>
                        <!--<div class="form-group">
                               <label class="form-label">Pertenece a</label>
                               <div class="mb-3">
								<select class="form-control select2" id="subcategoria" name="subcategoria" data-toggle="select2">
                                    <optgroup label="Subcategorias Disponibles">
                                    <option value=""></option>
                                    foreach($puestoSubcategorias as $puestosub)
                                        <option value=" $puestosub->id }}"> $puestosub->subcategoria->name </option>
                                    //endforeach
                                    </optgroup>
                                </select>
                                </div>
                            </div>-->
                            <div class="form-group">
                               <label class="form-label">Añadir a la categoría</label>
                               <div class="mb-3">
								<select class="form-control form-control-lg select2" id="grupo" name="grupo" data-toggle="select2">
                                    <optgroup label="Grupos Disponibles">
                                    <option value=""></option>
                                    @foreach ($puestoSubcategorias as $psub)
                                        @foreach($psub->grupos as $grupo)
                                        <option value="{{ $grupo->id }}">{{ $grupo->name }}</option>
                                        @endforeach
                                    @endforeach
                                    </optgroup>
                                </select>
                                </div>
                            </div>
                            <input type="hidden" name="puesto_id" value={{ $usuarioPuesto->id }}>
                            <br>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="card-title mb-0">{{ __('Fotos del producto') }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                            <input type="hidden" name="puesto" value="{{ $usuarioPuesto->puesto->id }}">
                            <input type="file" id="attachment" name="attachment[]" multiple>
                            <hr>
                            <div class="row" id="preview_img">
                                
                            </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="card-title mb-0">{{ __('Descripción del producto') }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <!-- End Formulario de Usuario <label class="form-label" for="description">Descripción del Producto</label> -->
                            <textarea name="description" rows="10" >{{ old('description') }}</textarea>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary btn-lg"><span style="margin-left: 83px; margin-right: 83px">Añadir producto</span></button>
            </div>
        </div>
        </form>
    </div>
</main>
@include('layouts.partials.footer')
@endsection

@section('scripts')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/z3fq59r5g34njc4c1xr6o53d6go75rgc5p8wojlzgqkc3n8j/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea'});</script>
    <script>
        $(function() {
            $subcategoria = $('#subcategoria');
            $grupo = $('#grupo');

            $subcategoria.change(() => {
                const subcategoriaId = $subcategoria.val();
                const url = `/grupos/${ subcategoriaId }/subcategorias`;
                $.getJSON(url, onGrupos);
            });

            function onGrupos(data) {
                let htmlOptions = '';
                data.forEach(grupos => {
                    htmlOptions += `<option value="${grupos.id}">${grupos.name}</option>`;
                });
                $grupo.html(htmlOptions);
            }

            function onProductos(data) {
                console.log(data);
            }
        });
        Dropzone.options.dropzoneFrom = { 
        // Change following configuration below as you need there bro
        autoProcessQueue: true,
        uploadMultiple: true,
        parallelUploads: 2,
        maxFiles: 10,
        maxFilesize: 5,
        addRemoveLinks: true,
        dictRemoveFile: "Eliminar",
        dictDefaultMessage: "<h3 class='sbold'>Suba las fotos del producto<h3>",
        acceptedFiles: 'image/*',
        //another of your configurations..and so on...and so on...
        init: function() {
            this.on("removedfile", function(file) {
                console.log(file.name);
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ url('/producto/dropzonedelete') }}",
                    data: {
                        "_token": $("meta[name='csrf-token']").attr("content"),
                        "name": file.name,
                        "puesto": "<?php echo $usuarioPuesto->puesto_id; ?>"
                    },
                    dataType: "json",
                    method: "POST",
                    success: function(response) {
                        //Acciones si success
                    },
                    error: function () {
                        //Acciones si error
                    }
                });
            });
        }}
    </script>
    <script>
 
        $(document).ready(function(){
         $('#attachment').on('change', function(){ //on file input change
            if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
            {
                $('#preview_img').empty();
                var data = $(this)[0].files; //this file data
                $.each(data, function(index, file){ //loop though each file
                    if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                        var fRead = new FileReader(); //new filereader
                        fRead.onload = (function(file){ //trigger function on successful read
                        return function(e) {
                            var img = $('<img/>').addClass('thumb').attr('src', e.target.result).attr('height', '200px').attr('width', '200px'); //create image element 
                            $('#preview_img').append(img); //append image to output element
                        };
                        })(file);
                        fRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });
                 
            }else{
                alert("Your browser doesn't support File API!"); //if File API is absent
            }
         });
        });
         
        </script>
    
@endsection

