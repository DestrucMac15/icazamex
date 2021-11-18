@extends('layouts.web')

@section('content')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/style-aside.css') }}">
@endpush

<header class="row" style="margin: 0;">
    @if($tipo == 'desarrollos')
        <div class="col-md-12 d-flex justify-content-center align-items-center header_desarrollos">
            <h2 class="text-center display-4 text-white">El desarrollo que buscas<br> está con nosotros</h2>
        </div>
    @elseif($tipo == 'propiedades')
        <div class="col-md-12 d-flex justify-content-center align-items-center header_propiedades">
            <h2 class="text-center display-4 text-white">Conoce los propiedades<br> que tenemos para ti</h2>
        </div>
    @endif
</header>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">

            <form action="" id="form_filtros" method="GET">

                <div class="sidebar-header">
                    <h3 class="black-text">Filtros</h3>
                    @foreach($_GET as $clave => $valor)
                        @if($clave == 'estado_id')
                            <div class="chip" data-nombre="{{$clave}}">
                                {{$estados->nombre}} <i class="fas fa-times eliminar_filtro"></i>
                            </div>
                        @endif
                        @if($clave == 'tipo_inmueble_id' )
                            <div class="chip" data-nombre="{{$clave}}">
                                {{$tipoInmueble->titulo}} <i class="fas fa-times eliminar_filtro"></i>
                            </div>
                        @endif
                        @if($clave == 'recamaras')
                            <div class="chip" data-nombre="{{$clave}}">
                                {{$valor}} recámaras(s) <i class="fas fa-times eliminar_filtro"></i>
                            </div>
                        @endif
                    @endforeach
                </div>

                <div class="card black-text mb-3" hidden>
                    @if(isset($_GET['inmueble']))
                        <input type="text" name="inmueble" value="{{$_GET['inmueble']}}" class="form-control">
                    @endif
                </div>

                <div class="card black-text mb-3">
                    <article class="card-group-item">
                        <div class="card-header">
                            <h6 class="title f-400">Cuidad o Estado</h6>
                        </div>
                        <div class="filter-content">
                            <div class="card-body">
                                <select class="my-select form-control" name="estado_id" data-style="btn-azul" data-size="5" show-tick>
                                    <option value="">Todas las ciudades</option>
                                    <option value="9" {{(isset($_GET['estado_id']) && $_GET['estado_id'] == 9) ? 'selected' : ''}}>CDMX</option>
                                    <option value="15" {{(isset($_GET['estado_id']) && $_GET['estado_id'] == 15) ? 'selected' : ''}}>Estado de México</option>
                                </select>
                            </div>
                        </div>
                    </article>
                </div>

                @if(isset($_GET['inmueble']) && $_GET['inmueble'] == 'propiedades')
                    <div class="card black-text mb-3">
                        <article class="card-group-item">
                            <div class="card-header">
                                <h6 class="title f-400">Tipo de inmueble </h6>
                            </div>
                            <div class="filter-content">
                                <div class="card-body">
                                        <label class="form-check">
                                            <input class="form-check-input" type="radio" name="tipo_inmueble_id" value="">
                                            <span class="form-check-label">
                                                Todos
                                            </span>
                                        </label>
                                        <label class="form-check">
                                            <input class="form-check-input" type="radio" name="tipo_inmueble_id" value="3" {{(isset($_GET['tipo_inmueble_id']) && $_GET['tipo_inmueble_id'] == 3) ? 'checked' : ''}}>
                                            <span class="form-check-label">
                                                Casas
                                            </span>
                                        </label>
                                        <label class="form-check">
                                            <input class="form-check-input" type="radio" name="tipo_inmueble_id" value="6" {{(isset($_GET['tipo_inmueble_id']) && $_GET['tipo_inmueble_id'] == 6) ? 'checked' : ''}}>
                                            <span class="form-check-label">
                                                Departamentos
                                            </span>
                                        </label>
                                        <label class="form-check">
                                            <input class="form-check-input" type="radio" name="tipo_inmueble_id" value="14" {{(isset($_GET['tipo_inmueble_id']) && $_GET['tipo_inmueble_id'] == 14) ? 'checked' : ''}}>
                                            <span class="form-check-label">
                                                Terrenos
                                            </span>
                                        </label>
                                        <label class="form-check">
                                            <input class="form-check-input" type="radio" name="tipo_inmueble_id" value="9" {{(isset($_GET['tipo_inmueble_id']) && $_GET['tipo_inmueble_id'] == 9) ? 'checked' : ''}}>
                                            <span class="form-check-label">
                                                Locales comerciales
                                            </span>
                                        </label>
                                        <label class="form-check">
                                            <input class="form-check-input" type="radio" name="tipo_inmueble_id" value="1" {{(isset($_GET['tipo_inmueble_id']) && $_GET['tipo_inmueble_id'] == 1) ? 'checked' : ''}}>
                                            <span class="form-check-label">
                                                Bodegas comerciales
                                            </span>
                                        </label>
                                        <label class="form-check">
                                            <input class="form-check-input" type="radio" name="tipo_inmueble_id" value="12" {{(isset($_GET['tipo_inmueble_id']) && $_GET['tipo_inmueble_id'] == 12) ? 'checked' : ''}}> 
                                            <span class="form-check-label">
                                                Oficinas
                                            </span>
                                        </label>
                                        <label class="form-check">
                                            <input class="form-check-input" type="radio" name="tipo_inmueble_id" value="7" {{(isset($_GET['tipo_inmueble_id']) && $_GET['tipo_inmueble_id'] == 7) ? 'checked' : ''}}>
                                            <span class="form-check-label">
                                                Edificios
                                            </span>
                                        </label>
                                </div>
                            </div>
                        </article>
                    </div>
                @endif

                <div class="card black-text mb-3">
                    <article class="card-group-item">
                        <div class="card-header">
                            <h6 class="title f-400">Recámaras</h6>
                        </div>
                        <div class="filter-content">
                            <div class="card-body">
                                <div class="card-body">
                                    <label class="form-check">
                                        <input class="form-check-input" type="radio" name="recamaras" value="">
                                        <span class="form-check-label">
                                            Sin mínimo
                                        </span>
                                    </label>
                                    <label class="form-check">
                                        <input class="form-check-input" type="radio" name="recamaras" value="1" {{(isset($_GET['recamaras']) && $_GET['recamaras'] == 1) ? 'checked' : ''}}>
                                        <span class="form-check-label">
                                            1 Recámara
                                        </span>
                                    </label>
                                    <label class="form-check">
                                        <input class="form-check-input" type="radio" name="recamaras" value="2" {{(isset($_GET['recamaras']) && $_GET['recamaras'] == 2) ? 'checked' : ''}}>
                                        <span class="form-check-label">
                                            2 Recámaras
                                        </span>
                                    </label>
                                    <label class="form-check">
                                        <input class="form-check-input" type="radio" name="recamaras" value="3" {{(isset($_GET['recamaras']) && $_GET['recamaras'] == 3) ? 'checked' : ''}}>
                                        <span class="form-check-label">
                                            3 Recámaras
                                        </span>
                                    </label>
                                    <label class="form-check">
                                        <input class="form-check-input" type="radio" name="recamaras" value="4" {{(isset($_GET['recamaras']) && $_GET['recamaras'] == 4) ? 'checked' : ''}}>
                                        <span class="form-check-label">
                                            4 Recámaras
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="card black-text mb-3">
                    <article class="card-group-item">
                        <div class="card-header">
                            <h6 class="title f-400">Precio</h6>
                        </div>
                        <div class="filter-content">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="formControlRange">Rango de precios</label>
                                            <input type="range" class="form-control-range" min=0 max=999000000 step=100000 id="formControlRange" onInput="$('#rangeval').html($(this).val())">
                                            de $0 a $<span id="rangeval">500000</span>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- card-body.// -->
                        </div>
                    </article> <!-- card-group-item.// -->
                </div>

                <div class="card black-text mb-3">
                    <article class="card-group-item">
                        <div class="card-header">
                            <h6 class="title f-400">Superficie m2 </h6>
                        </div>
                        <div class="filter-content">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Mínimo</label>
                                        <input type="number" class="form-control" id="inputEmail4" placeholder="m2">
                                    </div>
                                    <div class="form-group col-md-6 text-right">
                                        <label>Máximo</label>
                                        <input type="number" class="form-control" placeholder="m2">
                                    </div>
                                </div>
                            </div> <!-- card-body.// -->
                        </div>
                    </article> <!-- card-group-item.// -->
                </div>

                <div class="card black-text mb-3">
                    <article class="card-group-item">
                        <div class="card-header">
                            <h6 class="title f-400">Estacionamientos</h6>
                        </div>
                        <div class="filter-content">
                            <div class="card-body">
                                <select class="my-select form-control" data-style="btn-azul" data-size="5" show-tick>
                                    <option>Sin estacionamiento</option>
                                    <option>Para 1 carro</option>
                                    <option>Para 2 carros</option>
                                    <option>Para 3 carros</option>
                                </select>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="card black-text mb-3">
                    <article class="card-group-item">
                        <div class="card-header">
                            <h6 class="title f-400">Baños</h6>
                        </div>
                        <div class="filter-content">
                            <div class="card-body">
                                <label class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadio" value="">
                                    <span class="form-check-label">
                                        1 baño
                                    </span>
                                </label>
                                <label class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadio" value="">
                                    <span class="form-check-label">
                                        2 baños
                                    </span>
                                </label>
                                <label class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadio" value="">
                                    <span class="form-check-label">
                                        3 baños
                                    </span>
                                </label>
                            </div> <!-- card-body.// -->
                        </div>
                    </article> <!-- card-group-item.// -->
                </div>

                <div class="card black-text mb-3">
                    <article class="card-group-item">
                        <div class="card-header">
                            <h6 class="title f-400">Antiguedad</h6>
                        </div>
                        <div class="filter-content">
                            <div class="card-body">
                                <select class="my-select form-control" data-style="btn-azul" data-size="5" show-tick>
                                    <option>Preventa</option>
                                    <option>Entrega inmediata</option>
                                    <option>Menos de 5 años</option>
                                    <option>Entre 5 y 10 años</option>
                                    <option>Entre 10 y 15 años</option>
                                    <option>Más de 20 años</option>
                                </select>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="card black-text mb-3">
                    <article class="card-group-item">
                        <div class="card-header">
                            <h6 class="title f-400">Restricciones </h6>
                        </div>
                        <div class="filter-content">
                            <div class="card-body">
                                <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <span class="form-check-label">
                                        Permitir mascotas
                                    </span>
                                </label>
                                <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <span class="form-check-label">
                                        Permitir Fumar
                                    </span>
                                </label>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="card mb-3 d-flex justify-content-center">
                    <button class="btn btn-lg btn-warning m-0 px-3 py-2 z-depth-0 waves-effect" type="submmit" id="button-addon2"> <i class="fas fa-search" aria-hidden="true"></i> FILTRAR</button>
                </div>

            </form>

        </nav>

        <!-- Page Content  -->
        <div id="content">
            

            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-breadcrumb navbar-dark f-400">
                                <li class="breadcrumb-item"><a class="color-verde" href="{{route('web.inmuebles')}}">INICIO</a></li>
                                @if(isset($tipo))
                                    <li class="breadcrumb-item"><a class="color-verde" href="#">{{strtoupper($tipo)}}</a></li>
                                @endif
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-12">
                        <button type="button" class="btn btn-primary d-sm-block d-md-none" data-toggle="modal" data-target="#myModal">
                            Filtros
                        </button>
                    </div>
                    <div class="col-12">
                        <div class="row justify-content-center">
                            @if(count($propiedades) <= 0)
                                <h3 style="width: 100%; text-align: center; margin: 20px;">No hay resultados de busqueda, pero podemos sugerirte lo siguiente</h3>
                                @foreach($resultadosAlternos as $propiedad)
                                <div class="col-12 col-lg-6 col-xl-4 mb-4">

                                    <!-- Card -->
                                    <div class="card">
                                        <!-- Card image -->
                                        <div id="a{{$propiedad->id}}" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                <li data-target="#a{{$propiedad->id}}" data-slide-to="0" class="active"></li>
                                                <li data-target="#a{{$propiedad->id}}" data-slide-to="1"></li>
                                                <li data-target="#a{{$propiedad->id}}" data-slide-to="2"></li>
                                            </ol>
                                            <div class="carousel-inner">
                                                @foreach($propiedad->imagenes as $imagen)
                                                    <div class="carousel-item {{$propiedad->imagenes[0]->nombre == $imagen->nombre ? 'active' : ''}}">
                                                        <img src="{{asset('storage/'.$imagen->nombre)}}" class="d-block w-100" alt="...">
                                                    </div>
                                                @endforeach
                                            </div>
                                            <a class="carousel-control-prev" href="#a{{$propiedad->id}}" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#a{{$propiedad->id}}" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                        <!-- Card content -->
                                        <div class="card-body p-2">
                                            <div class="col-12 px-0 py-2 btn-gradient-blue white-text mb-3">
                                                <div class="firstPriceContainer pl-3">
                                                    <h5 class="mb-0"> $ {{number_format($propiedad->precio_venta, 2, '.', ' ')}} MX</h5>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <!-- Title -->
                                                <h4 class="card-title mb-1">
                                                    {{$propiedad->titulo}}
                                                </h4>
                                                <small class="color-azul">

                                                </small>
                                                <!-- Text -->
                                                <p class="card-text mt-3">{{$propiedad->descripcion}}</p>
                                                <!-- Button -->
                                                <a href="{{route('web.propiedadesParticular',$propiedad->id)}}" class="btn btn-verde">
                                                    Ver Más <i class="fas fa-chevron-circle-right ml-1"></i>
                                                </a>
                                            </div>

                                        </div>

                                        <div class="card-footer white-text text-center mt-4">
                                            <div class="row">
                                                <div class="col-4">
                                                    <i class="fas fa-bed"></i> <span>{{$propiedad->recamaras}} Recámaras</span>
                                                </div>
                                                <div class="col-4">
                                                    <i class="fas fa-toilet"></i> <span>{{$propiedad->banios}} Baños</span>
                                                </div>
                                                <div class="col-4">
                                                    <i class="fas fa-border-all"></i> <span>{{$propiedad->superficie_terreno}} m2</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="destacado p-2">
                                            <div class="postingCardPrices go-to-posting">
                                                <i class="fas fa-heart"></i>
                                                <span class="fromPrice">Destacado</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card -->
                                </div>
                                @endforeach
                            @else
                                @if($_GET['inmueble'] == 'propiedades')
                                    @foreach($propiedades as $propiedad)
                                        <div class="col-12 col-lg-6 col-xl-4 mb-4">

                                            <!-- Card -->
                                            <div class="card">
                                                <!-- Card image -->
                                                <div id="a{{$propiedad->id}}" class="carousel slide" data-ride="carousel">
                                                    <ol class="carousel-indicators">
                                                        <li data-target="#a{{$propiedad->id}}" data-slide-to="0" class="active"></li>
                                                        <li data-target="#a{{$propiedad->id}}" data-slide-to="1"></li>
                                                        <li data-target="#a{{$propiedad->id}}" data-slide-to="2"></li>
                                                    </ol>
                                                    <div class="carousel-inner">
                                                        @foreach($propiedad->imagenes as $imagen)
                                                            <div class="carousel-item {{$propiedad->imagenes[0]->nombre == $imagen->nombre ? 'active' : ''}}">
                                                                <img src="{{asset('storage/'.$imagen->nombre)}}" class="d-block w-100" alt="...">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <a class="carousel-control-prev" href="#a{{$propiedad->id}}" role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#a{{$propiedad->id}}" role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                                <!-- Card content -->
                                                <div class="card-body p-2">
                                                    <div class="col-12 px-0 py-2 btn-gradient-blue white-text mb-3">
                                                        <div class="firstPriceContainer pl-3">
                                                            <h5 class="mb-0"> $ <span>{{number_format($propiedad->precio_venta, 2, '.', ' ')}}</span> MXN</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <!-- Title -->
                                                        <h4 class="card-title mb-1">
                                                            {{$propiedad->titulo}}
                                                        </h4>
                                                        <small class="color-azul">

                                                        </small>
                                                        <!-- Text -->
                                                        <p class="card-text mt-3">{{$propiedad->descripcion}}</p>
                                                        <!-- Button -->
                                                        <a href="{{route('web.propiedadesParticular',$propiedad->id)}}" class="btn btn-verde">
                                                            Ver Más <i class="fas fa-chevron-circle-right ml-1"></i>
                                                        </a>
                                                    </div>

                                                </div>

                                                <div class="card-footer white-text text-center mt-4">
                                                    <div class="row" style="font-size: 9px !important;">
                                                        <div class="col-4">
                                                            <i class="fas fa-bed"></i> <span>{{$propiedad->recamaras}} Recámaras</span>
                                                        </div>
                                                        <div class="col-4">
                                                            <i class="fas fa-toilet"></i> <span>{{$propiedad->banios}} Baños</span>
                                                        </div>
                                                        <div class="col-4">
                                                            <i class="fas fa-border-all"></i> <span>{{$propiedad->superficie_terreno}} m2</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="destacado p-2">
                                                    <div class="postingCardPrices go-to-posting">
                                                        <i class="far fa-heart"></i>
                                                        <span class="fromPrice"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Card -->
                                        </div>
                                    @endforeach
                                @else 
                                    @foreach ($propiedades as $desarrollo)
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
                                                            {{$desarrollo->tipoOperacion->titulo}} desde ${{number_format($desarrollo->precio_desde, 2, '.', ' ')}} MXN
                                                        </div>
                                                    </div>
                                                    <div class="row stylish-color text-white" style="margin: 0; font-size: 12px !important;">
                                                        <div class="col-md-3 text-center">
                                                            <small><i class="fas fa-bed"></i> Recámaras {{$desarrollo->recamaras}}</small>
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
                                                        @if($desarrollo->tipoOperacion->titulo == 'Venta')
                                                            <h1 class="badge bg-badge-blue">{{$desarrollo->tipoOperacion->titulo}}</h1>
                                                        @else
                                                            <h1 class="badge" style="background: orange;">{{$desarrollo->tipoOperacion->titulo}}</h1>
                                                        
                                                        @endif
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
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12 d-flex justify-content-center">
                        {{$propiedades->appends(request()->input())->links()}}
                    </div>


                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-lg-6">
                @if(isset($tipo) && $tipo == 'desarrollos')
                <h2 class="text-center f-400">Desarrollos que te pueden interesar</h2>
                @elseif(isset($tipo) && $tipo == 'propiedades')
                <h2 class="text-center f-400">Otros usuarios también hicieron las siguientes búsquedas</h2>
                @endif
            </div>
        </div>
        <section id="relacionados">
            <div class="container-fluid mt-5">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 py-4">
                        <div class="owl-services owl-carousel owl-theme">
                            @foreach($resultadosAlternos as $aleatorio)
                                <div class="item">
                                    <div class="card">
                                        <div class="card-header" style="padding: 0;">
                                            <img class="img-fluid" src="storage/{{$aleatorio->imagenes[0]->nombre}}" alt="">
                                        </div>
                                        <div class="card-body">
                                            <h4 class="black-text card-title"><a href="" class="black-text">{{$aleatorio->titulo}}</a></h4>
                                            <p><small class="color-azul">{{$aleatorio->municipio->nombre}}, {{$aleatorio->estado->nombre}}</small></p>
                                            <a href="{{route('web.desarrollosParticular', $aleatorio->id)}}" type="button" class="btn btn-success btn-sm">Ver más</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
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




    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
        
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Filtros</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
        
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="" id="form_filtros2" method="GET">

                        <div class="sidebar-header">
                            @foreach($_GET as $clave => $valor)
                                @if($clave == 'estado_id')
                                    <div class="chip" data-nombre="{{$clave}}">
                                        {{$estados->nombre}} <i class="fas fa-times eliminar_filtro"></i>
                                    </div>
                                @endif
                                @if($clave == 'tipo_inmueble_id' )
                                    <div class="chip" data-nombre="{{$clave}}">
                                        {{$tipoInmueble->titulo}} <i class="fas fa-times eliminar_filtro"></i>
                                    </div>
                                @endif
                                @if($clave == 'recamaras')
                                    <div class="chip" data-nombre="{{$clave}}">
                                        {{$valor}} recámaras(s) <i class="fas fa-times eliminar_filtro"></i>
                                    </div>
                                @endif
                            @endforeach
                        </div>
        
                        <div class="card black-text mb-3" hidden>
                            @if(isset($_GET['inmueble']))
                                <input type="text" name="inmueble" value="{{$_GET['inmueble']}}" class="form-control">
                            @endif
                        </div>
        
                        <div class="card black-text mb-3">
                            <article class="card-group-item">
                                <div class="card-header">
                                    <h6 class="title f-400">Cuidad o Estado</h6>
                                </div>
                                <div class="filter-content">
                                    <div class="card-body">
                                        <select class="my-select form-control" name="estado_id" data-style="btn-azul" data-size="5" show-tick>
                                            <option value="">Todas las ciudades</option>
                                            <option value="9" {{(isset($_GET['estado_id']) && $_GET['estado_id'] == 9) ? 'selected' : ''}}>CDMX</option>
                                            <option value="15" {{(isset($_GET['estado_id']) && $_GET['estado_id'] == 15) ? 'selected' : ''}}>Estado de México</option>
                                        </select>
                                    </div>
                                </div>
                            </article>
                        </div>
        
                        @if(isset($_GET['inmueble']) && $_GET['inmueble'] == 'propiedades')
                            <div class="card black-text mb-3">
                                <article class="card-group-item">
                                    <div class="card-header">
                                        <h6 class="title f-400">Tipo de inmueble </h6>
                                    </div>
                                    <div class="filter-content">
                                        <div class="card-body">
                                                <label class="form-check">
                                                    <input class="form-check-input" type="radio" name="tipo_inmueble_id" value="">
                                                    <span class="form-check-label">
                                                        Todos
                                                    </span>
                                                </label>
                                                <label class="form-check">
                                                    <input class="form-check-input" type="radio" name="tipo_inmueble_id" value="3" {{(isset($_GET['tipo_inmueble_id']) && $_GET['tipo_inmueble_id'] == 3) ? 'checked' : ''}}>
                                                    <span class="form-check-label">
                                                        Casas
                                                    </span>
                                                </label>
                                                <label class="form-check">
                                                    <input class="form-check-input" type="radio" name="tipo_inmueble_id" value="6" {{(isset($_GET['tipo_inmueble_id']) && $_GET['tipo_inmueble_id'] == 6) ? 'checked' : ''}}>
                                                    <span class="form-check-label">
                                                        Departamentos
                                                    </span>
                                                </label>
                                                <label class="form-check">
                                                    <input class="form-check-input" type="radio" name="tipo_inmueble_id" value="14" {{(isset($_GET['tipo_inmueble_id']) && $_GET['tipo_inmueble_id'] == 14) ? 'checked' : ''}}>
                                                    <span class="form-check-label">
                                                        Terrenos
                                                    </span>
                                                </label>
                                                <label class="form-check">
                                                    <input class="form-check-input" type="radio" name="tipo_inmueble_id" value="9" {{(isset($_GET['tipo_inmueble_id']) && $_GET['tipo_inmueble_id'] == 9) ? 'checked' : ''}}>
                                                    <span class="form-check-label">
                                                        Locales comerciales
                                                    </span>
                                                </label>
                                                <label class="form-check">
                                                    <input class="form-check-input" type="radio" name="tipo_inmueble_id" value="1" {{(isset($_GET['tipo_inmueble_id']) && $_GET['tipo_inmueble_id'] == 1) ? 'checked' : ''}}>
                                                    <span class="form-check-label">
                                                        Bodegas comerciales
                                                    </span>
                                                </label>
                                                <label class="form-check">
                                                    <input class="form-check-input" type="radio" name="tipo_inmueble_id" value="12" {{(isset($_GET['tipo_inmueble_id']) && $_GET['tipo_inmueble_id'] == 12) ? 'checked' : ''}}> 
                                                    <span class="form-check-label">
                                                        Oficinas
                                                    </span>
                                                </label>
                                                <label class="form-check">
                                                    <input class="form-check-input" type="radio" name="tipo_inmueble_id" value="7" {{(isset($_GET['tipo_inmueble_id']) && $_GET['tipo_inmueble_id'] == 7) ? 'checked' : ''}}>
                                                    <span class="form-check-label">
                                                        Edificios
                                                    </span>
                                                </label>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endif
        
                        <div class="card black-text mb-3">
                            <article class="card-group-item">
                                <div class="card-header">
                                    <h6 class="title f-400">Recámaras</h6>
                                </div>
                                <div class="filter-content">
                                    <div class="card-body">
                                        <div class="card-body">
                                            <label class="form-check">
                                                <input class="form-check-input" type="radio" name="recamaras" value="">
                                                <span class="form-check-label">
                                                    Sin mínimo
                                                </span>
                                            </label>
                                            <label class="form-check">
                                                <input class="form-check-input" type="radio" name="recamaras" value="1" {{(isset($_GET['recamaras']) && $_GET['recamaras'] == 1) ? 'checked' : ''}}>
                                                <span class="form-check-label">
                                                    1 Recámara
                                                </span>
                                            </label>
                                            <label class="form-check">
                                                <input class="form-check-input" type="radio" name="recamaras" value="2" {{(isset($_GET['recamaras']) && $_GET['recamaras'] == 2) ? 'checked' : ''}}>
                                                <span class="form-check-label">
                                                    2 Recámaras
                                                </span>
                                            </label>
                                            <label class="form-check">
                                                <input class="form-check-input" type="radio" name="recamaras" value="3" {{(isset($_GET['recamaras']) && $_GET['recamaras'] == 3) ? 'checked' : ''}}>
                                                <span class="form-check-label">
                                                    3 Recámaras
                                                </span>
                                            </label>
                                            <label class="form-check">
                                                <input class="form-check-input" type="radio" name="recamaras" value="4" {{(isset($_GET['recamaras']) && $_GET['recamaras'] == 4) ? 'checked' : ''}}>
                                                <span class="form-check-label">
                                                    4 Recámaras
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
        
                        <div class="card black-text mb-3">
                            <article class="card-group-item">
                                <div class="card-header">
                                    <h6 class="title f-400">Precio</h6>
                                </div>
                                <div class="filter-content">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="formControlRange">Rango de precios</label>
                                                    <input type="range" class="form-control-range" min=0 max=999000000 step=100000 id="formControlRange" onInput="$('#rangeval').html($(this).val())">
                                                    de $0 a $<span id="rangeval">500000</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- card-body.// -->
                                </div>
                            </article> <!-- card-group-item.// -->
                        </div>
        
                        <div class="card black-text mb-3">
                            <article class="card-group-item">
                                <div class="card-header">
                                    <h6 class="title f-400">Superficie m2 </h6>
                                </div>
                                <div class="filter-content">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Mínimo</label>
                                                <input type="number" class="form-control" id="inputEmail4" placeholder="m2">
                                            </div>
                                            <div class="form-group col-md-6 text-right">
                                                <label>Máximo</label>
                                                <input type="number" class="form-control" placeholder="m2">
                                            </div>
                                        </div>
                                    </div> <!-- card-body.// -->
                                </div>
                            </article> <!-- card-group-item.// -->
                        </div>
        
                        <div class="card black-text mb-3">
                            <article class="card-group-item">
                                <div class="card-header">
                                    <h6 class="title f-400">Estacionamientos</h6>
                                </div>
                                <div class="filter-content">
                                    <div class="card-body">
                                        <select class="my-select form-control" data-style="btn-azul" data-size="5" show-tick>
                                            <option>Sin estacionamiento</option>
                                            <option>Para 1 carro</option>
                                            <option>Para 2 carros</option>
                                            <option>Para 3 carros</option>
                                        </select>
                                    </div>
                                </div>
                            </article>
                        </div>
        
                        <div class="card black-text mb-3">
                            <article class="card-group-item">
                                <div class="card-header">
                                    <h6 class="title f-400">Baños</h6>
                                </div>
                                <div class="filter-content">
                                    <div class="card-body">
                                        <label class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadio" value="">
                                            <span class="form-check-label">
                                                1 baño
                                            </span>
                                        </label>
                                        <label class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadio" value="">
                                            <span class="form-check-label">
                                                2 baños
                                            </span>
                                        </label>
                                        <label class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadio" value="">
                                            <span class="form-check-label">
                                                3 baños
                                            </span>
                                        </label>
                                    </div> <!-- card-body.// -->
                                </div>
                            </article> <!-- card-group-item.// -->
                        </div>
        
                        <div class="card black-text mb-3">
                            <article class="card-group-item">
                                <div class="card-header">
                                    <h6 class="title f-400">Antiguedad</h6>
                                </div>
                                <div class="filter-content">
                                    <div class="card-body">
                                        <select class="my-select form-control" data-style="btn-azul" data-size="5" show-tick>
                                            <option>Preventa</option>
                                            <option>Entrega inmediata</option>
                                            <option>Menos de 5 años</option>
                                            <option>Entre 5 y 10 años</option>
                                            <option>Entre 10 y 15 años</option>
                                            <option>Más de 20 años</option>
                                        </select>
                                    </div>
                                </div>
                            </article>
                        </div>
        
                        <div class="card black-text mb-3">
                            <article class="card-group-item">
                                <div class="card-header">
                                    <h6 class="title f-400">Restricciones </h6>
                                </div>
                                <div class="filter-content">
                                    <div class="card-body">
                                        <label class="form-check">
                                            <input class="form-check-input" type="checkbox" value="">
                                            <span class="form-check-label">
                                                Permitir mascotas
                                            </span>
                                        </label>
                                        <label class="form-check">
                                            <input class="form-check-input" type="checkbox" value="">
                                            <span class="form-check-label">
                                                Permitir Fumar
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </article>
                        </div>
        
                        <div class="card mb-3 d-flex justify-content-center">
                            <button class="btn btn-lg btn-warning m-0 px-3 py-2 z-depth-0 waves-effect" type="submmit" id="button-addon2"> <i class="fas fa-search" aria-hidden="true"></i> FILTRAR</button>
                        </div>
        
                    </form>
                </div>
        
            </div>
        </div>
    </div>


    @push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ URL::asset ('js/propiedades.js') }}"></script>
@endpush

@endsection
