@extends('layouts.app')
@section('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
@endsection
@section('title','Enlace FB')
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
        <div class="row">
            <!-- Formulario de Usuario -->
            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ __('Vende en FeriaTacna!') }}</h5>
                        <div class="col-12">
                            <div class="col-12 custom-control custom-switch text-right">
                                <input type="checkbox" class="custom-control-input" checked id="customSwitch1" >
                                <label class="custom-control-label" for="customSwitch1">Activado</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label" for="name">Tu Tienda será publicada en nuestras plataformas. Los visitantes podrán buscar y visitar tu Tienda.</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ __('Sincroniza tu Tienda con tu Página de Facebook!') }}</h5>
                        <div class="col-12">
                            <div class="col-12 custom-control custom-switch text-right">
                                <input type="checkbox" class="custom-control-input" disabled id="customSwitch2" >
                                <label class="custom-control-label" for="customSwitch2">Muy Pronto!</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label" for="name">Los productos de tu Tienda se subirán automáticamente en tu Página de Facebook. Tus clientes de FB serán dirigidos a tu Tienda en Feriatacna</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-12" style="display:none">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ __('Conecta tu Puesto con tu Página de Facebook!') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label" for="name">Enlace de tu Catalogo:</label>
                            <input type="text" class="form-control" id="enlace" name="enlace" value="{{ $catalog_url }}" required>
                            <button class="btn mb-1 btn-success" name="btnenlace" id="btnenlace" onclick="copyToClipboard('enlace')"><i class="fas fa-copy"></i> Copiar</button>
                        </div>
                        <hr>
                        <h3>Tutorial en Construcción</h3>
                    </div>
                </div>
            </div>
            <!-- End Formulario de Usuario -->
        </div>
    </div>
</main>
@include('layouts.partials.footer')
@endsection

@section('scripts')
<script src="js/settings.js"></script>
<script>
    function copyToClipboard(id) {
        document.getElementById(id).select();
        document.execCommand('copy');
    }
</script>
<script>
    // Toastr
    $(function() {
        $("#btnenlace").click(function() {
            var message = "Copiado en Portapapeles";
            var title = "FeriaTacna:";
            var type = "success";
            toastr[type](message, title, {
                positionClass: toast-top-right,
                closeButton: false,
                progressBar: false,
                newestOnTop: true,
                rtl: $("body").attr("dir") === "rtl" || $("html").attr("dir") === "rtl",
                timeOut: 5
            });
        });
    });
</script>
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
