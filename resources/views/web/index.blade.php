@extends('layouts.web')

@section('content')

<header id="header-home">
    <div class="container">
        <form class="" method="GET">
            <div class="row align-items-center justify-content-center altura-100">
                <div class="col-12">
                    <div class="row justify-content-center mt-5 mt-lg-0">
                        <div class="col-10">
                            <h2 class="display-4 white-text text-center mb-5"> Tenemos algo especial para ti,<br>
                                búscalo aquí.</h2>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control form-control-lg btn-gradient-blue text-white" value="Del Valle, Benito Juarez, CDMX" aria-label="Buscar" aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-lg btn-warning m-0 px-3 py-2 z-depth-0 waves-effect" type="button" id="button-addon2"> <i class="fas fa-search"></i> BUSCAR</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 d-flex">
                                <select name="tipoOperacion" class="my-select m-1" data-style="btn-gradient-blue" data-size="5" title="Compra" multiple show-tick>
                                    @foreach($tipoOperacion as $tipo)
                                    <option value="{{$tipo->id}}">{{$tipo->titulo}}</option>
                                    @endforeach
                                </select>
                                <select class="my-select m-1" data-style="btn-gradient-blue" data-size="5" title="Departamento" multiple show-tick>
                                    <option>Opción 1</option>
                                    <option>Opción 2</option>
                                    <option>Opción 3</option>
                                    <option>Opción 4</option>
                                    <option>Opción 5</option>
                                </select>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5 d-flex justify-content-end">
                                <button class="btn btn-block btn-azul m-1">Desarrollos</button>
                                <button class="btn btn-block btn-azul m-1">Promociones</button>
                            </div>
                        </div>
                    <div class="row justify-content-center mt-4">
                        <div class="col-10">
                            <h5 class="white-text text-center font-weight-bold mb-5"> ¿Buscas invertir? Conoce las mejores promociones para ti, haz clic aquí.</h5>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</header>

<section id="banner">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-lg-10  py-5 px-0 text-center">
                <div class="view h-500 z-depth-1-half">
                    <div class="mask row align-items-center rgba-white-strong px-0 mx-0">
                        <div class="col-12">
                            <h2 class="title-banner text-center font-weight-bold pt-4">
                                ¿Quieres saber más de nosotros?
                            </h2>
                        </div>
                        <div class="col-12">
                            <p class="text-center font-weight-bold">
                                Acercate a nosotros y conoce todos los inmuebles que tenemos para ofrecerte.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="destacados">
    <div class="container-fluid">
        <div class="row justify-content-center my-5">
            <div class="col-12 col-lg-10">
                <div class="row">
                    @foreach($desarrollos as $desarrollo)
                    <div class="col-12 col-lg-6 mb-4">
                        <!-- Card -->
                        <div class="card">
                            <!-- Card image -->
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#a{{$desarrollo->id}}" data-slide-to="0" class="active"></li>
                                            <li data-target="#a{{$desarrollo->id}}" data-slide-to="1"></li>
                                            <li data-target="#a{{$desarrollo->id}}" data-slide-to="2"></li>
                                </ol>
                                
                                <div class="carousel-inner">
                                    @foreach($desarrollo->imagenes as $imagen)
                                        <div class="carousel-item {{$desarrollo->imagenes[0]->nombre == $imagen->nombre ? 'active' : ''}}">
                                            <img src="{{asset('storage/'.$imagen->nombre)}}" alt="Imagen 1" width="100%" style="height: 400px; object-fit: cover;">
                                        </div>
                                    @endforeach;
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <!-- Card content -->
                            <div class="card-body bg-light">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h4 class="card-title mb-1">
                                            <a href="{{route('web.desarrollosParticular',$desarrollo->id)}}" class="black-text">{{$desarrollo->titulo}}</a>
                                        </h4>
                                        <small class="color-azul my-2">
                                            {{$desarrollo->estado->nombre}}, {{$desarrollo->municipio->nombre}}
                                        </small>
                                    </div>
                                    <div class="col-md-8">
                                        <!-- Text -->
                                        <p class="card-text mt-3">{{$desarrollo->descripcion}}</p>
                                    </div>
                                </div>

                            </div>
                            <div class="precio p-2">
                                <div class="postingCardPrices go-to-posting d-flex align-items-center">
                                    <span class="fromPrice mr-1">Desde</span>
                                    <span class="firstPrice">
                                        ${{number_format($desarrollo->precio_desde, 2, '.', ' ')}}
                                    </span>
                                    <span class="fromPrice ml-1">MXN</span>
                                </div>
                            </div>
                        </div>
                        <!-- Card -->
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

  


    </div>
</section>

