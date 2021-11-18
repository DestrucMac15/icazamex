@extends('layouts.web')

@section('content')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/style-aside.css') }}">
@endpush

<header id="resultado-propiedades"></header>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">

            <form action="" method="GET">

                <div class="sidebar-header">
                    <h3 class="black-text">Filtros</h3>
                    @foreach($_GET as $clave => $valor)
                        <div class="chip">
                            {{strtoupper($valor)}}
                            <i class="close fas fa-times"></i>
                        </div>
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
                                            <input class="form-check-input" type="radio" name="tipo_inmueble_id" value="3" {{(isset($_GET['tipo_inmueble']) && $_GET['tipo_inmueble'] == 3) ? 'checked' : ''}}>
                                            <span class="form-check-label">
                                                Casa
                                            </span>
                                        </label>
                                        <label class="form-check">
                                            <input class="form-check-input" type="radio" name="tipo_inmueble_id" value="6" {{(isset($_GET['tipo_inmueble']) && $_GET['tipo_inmueble'] == 6) ? 'checked' : ''}}>
                                            <span class="form-check-label">
                                                Departamento
                                            </span>
                                        </label>
                                        <label class="form-check">
                                            <input class="form-check-input" type="radio" name="tipo_inmueble_id" value="14" {{(isset($_GET['tipo_inmueble']) && $_GET['tipo_inmueble'] == 14) ? 'checked' : ''}}>
                                            <span class="form-check-label">
                                                Terreno
                                            </span>
                                        </label>
                                        <label class="form-check">
                                            <input class="form-check-input" type="radio" name="tipo_inmueble_id" value="9" {{(isset($_GET['tipo_inmueble']) && $_GET['tipo_inmueble'] == 9) ? 'checked' : ''}}>
                                            <span class="form-check-label">
                                                Local comercial
                                            </span>
                                        </label>
                                        <label class="form-check">
                                            <input class="form-check-input" type="radio" name="tipo_inmueble_id" value="1" {{(isset($_GET['tipo_inmueble']) && $_GET['tipo_inmueble'] == 1) ? 'checked' : ''}}>
                                            <span class="form-check-label">
                                                Bodega comercial
                                            </span>
                                        </label>
                                        <label class="form-check">
                                            <input class="form-check-input" type="radio" name="tipo_inmueble_id" value="12" {{(isset($_GET['tipo_inmueble']) && $_GET['tipo_inmueble'] == 12) ? 'checked' : ''}}> 
                                            <span class="form-check-label">
                                                Oficina
                                            </span>
                                        </label>
                                        <label class="form-check">
                                            <input class="form-check-input" type="radio" name="tipo_inmueble_id" value="7" {{(isset($_GET['tipo_inmueble']) && $_GET['tipo_inmueble'] == 7) ? 'checked' : ''}}>
                                            <span class="form-check-label">
                                                Edificio
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
                            <h6 class="title f-400">Precio</h6>
                        </div>
                        <div class="filter-content">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Mínimo</label>
                                        <input type="number" class="form-control" id="inputEmail4" placeholder="$0">
                                    </div>
                                    <div class="form-group col-md-6 text-right">
                                        <label>Máximo</label>
                                        <input type="number" class="form-control" placeholder="$10,000.00">
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
                            <h6 class="title f-400">Recamaras</h6>
                        </div>
                        <div class="filter-content">
                            <div class="card-body">
                                <select class="my-select form-control" data-style="btn-azul" data-size="5" show-tick>
                                    <option>1 Recamaras</option>
                                    <option>2 Recamaras</option>
                                    <option>3 Recamaras</option>
                                    <option>Más Recamaras</option>
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
                                <li class="breadcrumb-item"><a class="color-verde" href="/">INICIO</a></li>
                                <li class="breadcrumb-item"><a class="color-verde" href="{{route('web.promociones')}}">PRMOCIONES</a></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-12">
                        <div class="row justify-content-center">

                            @foreach($ofertas as $oferta)
                            <div class="col-md-12">

                                <!-- Card -->
                                <div class="card">
                                    <div class="card-body row">
                                        <div class="col-md-4">
                                            <!-- Card image -->
                                            <div id="a{{$oferta->id}}" class="carousel slide" data-ride="carousel">
                                                <ol class="carousel-indicators">
                                                    <li data-target="#a{{$oferta->id}}" data-slide-to="0" class="active"></li>
                                                    <li data-target="#a{{$oferta->id}}" data-slide-to="1"></li>
                                                    <li data-target="#a{{$oferta->id}}" data-slide-to="2"></li>
                                                </ol>
                                                <div class="carousel-inner">
                                                    @foreach($oferta->imagenes as $imagen)
                                                        <div class="carousel-item {{$oferta->imagenes[0]->nombre == $imagen->nombre ? 'active' : ''}}">
                                                            <img src="{{asset('storage/'.$imagen->nombre)}}" class="d-block w-100" alt="...">
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <a class="carousel-control-prev" href="#a{{$oferta->id}}" role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#a{{$oferta->id}}" role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <h3>{{$oferta->titulo}}</h3>
                                            <small class="color-azul">{{$oferta->estado->nombre}}, {{$oferta->municipio->nombre}}</small>
                                            <p>{{$oferta->descripcion}}</p>
                                            <a href="" class="btn btn-success">Ver más</a>
                                        </div>
                                        <div class="col-md-4">
                                                <ul class="list-group list-group-flush text-white">
                                                    <li class="list-group-item" style="background: #6c757d;">
                                                        <h5>$ <span>{{number_format($oferta->precio_venta, 2, '.', ' ')}}</span> MXN</h5>
                                                    </li>
                                                    <li class="list-group-item" style="background: #6c757d;">
                                                        <i class="fas fa-bed"></i> <span>{{$oferta->recamaras}} Recamaras</span>
                                                    </li>
                                                    <li class="list-group-item" style="background: #6c757d;">
                                                        <i class="fas fa-toilet"></i> <span>{{$oferta->banios}} Baños</span>
                                                    </li>
                                                    <li class="list-group-item" style="background: #6c757d;">
                                                        <i class="fas fa-border-all"></i> <span>{{$oferta->superficie_terreno}} m2</span>
                                                    </li>
                                                </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card -->
                            </div>
                            @endforeach



                        </div>
                    </div>
                    <div class="col-12 mt-4">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination pg-blue pagination-lg justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item"><a class="page-link">1</a></li>
                                <li class="page-item active">
                                    <span class="page-link">
                                        2
                                        <span class="sr-only">(current)</span>
                                    </span>
                                </li>
                                <li class="page-item"><a class="page-link">3</a></li>
                                <li class="page-item">
                                    <a class="page-link">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>


                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-lg-6">
                <h2 class="text-center f-400">Propiedades en promoción</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">

            </div>
        </div>
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



@endsection
