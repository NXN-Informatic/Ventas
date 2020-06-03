@extends('layouts.app')
@section('title','Personalizar Puesto')
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
                <li class="breadcrumb-item"><a href="https://feriatacna.com">{{ __('Feria_Tacna') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Personalización') }}</li>
                </ol>
            </nav>
        </div>
        <form action="{{ url('puesto/update/'.$puesto->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ __('Mi Logo') }}</h5>
                    </div>
                    <div class="card-body">
                        @if ($puesto->perfil)
                            <div class="row" id="preview_logo">
                                <img src="{{ asset('storage/'.$puesto->id.'/logo/'.$puesto->perfil) }}" class="img-thumbnail rounded mr-2 mb-2" alt="Angelica Ramos">
                            </div>
                            <input type="file" class="form-control-file" name="logo" id="logo">
                        @else
                            <div class="row" id="preview_logo">
                                <img src="{{ asset('img/imagen.png') }}" class="img-thumbnail rounded mr-2 mb-2" alt="Sin imagen">
                            </div>
                            <input type="file" class="form-control-file" name="logo" id="logo">
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ __('Mi Banner') }}</h5>
                    </div>
                    <div class="card-body">
                        @if ($puesto->banner)
                            <div class="row" id="preview_banner">
                                <img src="{{ asset('storage/'.$puesto->id.'/banner/'.$puesto->banner) }}" class="img-thumbnail rounded mr-2 mb-2" alt="Angelica Ramos">
                            </div>
                            <input type="file" class="form-control-file" name="banner" id="banner">
                        @else
                            <div class="row" id="preview_banner">
                                <img src="{{ asset('img/imagen.png') }}" class="img-thumbnail rounded mr-2 mb-2" alt="Sin imagen">
                            </div>
                            <input type="file" class="form-control-file" name="banner" id="banner">
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Formulario de Usuario -->

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ __('Mensajes') }}</h5>
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
                            <label class="form-label" for="name">¿Por qué elegir tu Puesto?</label>
                            <textarea name="elegirnos" data-provide="markdown" rows="5">{{ old('elegirnos', $puesto->elegirnos) }}</textarea>
                            <input type="hidden" class="form-control form-control-lg" name="name" value="{{ old('name', $puesto->name) }}" required>
                            <input type="hidden" class="form-control form-control-lg" name="description" value="{{old('description', $puesto->description)}}">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="name">Cuentanos sobre ti y tu negocio</label>
                            <textarea name="nosotros" data-provide="markdown" rows="5">{{ old('nosotros', $puesto->nosotros) }}</textarea>
                        </div>
                        <hr>
                        <div class="mt-auto text-center">
                            <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
                        </div>    
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <input type="hidden" class="form-control form-control-lg" name="phone" value="{{ old('phone', $puesto->phone) }}">
                <input type="hidden" class="form-control form-control-lg" name="phone2" value="{{ old('phone2', $puesto->phone2) }}">
            </div>
            <!-- End Formulario de Usuario -->
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
<script>
 
    $(document).ready(function(){
        $('#logo').on('change', function(){ //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
            $('#preview_logo').empty();
            var data = $(this)[0].files; //this file data
            $.each(data, function(index, file){ //loop though each file
                if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file){ //trigger function on successful read
                    return function(e) {
                        var img = $('<img/>').addClass('img-thumbnail rounded mr-2 mb-2').attr('src', e.target.result).attr('height', '50%'); //create image element 
                        $('#preview_logo').append(img); //append image to output element
                    };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });
             
        }else{
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
     });
     $('#banner').on('change', function(){ //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
            $('#preview_banner').empty();
            var data = $(this)[0].files; //this file data
            $.each(data, function(index, file){ //loop though each file
                if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file){ //trigger function on successful read
                    return function(e) {
                        var img = $('<img/>').addClass('img-thumbnail rounded mr-2 mb-2').attr('src', e.target.result).attr('height', '100%').attr('width', '100%'); //create image element 
                        $('#preview_banner').append(img); //append image to output element
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