<section id="relacionados">
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 py-4">
                <div class="owl-services owl-carousel owl-theme">
                    <div class="item">
                        <div class="card">
                            <div class="card-header" style="padding: 0;">
                                <img class="img-fluid" src="https://images.unsplash.com/photo-1533402199111-b58fbae42f5a?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80" alt="">
                            </div>
                            <div class="card-body">
                                <h4 class="black-text card-title"><a href="" class="black-text">Oficina en renta</a></h4>
                                <p><small class="color-azul">Guadalupe Inn, CDMX</small></p>
                                <button type="button" class="btn btn-success btn-sm">Ver más</button>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card">
                            <div class="card-header" style="padding: 0;">
                                <img class="img-fluid" src="https://images.unsplash.com/photo-1490122417551-6ee9691429d0?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80" alt="">
                            </div>
                            <div class="card-body">
                                <h4 class="black-text card-title"><a href="" class="black-text">Oficina en renta</a></h4>
                                <p><small class="color-azul">Guadalupe Inn, CDMX</small></p>
                                <button type="button" class="btn btn-success btn-sm">Ver más</button>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card">
                            <div class="card-header" style="padding: 0;">
                                <img class="img-fluid" src="https://images.unsplash.com/photo-1533402199111-b58fbae42f5a?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80" alt="">
                            </div>
                            <div class="card-body">
                                <h4 class="black-text card-title"><a href="" class="black-text">Oficina en renta</a></h4>
                                <p><small class="color-azul">Guadalupe Inn, CDMX</small></p>
                                <button type="button" class="btn btn-success btn-sm">Ver más</button>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card">
                            <div class="card-header" style="padding: 0;">
                                <img class="img-fluid" src="https://images.unsplash.com/photo-1490122417551-6ee9691429d0?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80" alt="">
                            </div>
                            <div class="card-body">
                                <h4 class="black-text card-title"><a href="" class="black-text">Oficina en renta</a></h4>
                                <p><small class="color-azul">Guadalupe Inn, CDMX</small></p>
                                <button type="button" class="btn btn-success btn-sm">Ver más</button>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card">
                            <div class="card-header" style="padding: 0;">
                                <img class="img-fluid" src="https://images.unsplash.com/photo-1533402199111-b58fbae42f5a?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80" alt="">
                            </div>
                            <div class="card-body">
                                <h4 class="black-text card-title"><a href="" class="black-text">Oficina en renta</a></h4>
                                <p><small class="color-azul">Guadalupe Inn, CDMX</small></p>
                                <button type="button" class="btn btn-success btn-sm">Ver más</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="fundacion">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="row align-items-center py-3">
                    <div class="col-5 d-none d-md-block">
                        <img src="assets/imagenes/logo-menu.png" alt="" width="100%">
                    </div>
                    <div class="col-sm-12 col-md-7 text-center">
                        <h3 class="color-azul font-weight-bold text-center">Fundación Familia Icazamex</h3>
                        <p class="black-text text-center">Somos una fundación creada para ayudar a diferentes instituciones, como hospitales, casa hogar, asilos de enfermos, entre otras más.</p>
                        <div class="row justify-content-center mt-4">
                            <div class="col-10">
                                <a href="#" type="button" class="btn btn-gradient-blue btn-lg btn-block white-text border border-light rounded waves-effect">Haz clic para conocer más</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="destacados">
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h3 class="display-5 text-center f-400">
                    Consulta nuestros servicios destacados
                </h3>
            </div>
            <div class="col-12 col-md-10 py-4">
                <div class="owl-services2 owl-carousel owl-theme">
                    <div class="item">
                        <div class="card">
                            <div class="card-header" style="padding: 0;">
                                <img class="img-fluid" src="https://images.unsplash.com/photo-1533402199111-b58fbae42f5a?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80" alt="">
                            </div>
                            <div class="card-body text-center" style="position: absolute; width: 100%; bottom: 0px; padding: 10px; background: rgba(255,255,255,.5);">
                                <h5 class="black-text card-title">
                                    <a href="" class="black-text">Oficina en renta</a>
                                </h5>
                                <p><small class="color-azul">Guadalupe Inn, CDMX</small></p>
                            </div>
                        </div>
                    </div>
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
                    <div class="col-lg-7">
                        <h3 class="display-4 inversion--texto font-weight-bold text-center text-md-left">
                            ¿Buscas invertir?
                        </h3>
                        <h3 class="inversion--texto f-400 text-center text-md-left">
                            Conoce las mejores opciones de inversión para tí
                        </h3>
                        <div class="d-flex justify-content-center justify-content-md-start">
                            <a href="{{route('web.inversiones')}}" type="button" class="btn btn-verde btn-lg white-text rounded waves-effect">Haz clic aquí</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('javascript')



@endsection
