@extends('layouts.web')

@section('content')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/tips.css')}}">    
@endpush

<header id="resultado-propiedad"></header>

    <section id="tip">
        <!--Main layout-->
        <main class="mt-5 pt-5">
            <div class="container">

                <!--Section: Post-->
                <section class="mt-4">

                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-8 mb-4">

                            <!--Featured Image-->
                            <div class="card mb-4 wow fadeIn">
                                <img src="storage/{{$post[0]->imagenes[0]->nombre}}" class="img-fluid" alt="">
                            </div>
                            <!--/.Featured Image-->

                            <!--Card-->
                            <div class="card mb-4 wow fadeIn">

                                <!--Card content-->
                                <div class="card-body">
                                    <p class="h5 my-4">{{$post[0]->titulo}}</p>
                                    <!--<blockquote class="blockquote">
                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                        <footer class="blockquote-footer">Someone famous in
                                            <cite title="Source Title">Source Title</cite>
                                        </footer>
                                    </blockquote>-->

                                    <p>{!!$post[0]->contenido!!}</p>

                                </div>

                            </div>
                            <!--/.Card-->

                            <!--Card-->
                            <div class="card mb-4 wow fadeIn">

                                <div class="card-header font-weight-bold">
                                    <span>Autor</span>
                                </div>

                                <!--Card content-->
                                <div class="card-body">

                                    <div class="media d-block d-md-flex mt-3">
                                        <img class="d-flex mb-3 mx-auto z-depth-1" src="https://mdbootstrap.com/img/Photos/Avatars/img (30).jpg" alt="Generic placeholder image" style="width: 100px;">
                                        <div class="media-body text-center text-md-left ml-md-3 ml-0">
                                            <h5 class="mt-0 font-weight-bold">{{$post[0]->usuarios->name}}</h5>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <!--/.Card-->

                            <!--Comments-->
                            <div class="card card-comments mb-3 wow fadeIn">
                                <div class="card-header font-weight-bold">Comentarios</div>
                                <div class="card-body">

                                    <p class="text-center">Sin Comentarios</p>

                                </div>
                            </div>
                            <!--/.Comments-->

                            <!--Reply-->
                            <div class="card mb-3 wow fadeIn">
                                <div class="card-header font-weight-bold">Comentario</div>
                                <div class="card-body">

                                    <!-- Default form reply -->
                                    <form>

                                        <!-- Comment -->
                                        <div class="form-group">
                                            <label for="replyFormComment">Tu comentarios</label>
                                            <textarea class="form-control" id="replyFormComment" rows="5"></textarea>
                                        </div>

                                        <!-- Name -->
                                        <label for="replyFormName">Nombre</label>
                                        <input type="email" id="replyFormName" class="form-control">

                                        <br>

                                        <!-- Email -->
                                        <label for="replyFormEmail">Correo electrónico</label>
                                        <input type="email" id="replyFormEmail" class="form-control">


                                        <div class="text-center mt-4">
                                            <button class="btn btn-info btn-md" type="submit">Enviar</button>
                                        </div>
                                    </form>
                                    <!-- Default form reply -->



                                </div>
                            </div>
                            <!--/.Reply-->

                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-4 mb-4">

                            <!--Card: Jumbotron-->
                            <div class="card blue-gradient mb-4 wow fadeIn">

                                <!-- Content -->
                                <div class="card-body text-white text-center">

                                    <h4 class="mb-4">
                                        <strong>Icazamex</strong>
                                    </h4>
                                    <div style="line-height: 2;">
                                        <ul class="nav py-2 white-text mr-0 mr-lg-4 telefonos">
                                            <li class="nav-item mr-3">
                                                <i class="fas fa-phone-alt fa-lg mr-2"></i>
                                                <a href="tel:015585966437" class="white-text f-400">
                                                    558596 6437 <span class="ml-1">|</span>
                                                </a>
                                            </li>
                                            <li class="nav-item mr-3">
                                                <a href="tel:015572124635" class="white-text f-400">
                                                    5572124635 
                                                </a>
                                            </li>
                                            
                                            <li class="nav-item">
                                                <i class="far fa-envelope fa-lg mr-2"></i>
                                                <a href="mailto:contacto@icazamex.com" class="white-text f-400">
                                                    contacto@icazamex.com
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                                <!-- Content -->
                            </div>
                            <!--Card: Jumbotron-->

                            <!--Card : Dynamic content wrapper-->
                            <div class="card mb-4 text-center wow fadeIn">

                                <div class="card-header">¿Quieres informarte sobre nuevos artículos?</div>

                                <!--Card content-->
                                <div class="card-body">

                                    <!-- Default form login -->
                                    <form>

                                        <!-- Default input email -->
                                        <label for="defaultFormEmailEx" class="grey-text">Correo electrónico</label>
                                        <input type="email" id="defaultFormLoginEmailEx" class="form-control">

                                        <br>

                                        <!-- Default input password -->
                                        <label for="defaultFormNameEx" class="grey-text">Nombre y apellido</label>
                                        <input type="text" id="defaultFormNameEx" class="form-control">

                                        <div class="text-center mt-4">
                                            <button class="btn btn-info btn-md" type="submit">Suscribirse</button>
                                        </div>
                                    </form>
                                    <!-- Default form login -->

                                </div>

                            </div>
                            <!--/.Card : Dynamic content wrapper-->

                            <!--Card-->
                            <div class="card mb-4 wow fadeIn">

                                <div class="card-header">Articulos relacionados</div>

                                <!--Card content-->
                                <div class="card-body">

                                    <ul class="list-unstyled">
                                        <li class="media">
                                            <img class="d-flex mr-3 img-fluid" width="80" src="assets/imagenes/tips/tips1.jpg" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <a href="">
                                                    <h5 class="mt-0 mb-1 f-400 color-azul">Green interior design inspiration</h5>
                                                </a>
                                                Cras sit amet nibh libero, in gravida nulla (...)
                                            </div>
                                        </li>
                                        <li class="media my-4">
                                             <img class="d-flex mr-3 img-fluid" width="80" src="assets/imagenes/tips/tips1.jpg" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <a href="">
                                                    <h5 class="mt-0 mb-1 f-400 color-azul">Green interior design inspiration</h5>
                                                </a>
                                                Cras sit amet nibh libero, in gravida nulla (...)
                                            </div>
                                        </li>
                                        <li class="media">
                                            <img class="d-flex mr-3 img-fluid" width="80" src="assets/imagenes/tips/tips1.jpg" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <a href="">
                                                    <h5 class="mt-0 mb-1 f-400 color-azul">Green interior design inspiration</h5>
                                                </a>
                                                Cras sit amet nibh libero, in gravida nulla (...)
                                            </div>
                                        </li>
                                    </ul>

                                </div>

                            </div>
                            <!--/.Card-->

                        </div>
                        <!--Grid column-->

                    </div>
                    <!--Grid row-->

                </section>
                <!--Section: Post-->

            </div>
        </main>
        <!--Main layout-->
    </section>

    
@endsection