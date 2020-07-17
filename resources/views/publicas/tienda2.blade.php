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
                        <form role="form" action="{{ url('/puesto/update/'.$puesto) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <strong><label class="form-label" for="direccion">Ubicación de tu Tienda o lugar de reparto (Dirección completa) </label></strong>
                                <small class="form-text text-muted" style="margin-bottom: 7px" >{{ __('Indique la ubicación como quiera que aparezca para sus clientes.') }}</small>
                                <input style="margin-top: 7px" type="text" class="form-control form-control-lg" name="direccion" value="">
                            </div>
                            <div class="form-group" style="display: none">
                                <strong><label class="form-label" for="mapa">Mapa de ubicación</label></strong>
                                <small class="form-text text-muted" style="margin-bottom: 7px" >{{ __('Arrastre el marcador hacia la ubicación aproximada de su Tienda.') }}</small>
                                <div id="map" style="height: 300px;"></div>
                                <input type="hidden" id="coords" />
                            </div>
                            <div class="form-group">
                                <strong><label class="form-label">¿Cómo te pagarán los clientes?</label></strong>
                                <small class="form-text text-muted" style="margin-bottom: 7px" >{{ __('Indique a sus clientes qué formas de pago acepta. Puede seleccionar varias opciones.') }}</small>
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
                                <strong><label class="form-label">¿Cómo entregarás los productos?</label></strong>
                                <small class="form-text text-muted" style="margin-bottom: 7px" >{{ __('Indique a sus clientes qué formas de entrega ofrece. Puede seleccionar varias opciones.') }}</small>
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
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-lg btn-primary">{{ __('Siguiente: Ir al tablero') }}</button>
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
    initMap = function () 
    {
    //usamos la API para geolocalizar el usuario
        navigator.geolocation.getCurrentPosition(
          function (position){
            latitud = "";
            longitud = "";
            
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
                center:new google.maps.LatLng("",""),

            });
            //Creamos el marcador en el mapa con sus propiedades
            //para nuestro obetivo tenemos que poner el atributo draggable en true
            //position pondremos las mismas coordenas que obtuvimos en la geolocalización
            marker = new google.maps.Marker({
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                position: new google.maps.LatLng("",""),

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
</script>
@endsection