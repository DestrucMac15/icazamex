@extends('layouts.web')

@section('content')

<header id="header-desarrollos">
    <div class="container">
        <div class="row align-items-center justify-content-center altura-100">
            <div class="col-12">
                <div class="row justify-content-center mt-5 mt-lg-0">
                    <div class="col-10">
                        <h2 class="display-4 white-text text-center mb-2"> ¿Quieres conocer más acerca de desarrollos? </h2>
                        <h4 class="white-text text-center">Conoce los más nuevos e interesantes desarrollos en las principales<br> ciudades del país</h4>
                    </div>
                </div>
                <div class="row justify-content-center" hidden>
                    <div class="col-12 text-center mt-4">
                        <button class="btn btn-lg btn-gradient-yellow sunny-morning-gradient"><i class="far fa-play-circle"></i> | Ver video</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<section id="desarrollos">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="row my-5">
                    <div class="col-md-12">
                        <h1 class="display-4 text-center font-weight-bold">
                            El <span class="color-verde">Desarrollo</span> que buscas<br>
                            está con nosotros.
                        </h1>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-12">
                        <form action="">
                            <div class="row">
                                <div class="col-4">
                                    <select class="browser-default custom-select">
                                        <option selected>Selecciona tu Alcaldía</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <select class="browser-default custom-select">
                                        <option selected>Selecciona tu Colonia</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <button type="button" class="btn btn-gradient-blue btn-block white-text">Buscar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-12">
                        <!-- Split button -->
                        <div class="btn-group float-right">
                            <button type="button" class="btn btn-azul">Ordenar por</button>
                            <button type="button" class="btn btn-azul dropdown-toggle px-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Recientes</a>
                                <a class="dropdown-item" href="#">Ofertas</a>
                                <a class="dropdown-item" href="#">Más relevantes</a>
                                <a class="dropdown-item" href="#">Recien publicados</a>
                                <a class="dropdown-item" href="#">Últimas publicaciones</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    @foreach ($desarrollos as $desarrollo)
                        <div class="col-md-6 my-2">
                            <div class="card">
                                <div class="card-header stylish-color white-text">
                                    <h4>{{$desarrollo->titulo}}</h4>
                                    <p class="mb-0"><small>{{$desarrollo->estado->nombre}}, {{$desarrollo->municipio->nombre}}</small></p>
                                </div>
                                <div class="card-body p-0 relative">
                                    <div id="a{{$desarrollo->id}}" class="carousel slide" data-ride="carousel">
                                        <!--indicadores del slider-->
                                        <ul class="carousel-indicators">
                                            <li data-target="#a{{$desarrollo->id}}" data-slide-to="0" class="active"></li>
                                            <li data-target="#a{{$desarrollo->id}}" data-slide-to="1"></li>
                                            <li data-target="#a{{$desarrollo->id}}" data-slide-to="2"></li>
                                        </ul>
                                        <!--imagenes del slider-->
                                        <div class="carousel-inner">

                                            @foreach($desarrollo->imagenes as $imagen)
                                                <div class="carousel-item {{$desarrollo->imagenes[0]->nombre == $imagen->nombre ? 'active' : ''}}">

                                                    <img src="{{asset('storage/'.$imagen->nombre)}}" alt="Imagen 1" width="100%" style="height: 400px; object-fit: cover;">
                                                </div>
                                            @endforeach;
                                        </div>
                                        <!--controles del slider-->
                                        <a class="carousel-control-prev" href="#a{{$desarrollo->id}}" data-slide="prev">
                                            <span class="carousel-control-prev-icon"></span>
                                        </a>
                                        <a class="carousel-control-next" href="#a{{$desarrollo->id}}" data-slide="next">
                                            <span class="carousel-control-next-icon"></span>
                                        </a>
                                    </div>
                                    <div class="row text-white" style="margin: 0;">
                                        <div class="col-md-4 py-3 bg-green">
                                            <a href="{{route('web.desarrollosParticular',$desarrollo->id)}}" class="link white-text">Ver más</a>
                                        </div>
                                        <div class="col-md-8 text-right py-3 bg-dark">
                                            Preventa desde ${{$desarrollo->precio_venta}} MXN
                                        </div>
                                    </div>
                                    <div class="row stylish-color text-white" style="margin: 0;">
                                        <div class="col-md-3 text-center">
                                            <small><i class="fas fa-bed"></i> Recamaras {{$desarrollo->recamaras}}</small>
                                        </div>
                                        <div class="col-md-3 text-center">
                                            <small><i class="fas fa-parking"></i> Estacionamientos {{$desarrollo->estacionamientos}}</small>
                                        </div>
                                        <div class="col-md-3 text-center">
                                            <small><i class="fas fa-toilet"></i> Baños {{$desarrollo->banios}}</small>
                                        </div>
                                        <div class="col-md-3 text-center">
                                            <small><i class="fas fa-layer-group"></i> Niveles {{$desarrollo->pisos}}</small>
                                        </div>
                                    </div>

                                    <div class="title-price">
                                        <h1 class="badge bg-badge-blue">VENTA</h1>
                                    </div>
                                    <div class="destacado p-2">
                                        <div class="postingCardPrices go-to-posting">
                                            <i class="fas fa-heart"></i>
                                            <span class="fromPrice">Destacado</span>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>

