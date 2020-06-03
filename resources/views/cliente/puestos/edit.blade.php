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
                            <label class="form-label">A qué sector pertenece?</label>
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
                        <hr>
                        <div class="form-group">
                            <label class="form-label" for="description">Describe tu puesto. </label>
                            <textarea name="description" data-provide="markdown" rows="8">{{ old('description', $puesto->description) }}</textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
                        <br><br>
                        <div id="map" style="height: 500px;"></div>
                
                        <input type="hidden" id="coords" />
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
                        <h5 class="card-title mb-0">{{ __('Entrega & Pagos') }}</h5>
                    </div>
                    <div class="card-body">
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
                    </div>
                </div>
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
    initMap = function () 
    {
    //usamos la API para geolocalizar el usuario
        navigator.geolocation.getCurrentPosition(
          function (position){
            latitud = "<?php echo $latitud ?>";
            longitud = "<?php echo $longitud ?>";
            
            if(latitud === ""){
                coords =  {
                    lng: position.coords.longitude,
                    lat: position.coords.latitude
                };
            }
            setMapa(coords);  //pasamos las coordenadas al metodo para crear el mapa
            
           
          },function(error){console.log(error);});

    }
    
    function setMapa (coords)
    {
        if(coords.lat === undefined){
            //Se crea una nueva instancia del objeto mapa
            var map = new google.maps.Map(document.getElementById('map'),
            {
                zoom: 13,
                center:new google.maps.LatLng("<?php echo $latitud ?>","<?php echo $longitud ?>"),

            });
            //Creamos el marcador en el mapa con sus propiedades
            //para nuestro obetivo tenemos que poner el atributo draggable en true
            //position pondremos las mismas coordenas que obtuvimos en la geolocalización
            marker = new google.maps.Marker({
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                position: new google.maps.LatLng("<?php echo $latitud ?>","<?php echo $longitud ?>"),

            });
        }else{
            //Se crea una nueva instancia del objeto mapa
            var map = new google.maps.Map(document.getElementById('map'),
            {
                zoom: 13,
                center:new google.maps.LatLng(coords.lat,coords.lng),

            });
            //Creamos el marcador en el mapa con sus propiedades
            //para nuestro obetivo tenemos que poner el atributo draggable en true
            //position pondremos las mismas coordenas que obtuvimos en la geolocalización
            marker = new google.maps.Marker({
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                position: new google.maps.LatLng(coords.lat,coords.lng),

            });
            
            // const url = `/position/${coords.lat}/${coords.lng}`;
            // $.getJSON(url, function(data){
                
            // });
        }
        //agregamos un evento al marcador junto con la funcion callback al igual que el evento dragend que indica 
        //cuando el usuario a soltado el marcador
        marker.addListener('click', toggleBounce);
        
        marker.addListener( 'dragend', function (event)
        {
            //escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
            document.getElementById("coords").value = this.getPosition().lat()+","+ this.getPosition().lng();
            // console.log(this.getPosition().lat());
            // console.log(this.getPosition().lng());
            const url = `/position/${this.getPosition().lat()}/${this.getPosition().lng()}`;
            $.getJSON(url, onRespuesta);
        });
    }
    function onRespuesta(data){

    }

    //callback al hacer clic en el marcador lo que hace es quitar y poner la animacion BOUNCE
    function toggleBounce() {
    if (marker.getAnimation() !== null) {
        marker.setAnimation(null);
    } else {
        marker.setAnimation(google.maps.Animation.BOUNCE);
    }
    }
    //initMap(); Esto es innecesario porque en el callback de la URL lo estás llamando.
  </script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAK7XD3i3cgtPV9SKcDff2IJc0O-WpNoNY&callback=initMap" async defer></script> 
  
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
