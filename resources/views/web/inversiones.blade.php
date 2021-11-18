@extends('layouts.web')

@section('content')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/inversiones.css')}}">
@endpush

<header id="header-inversiones">
    <div class="container">
        <div class="row align-items-center justify-content-center altura-100">
            <div class="col-12">
                <div class="row justify-content-center mt-5 mt-lg-0">
                    <div class="col-10">
                        <h2 class="display-4 white-text text-center mb-2"> ¿Quieres conocer más acerca de inversiones? </h2>
                        <h4 class="white-text text-center">Te invitamos a ver nuestro video haciendo clic en el siguiente botón</h4>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 text-center mt-4">
                        <button class="btn btn-lg btn-gradient-yellow sunny-morning-gradient"><i class="far fa-play-circle"></i> | Ver video</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<section id="inversiones">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="row my-5">
                    <div class="col-md-12">
                        <h1 class="display-4 text-center font-weight-bold">
                            La mejor de las <span class="color-verde">inversiones</span> <br>
                            están con <span class="font-weight-bold">nosotros</span>.
                        </h1>
                        <p class="text-center"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit quia, obcaecati id nemo reprehenderit unde ratione odio asperiores doloremque libero mollitia labore, voluptatibus aliquid voluptas corporis temporibus esse illum molestias.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="card-inversion">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-12">
                <div class="row my-5">
                    @foreach($inversiones as $inversion)
                        <div class="col-6 col-lg-3 my-3">
                            <!-- Card -->
                            <div class="card card-image h-400  relative">
                                <img src="{{asset('assets/imagenes')}}/inversiones/1.jpg" alt="">
                                <!-- Content -->
                                <div class="text-white text-center d-flex justify-content-center align-items-center rgba-black-strong  py-5 px-4 card-abs">
                                    <div>
                                        <h5 class="green-text heart-top"><i class="far fa-heart fa-lg"></i></h5>
                                        <h4 class="card-title text-center py-2"><strong>{{$inversion->titulo}} </strong></h4>
                                        <h5 class="color-verde f-400 mb-5">{{$inversion->estado->nombre}}</h5>
                                        <a href="{{route('web.inversionesParticular',$inversion->id)}}" class="btn btn-green"><i class="fas fa-clone left"></i>Ver proyecto</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card -->
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
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
</section>

    <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-10 col-lg-6">
            <h2 class="text-center f-400">Otros usuarios tambien vieron esto</h2>
        </div>
    </div>
</div>
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
<section id="inversion">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="row align-items-center py-5">
                    <div class="col-5">
                        <img src="assets/imagenes/logo-menu.png" alt="">
                    </div>
                    <div class="col-7 text-center">
                        <h2 class="display-4 white-text font-weight-bold">¿Buscas invertir?</h2>
                        <h3 class="white-text f-400">Conoce las mejores opciones de inversión para tí</h3>
                        <div class="row justify-content-center mt-4">
                            <div class="col-10">
                                <a href="#" type="button" class="btn btn-verde btn-lg white-text rounded waves-effect">Haz clic para conocer más</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