<div class="container-fluid">
    <div class="row my-5 justify-content-center">
        <div class="col-12 col-lg-10 text-center py-5 grey lighten-4">
           <div class="row">
                <div class="col-12">
                     <h2 class="f-400">
                        Proximamente descarga nuestra <span class="color-verde">revista digital</span> y consulta
                        la información<br> más relevante de propiedades, desarrollos e inversiones.
                    </h2>
                    <h4>
                        Haz clic en la delegación de tu interés para descargarla revista.
                    </h4>
                    <br>
                    <button type="button" class="btn btn-gradient-blue btn-lg white-text m-2">Álvaro Obregón</button>
                    <button type="button" class="btn btn-gradient-blue btn-lg white-text m-2">Benito Juárez</button>
                    <button type="button" class="btn btn-gradient-blue btn-lg white-text m-2">Coyoacán</button>
                    <button type="button" class="btn btn-gradient-blue btn-lg white-text m-2">Cuajimalpa</button>
                    <button type="button" class="btn btn-gradient-blue btn-lg white-text m-2">Cuauhtémoc</button>
                    <button type="button" class="btn btn-gradient-blue btn-lg white-text m-2">Iztacalco</button>
                    <button type="button" class="btn btn-gradient-blue btn-lg white-text m-2">Magdalena Contreras</button>
                    <button type="button" class="btn btn-gradient-blue btn-lg white-text m-2">Miguel Hidalgo</button>
                    <button type="button" class="btn btn-gradient-blue btn-lg white-text m-2">Tlalpan</button>
                </div>
            </div>
        </div>
    </div>

</div>



<div class="container">
    <div class="row justify-content-center">
        <div class="col-10 col-lg-6">
            <h2 class="text-center f-400">Lo más nuevo en Desarrollos</h2>
        </div>
    </div>
</div>

<section id="relacionados">
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 py-4">
                <div class="owl-services owl-carousel owl-theme">
                    @foreach($desarrollosAleatorios as $aleatorio)
                    <div class="item">
                        <div class="card">
                            <div class="card-header" style="padding: 0;">
                                <img class="img-fluid" src="{{ asset('storage'.array_get($aleatorio, 'imagenes.0.nombre')) }}" alt="">
                            </div>
                            <div class="card-body bg-light text-center">
                                <h4 class="black-text card-title"><a href="" class="black-text">{{$aleatorio->titulo}}</a></h4>
                                <p><small class="color-azul">{{$aleatorio->municipio->nombre}}, {{$aleatorio->estado->nombre}}</small></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section id="inversion">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="row align-items-center py-5">
                    <div class="col-lg-5 text-center py-5">
                        <img src="assets/imagenes/logo-menu.png" alt="" width="100%">
                    </div>
                    <div class="col-lg-7 text-center">
                        <h2 class="display-4 white-text font-weight-bold">¿Buscas invertir?</h2>
                        <h3 class="white-text f-400">Conoce las mejores opciones de inversión para tí</h3>
                        <div class="row justify-content-center mt-4">
                            <div class="col-10">
                                <a href="{{route('web.inversiones')}}" type="button" class="btn btn-verde btn-lg white-text rounded waves-effect">Haz clic para conocer más</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection
