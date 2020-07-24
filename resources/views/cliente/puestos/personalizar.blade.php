@extends('layouts.app')
@section('title','Personalizar Puesto')
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
                        <img src="{{ asset('storage/'.auth()->user()->usuario_puestos->first()->puesto_id.'/logo/'.auth()->user()->usuario_puestos->first()->puesto->perfil)  }}" width="100" height="100" class="img-fluid rounded-circle mb-2" style="background-color: #fff;border: 6px solid #fff">
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
        <form action="{{ url('puesto/update/'.$puesto->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <strong><label class="form-label" for="name">Logo de su Tienda</label></strong>
                            <small class="form-text text-muted" style="margin-bottom: 0px" >{{ __('El logo por defecto es Feria tacna, puedes comenzar con este o subir uno propio.') }}</small>
                        </div>
                        <div class="card-body">
                            @if ($puesto->perfil)
                                <input type="file" class="form-control-file" accept="image/jpeg,image/png" capture="gallery" name="logo" id="logo">
                                <div class="row" id="preview_logo" style="margin: auto;margin-top: 7px">
                                    <img src="{{ asset('storage/'.$puesto->id.'/logo/'.$puesto->perfil) }}" class="img-thumbnail rounded mr-2 mb-2" alt="Angelica Ramos">
                                </div>
                            @else
                            <input type="file" class="form-control-file" accept="image/jpeg,image/png" capture="gallery" name="logo" id="logo">
                                <div class="row" id="preview_logo" style="margin:auto ;margin-top: 7px;">
                                    <img src="{{ asset('img\logonuevo.png') }}" class="img-thumbnail rounded mr-2 mb-2" alt="Sin imagen">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            </div>
                        <div class="card-body" style="margin-top: -15px">
                            <div class="form-group">
                                <strong><label class="form-label" for="description">Describe de tu Tienda</label></strong>
                                <small class="form-text text-muted" style="margin-bottom: 7px" >{{ __('Describe brevemente tu negocio. (Máx 40 palabras)') }}</small>
                                <textarea name="description" maxlength="500" data-provide="markdown" rows="6">{{ old('description', $puesto->description) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card-body text-center">
                        <button type="submit" class="btn btn-primary btn-lg" style="background: linear-gradient(85deg, #8f33ac 0%, #ff1a00 100%);"><span>Guardar cambios</span></button>
                    </div>
                </div>
            </div>
        </form>
        <br><br>
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
                        var img = $('<img/>').addClass('img-thumbnail rounded mr-2 mb-2').attr('src', e.target.result).attr('height', 'auto').attr('width', '100%'); //create image element 
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
