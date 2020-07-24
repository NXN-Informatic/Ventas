@extends('layouts.app')
@section('title','Nuevo Producto')
@section('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
    <style>
    .botonBtn{
        width:50%;
    }
    @media (max-width: 600px) {
        .botonBtn{
            width:100%;
        }
      }
    </style>
@endsection

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
                        <img src="{{ asset('storage/'.auth()->user()->usuario_puestos->first()->puesto_id.'/logo/'.auth()->user()->usuario_puestos->first()->puesto->perfil)  }}" width="100" height="100" class="img-fluid rounded-circle mb-2" style="background-color:#fff;border: 6px solid #fff">
                    @else
                        <img src="{{ asset('img/defecto/avatar-159236_1280.png') }}" width="100" height="100" class="rounded-circle mt-2" style="border: 6px solid #fff">
                    @endif
                </div>
                <div class="col-lg-10 col-sm-10 col-8">
                    <a href="{{ url('puesto/'.auth()->user()->usuario_puestos->first()->puesto_id.'/detail')}}" target="black">
                    <span class="header-title bold16">
                        {{ auth()->user()->usuario_puestos->first()->puesto->name }}
                    </span>
                    </a>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><span class="regular11" style="color: #ffffff70">{{'Miembro desde '.auth()->user()->usuario_puestos->first()->puesto->created_at->format('M, Y')}}</span></li>
                        </ol>
                    </nav>
                </div>
            </div>
		</div>
        <form action="{{ url('producto/store/') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
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
                            <span class="card-title mb-0 bold15">{{ __('Nuevo Producto') }}</span>
                        </div>
                        <div class="card-body">
                            <label for="attachment" class="btn btn-primary btn-lg medium11">Seleccionar Fotos</label>
                            <input type="file" id="attachment" style="visibility: hidden" accept="image/jpeg,image/png" capture="gallery" name="attachment[]" multiple>
                            <div class="row" id="preview_img">
                            </div>
                            <input type="hidden" name="puesto" value="{{ $usuarioPuesto->puesto->id }}">
                            <div class="row">
                                <div class="col-lg-8 col-sm-8 col-12">
                                    <div class="form-group" style="margin-top: 10px">
                                        <span class="bold12">{{ __('Descripción del producto') }}</span>
                                        <br><br>
                                        <textarea name="description" rows="10" >{{ old('description') }}</textarea>
                                    </div> 
                                </div>
                                <div class="col-lg-4 col-sm-4 col-12">
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
                                <div class="col-lg-12 col-sm-12 col-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-lg" style="background: linear-gradient(85deg, #8f33ac 0%, #ff1a00 100%)"><span class="medium12" style="text-align:center">Añadir producto</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br><br><br>
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
                            var img = $('<img/>').addClass('thumb').attr('src', e.target.result).attr('height', '100px').attr('width', '80px'); //create image element 
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

