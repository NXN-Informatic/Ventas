@extends('layouts.app')
@section('title','Editar Puesto')
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
        <form action="{{ url('/puesto/update/'.auth()->user()->usuario_puestos->first()->puesto_id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <!-- Formulario de Usuario -->
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ __('Información de la Tienda') }}</h4>
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
                            <strong><label class="form-label" for="name">Nombre de su Tienda</label></strong>
                                <small class="form-text text-muted">{{ __('Indique el nombre de la Tienda. Puede cambiarlo en cualquier momento.') }}</small>
                                <input style="margin-top:7px" type="text" class="form-control form-control-lg" name="name" value="{{ old('name', $puesto->name) }}" required>
                                <small class="form-text text-muted">{{ __('Campo Requerido.') }}</small>
                            </div>
                            <div class="form-group">
                            <strong><label class="form-label">Sector del negocio</label></strong>
                                <div class="mb-3">
                                @if( $categs)
                                <input type="text" class="form-control" value="{{ $categs[0] }}">
                                @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <strong><label class="form-label">¿Qué venderás?</label></strong>
                                <small class="form-text text-muted">{{ __('Puede seleccionar varias opciones.') }}</small>
                                <div class="mb-3" style="margin-top:7px">
                                <select class="form-control select2 form-control-lg" id="subcategoria" name="subcategoria_id[]" data-toggle="select2" multiple>
                                <optgroup label="Subcategorias Disponibles">
                                    <option value=""></option>
                                    @foreach($subcategorias as $subcategoria)
                                        <option value="{{ $subcategoria->id }}" 
                                        @for ($i = 0; $i < count($subcat); $i++)
                                            @if($subcat[$i] == $subcategoria->id)
                                                selected
                                            @endif
                                        @endfor
                                        >{{ $subcategoria->name }}</option>
                                    @endforeach
                                </optgroup>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <strong><label class="form-label">¿Perteneces a un CentroComercial/Asociación/Galería?</label></strong>
                                <small class="form-text text-muted">{{ __('Ésta información deberá ser corroborada.') }}</small>
                                <div class="mb-3" style="margin-top:7px">
                                <select class="form-control select2 form-control-lg" id="cencom" name="cencom" data-toggle="select2">
                                <optgroup label="Opciones Disponibles">
                                    <option value=""></option>
                                    @foreach($cencom as $cenc)
                                        <option value="{{ $cenc->id }}" 
                                        @if($cen==$cenc->id){
                                            selected
                                        }
                                        @endif
                                        >{{ $cenc->nombre }}</option>
                                    @endforeach
                                </optgroup>
                                </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ __('Ubicación de la Tienda física') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <strong><label class="form-label" for="direccion">Ubicación de tu Tienda o lugar de reparto (Dirección completa) </label></strong>
                                <small class="form-text text-muted" style="margin-bottom: 7px" >{{ __('Indique la ubicación como quiera que aparezca para sus clientes.') }}</small>
                                <input style="margin-top: 7px" type="text" class="form-control form-control-lg" name="direccion" value="{{ old('direccion', $puesto->direccion) }}">
                            </div>
                            <div class="form-group">
                                <strong><label class="form-label" for="mapa">Mapa de ubicación</label></strong>
                                <small class="form-text text-muted" style="margin-bottom: 7px" >{{ __('Arrastre el marcador hacia la ubicación aproximada de su Tienda.') }}</small>
                                <div id="map" style="height: 300px;"></div>
                                <input type="hidden" id="coords" />
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">{{ __('Información de Entrega y Pagos') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <strong><label class="form-label">¿Cómo te pagarán los clientes?</label></strong>
                                <small class="form-text text-muted" style="margin-bottom: 7px" >{{ __('Indique a sus clientes qué formas de pago acepta. Puede seleccionar varias opciones.') }}</small>
                                <div class="mb-3">
                                <select class="form-control select2 form-control-lg" id="formapago" name="formapago_id[]" data-toggle="select2" multiple>
                                <optgroup label="Formas de pago disponibles">
                                    <option value=""></option>
                                    @foreach($formapagos as $formapago)
                                        <option value="{{ $formapago->id }}"              
                                        @foreach($formapagosuser as $formapag)
                                            @if($formapag->pago->id == $formapago->id)
                                                selected
                                            @endif
                                        @endforeach
                                        >{{ $formapago->name }}</option>
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
                                            <option value="{{ $formaentrega->id }}" 
                                            @foreach($formaentregasuser as $formaEntr)
                                                @if($formaEntr->entrega->id == $formaentrega->id)
                                                    selected
                                                @endif
                                            @endforeach
                                            >{{ $formaentrega->name }}</option>
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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <button type="submit" class="btn btn-primary btn-lg" style="background: linear-gradient(85deg, #8f33ac 0%, #ff1a00 100%);"><span>Guardar cambios</span></button>
                        </div>
                    </div>
                    <br>
                </div>
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
                    placeholder: "Seleccione",
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
