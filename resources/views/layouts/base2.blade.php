<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="" content="">
    <meta name="generator" content="">
    <title>@yield('title')</title>

    <link rel="canonical" href="">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- iconos -->
    <link href="{{ asset('assets/dist/bootstrap-icons.css') }}" rel="stylesheet">
    <!-- spinner -->
    <link href="{{ asset('assets/dist/css/spinner.css') }}" rel="stylesheet">
    <!-- toastr.min.css -->
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <!-- jquery -->
    <script src="{{ asset('assets/dist/js/jquery-3.6.0.js') }}"></script>
    <!-- bootstrap.min.js -->
    <script src="{{ asset('assets/dist/js/bootstrap.min.js') }}"></script>
    <!-- bootstrap.bundle.min.js -->
    <script src="{{ asset('assets/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- BsMultiSelect.min -->
    <link href="{{ asset('css/BsMultiSelect.min.css') }}" rel="stylesheet">



    @livewireStyles


</head>
<body>
<div id="contenedor_carga"><div id="carga"></div></div>
<header>
    @include('layouts.navbar')
</header>
<main>

        <div class="container marketing">
            <hr class="divider">
            <div class="row">
                <div class="mt-4">
                @yield('content')
                </div>
            </div>
            <br>
        </div><!-- /.container -->


    <!-- FOOTER -->
    <footer class="container">
        <p class="float-end"><a href="#">Inicio</a></p>
        <p>&copy; 2021–2022 Company, Multi_ideas</p>
    </footer>
</main>


@livewireScripts

<!-- toastr.min.js -->
<script src="{{ asset('js/toastr.min.js') }}"></script>
<!-- popper.min.js -->
<script src="{{ asset('js/popper.min.js') }}"></script>
<!-- BsMultiSelect.min.js -->
<script src="{{ asset('js/BsMultiSelect.min.js') }}"></script>



<script>
    window.addEventListener('alert',event =>{
        toastr.success(event.detail.message)
    })
    window.addEventListener('alertpdf',event =>{
        toastr.success(event.detail.message)
    })
    window.addEventListener('alert2',event =>{
        toastr.info(event.detail.message)
        var obj=document.getElementById('cerrar');
        obj.click();
    })

    window.addEventListener('alert3',event =>{
        toastr.error(event.detail.message)
    })

    window.addEventListener('alert4',event =>{
        toastr.warning(event.detail.message)
        var obj=document.getElementById('cerrarasociado');
        obj.click();
    })

    window.addEventListener('alertp',event =>{
        toastr.success(event.detail.message)
        var obj=document.getElementById('cerrardetalle');
        obj.click();
    })

    window.addEventListener('alertpu',event =>{
        toastr.success(event.detail.message)
        var obj=document.getElementById('cerrareditproducto');
        obj.click();
    })

    window.addEventListener('alertpedido',event =>{
        toastr.success(event.detail.message)
        var obj=document.getElementById('cerrarpedido');
        obj.click();
    })

    window.addEventListener('alerteliminar',event =>{
        toastr.error(event.detail.message)
        var obj=document.getElementById('verpedido');
        obj.click();
    })

    window.addEventListener('alerteliminar2',event =>{
        toastr.error(event.detail.message)
        var obj=document.getElementById('cerrar');
        obj.click();
    })

    window.addEventListener('alertpago',event =>{
        toastr.success(event.detail.message)
        var obj=document.getElementById('pagocerrar');
        obj.click();
    })

    window.addEventListener('alertcliente',event =>{
        toastr.success(event.detail.message)
        var obj=document.getElementById('cerrarcliente');
        obj.click();
    })

    window.addEventListener('alertin',event =>{
        toastr.success(event.detail.message)
        var objs=document.getElementById('cerrarin');
        objs.click();
    })

    window.addEventListener('alertprod',event =>{
        toastr.success(event.detail.message)
        var objs=document.getElementById('cerrarproductox');
        objs.click();
    })

</script>

<!-- redireccionar login -->
@if((session('usuario')=='')&&(session('usuario_id')=='')&&(session('rol')=='')&&(session('nombre')==''))

    <script>
        var pathname = window.location.pathname;
        if(pathname!='/login'){
            window.location.replace("/login");
        }
    </script>
@endif

<script type="text/javascript">

    $(document).ready( function () {
        $('#contenedor_carga').hide();
    })
</script>

<script type="text/javascript">
    function spinner() {
        $('#contenedor_carga').show();
    }
</script>




</body>

</html>
