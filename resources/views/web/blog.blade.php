@extends('layouts.web')

@section('content')

<header id="resultado-propiedad"></header>

    <section id="blog">
        <main class="mt-5">
            <div class="container">

                <section class="pt-5">
                    <div class="wow fadeIn mb-5">
                        <h2 class="h1">Artículos de interés</h2>
                        <p class="h6">Esta sección se publican artículos sobre el mundo de los inmuebles, construcción, e información importante, que puede ayudarte a la compra o renta de un inmueble o indicarte las últimas tendencias en el ramo. Si tienes alguna duda o comentario, con gusto te podemos atender en la sección de contacto.</p>
                    </div>

                    @foreach($posts as $post)
                    <div class="row wow fadeIn">
                        @if(count($post->imagenes) > 0)
                        <div class="col-lg-5 col-xl-4 mb-4">
                            <div class="view overlay rounded z-depth-1-half">
                                <div class="view overlay">
                                    <img src="storage/{{$post->imagenes[0]->nombre}}" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="col-lg-7 col-xl-7 ml-xl-4 mb-4">
                            <h4 class="color-azul mb-0 f-400">
                                {{$post->titulo}}
                            </h4>
                            <h5><i class="far fa-calendar-alt color-verde mr-2"></i> {{$post->created_at}}</h5>
                            <p class="grey-text">
                                {!!$post->contenido!!}
                            </p>

                            <a href="{{route('web.blogParticular', $post->slug)}}" class="btn btn-verde btn-md">ver más</a>
                        </div>
                        <!--Grid column-->

                    </div>
                    @endforeach
                    <hr class="mb-5">


                    <!--Pagination-->
                    <div class="col-md-12 d-flex justify-content-center">
                        {{$posts->appends(request()->input())->links()}}
                    </div>
                    <!--Pagination-->

                </section>
                <!--Section: Cards-->

            </div>
        </main>
        <!--Main layout-->
    </section>

    <section id="relacionados">
       <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-10 col-lg-6">
                <h2 class="text-center f-400">Artículos relacionados</h2>
            </div>
        </div>
    </div>
        <div class="container">
            <div class="row my-5">

                <div class="col-6 col-md-4 my-3">
                    <!-- Card -->
                    <div class="card card-image h-200  relative">
                        <img src="assets/imagenes/tips/tips1.jpg" alt="">
                        <!-- Content -->
                        <div class="text-white text-center d-flex justify-content-center align-items-end rgba-black-strong  py-3 px-4 card-abs">
                            <div>
                                <h4 class="card-title py-2">Green interior design inspiration</h4>

                                <a class="btn btn-sm btn-green">Leer más</a>
                            </div>
                            <div class="post-date woodmart-post-date" onclick="">
                                <span class="post-date-day">12</span>
                                <span class="post-date-month">Ene</span>
                            </div>
                        </div>
                    </div>
                    <!-- Card -->
                </div>

            </div>
        </div>
    </section>

@endsection
