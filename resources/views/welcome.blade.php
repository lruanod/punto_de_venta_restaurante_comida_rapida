<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="" content="">
    <meta name="generator" content="Hugo 0.84.0">
    <title>@yield('title')</title>

    <link rel="canonical" href="">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="{{ asset('carousel.css') }}" rel="stylesheet">
</head>
<body>

<header>
    @include('layouts.navbar')
</header>

<main>

    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>
                <img src="image/banner22.png" class="img-fluid" alt="Responsive image" style="opacity: 1.3;">

                <div class="container">
                    <div class="carousel-caption text-start">
                        <h2 class="font-weight-bold ">Antojitos.</h2>
                        <h4 class="font-weight-bold ">Nos caracterizamos por ofrecer los mejores antojitos de la localidad, contamos con deliciosas tortillas de harina con ingredientes al gusto, churrascos con carne a lección, hamburguesas con papas, emparedados, fritos, empanadas, entre muchos antojitos más.</h4>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>

                <img src="image/banner32.png" class="img-fluid" alt="Responsive image" style="opacity: 1.5;">

                <div class="container">
                    <div class="carousel-caption">
                        <h1 class="font-weight-bold ">Cenas y desayunos.</h1>
                        <h4 class="font-weight-bold ">Contamos con platillos tradicionales de cena y desayuno, que incluye huevos al gusto, frijol, plátano, longaniza y embutidos frescos.</h4>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>

                <img src="image/banner12.png" class="img-fluid" alt="Responsive image" style="opacity: 1.3;">

                <div class="container">
                    <div class="carousel-caption text-end">
                            <h1 class="font-weight-bold">Bebidas.</h1>
                            <h4 class="font-weight-bold ">Tenemos una gran variedad de bebidas contamos con Gaseosas, jugos, frescos naturales y licuados de frutas de temporada</h4>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">




        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">Ricos antojitos para  <span class="text-muted">satisfacer tu paladar</span></h2>
                <p class="lead">Nos caracterizamos por ofrecer los mejores antojitos de la localidad, contamos con deliciosas tortillas de harina con ingredientes al gusto, churrascos con carne a lección, hamburguesas con papas, emparedados, fritos, empanadas, entre muchos antojitos más. </p>
            </div>
            <div class="col-md-5">
                <img src="image/menu1.png" class="featurette-image img-fluid mx-auto" alt="Responsive image" width="500" height="500">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">Deliciosos platillos de <span class="text-muted">cenas y desayunos</span></h2>
                <p class="lead">Contamos con platillos tradicionales de cena y desayuno, que incluye huevos al gusto, frijol, plátano, longaniza y embutidos frescos. </p>
            </div>
            <div class="col-md-5 order-md-1">
                <img src="image/menu2.png" class="featurette-image img-fluid mx-auto" alt="Responsive image" width="500" height="500">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">Suculentas <span class="text-muted">bebidas y batidos</span></h2>
                <p class="lead">Tenemos una gran variedad de bebidas contamos con Gaseosas, jugos, frescos naturales y licuados de frutas de temporada</p>
            </div>
            <div class="col-md-5">
                <img src="image/menu3.png" class="featurette-image img-fluid mx-auto" alt="Responsive image" width="500" height="500">
            </div>
        </div>

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

    </div><!-- /.container -->


    <!-- FOOTER -->
    <footer class="container">
        <p class="float-end"><a href="#">Inicio</a></p>
        <p>&copy; 2021–2022 Company, Multi_ideas</p>
    </footer>
</main>


<script src="{{ asset('assets/dist/js/bootstrap.bundle.min.js') }}"></script>


</body>
</html>
