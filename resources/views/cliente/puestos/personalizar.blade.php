@extends('layouts.app')
@section('title','Personalizar Puesto')
@section('content')
@include('layouts.partials.fbchat')
@include('layouts.partials.menu')
@include('layouts.partials.navbar')

<main class="content">
    <div class="container-fluid">
        <div class="header">
            <h1 style="font-size: 50px" class="header-title">
                {{ __('Mi Tienda') }}
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('puesto/'.auth()->user()->usuario_puestos->first()->puesto_id.'/detail')}}" target="_blank">Tablero</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Personalizar</li>
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
        <form action="{{ url('puesto/update/'.$puesto->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <strong><label class="form-label" for="name">Portada de su Tienda</label></strong>
                            </div>
                        <div class="card-body">
                            <div class="row">
                                <div class=" col-sm-6">
                                    <small class="form-text text-muted" style="margin-bottom: 7px; margin-top:-10px" >{{ __('Suba desde su equipo:') }}</small>
                                    <input type="file" class="form-control-file" accept="image/jpeg,image/png" capture="gallery" name="banner" id="banner">
                                </div>
                                <div class=" col-sm-6">
                                    <small class="form-text text-muted" style="margin-bottom: 7px; margin-top:-10px" >{{ __('O elija una de estas:') }}</small>
                                    <select class="form-control select2 form-control-lg" id="bannerdefault" name="bannerdefault" data-toggle="select2">
                                        <optgroup label="Banners disponibles">
                                            <option value=""></option>
                                            @foreach($banners as $banner)
                                                <option value="{{ '/img/defecto/'.$banner->imagen}}">{{ $banner->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="row" id="preview_banner">
                                @if ($puesto->banner)
                                    <img src="{{ asset('storage/'.$puesto->id.'/banner/'.$puesto->banner) }}" class="img-thumbnail rounded mr-2 mb-2" alt="Angelica Ramos">
                                @else
                                    <img src="{{ asset('img/imagen.png') }}" class="img-thumbnail rounded mr-2 mb-2" alt="Sin imagen">
                                @endif
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6 col-lg-6 col-6">
                                    <strong><label class="form-label" for="name"></label></strong>
                                    <small class="form-text text-muted" style="margin-bottom: 7px" >{{ __('Mostrar nombre de tienda sobre Portada') }}</small>
                                    <div class="custom-control custom-switch">
                                        <input id="mostrarnombre" name="nombrebanner" data-id="{{$puesto->nombrebanner}}" onclick="$(this).attr('value',$(this).val()? 0 : 1)" value = "{{$puesto->nombrebanner}}"  class="custom-control-input" type="checkbox" {{ $puesto->nombrebanner ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="mostrarnombre" style="margin-left: 10px">Si/No</label>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6 col-lg-6 col-6">
                                    <strong><label class="form-label" for="name"></label></strong>
                                    <small class="form-text text-muted" style="margin-bottom: 7px" >{{ __('Color del texto') }}</small>
                                    <input type="color" name="colornombre" id="colornombre" value="{{$puesto->colornombre}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <strong><label class="form-label" for="name">Logo de su Tienda</label></strong>
                            <small class="form-text text-muted" style="margin-bottom: 0px" >{{ __('El logo por defecto es Feria tacna, puedes comenzar con este o subir uno propio.') }}</small>
                        </div>
                        <div class="card-body">
                            @if ($puesto->perfil)
                                <div class="row" id="preview_logo">
                                    <img src="{{ asset('storage/'.$puesto->id.'/logo/'.$puesto->perfil) }}" class="img-thumbnail rounded mr-2 mb-2" alt="Angelica Ramos">
                                </div>
                                <input type="file" class="form-control-file" accept="image/jpeg,image/png" capture="gallery" name="logo" id="logo">
                            @else
                                <div class="row" id="preview_logo">
                                    <img src="{{ asset('default\perfil.png') }}" class="img-thumbnail rounded mr-2 mb-2" alt="Sin imagen">
                                </div>
                                <input type="file" class="form-control-file" accept="image/jpeg,image/png" capture="gallery" name="logo" id="logo">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Formulario de Usuario -->
    
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <strong><label class="form-label" for="name">¿Porque elegirlos?</label></strong>
                                <small class="form-text text-muted" style="margin-bottom: 7px" >{{ __('Resalte sobre su competencia. (Máx 100 palabras)') }}</small>
                                <textarea name="elegirnos" data-provide="markdown" rows="5">{{ old('elegirnos', $puesto->elegirnos) }}</textarea>
                                <input type="hidden" class="form-control form-control-lg" name="name" value="{{ old('name', $puesto->name) }}" required>
                                <input type="hidden" class="form-control form-control-lg" name="description" value="{{old('description', $puesto->description)}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                            <strong><label class="form-label" for="name">Cuentanos sobre ti y tu negocio</label></strong>
                            <small class="form-text text-muted" style="margin-bottom: 7px" >{{ __('Cuenta a tus clientes un poco de ti. Máx 70 palabras.') }}</small>
                                <textarea name="nosotros" data-provide="markdown" rows="5">{{ old('nosotros', $puesto->nosotros) }}</textarea>
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
       
        <div class="row">
            <div class="col-12">
                    <div class="card-body text-center">
                        <button type="submit" class="btn btn-primary btn-lg"><span style="margin-left: 83px; margin-right: 83px">Guardar datos</span></button>
                    </div>
            </div>
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
    $bannerimg = $('#preview_banner');
    $bannerDefecto = $('#bannerdefault');

    $bannerDefecto.change(() => {
            $bannerimg.empty();
            var imag = ".."+$bannerDefecto.val();
            var img = $('<img/>').addClass('img-thumbnail rounded mr-2 mb-2').attr('src', imag).attr('height', '100%').attr('width', '100%'); //create image element 
            $bannerimg.append(img);
        });
    });
     
    </script>
@endsection
