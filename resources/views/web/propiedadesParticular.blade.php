@extends('layouts.web')

@section('content')

@push('styles')
<link rel="stylesheet" href="{{asset('css/lightslider.css')}}">
@endpush

<header id="resultado-propiedad"></header>

    <div class="container-fluid py-5">
        <div class="row px-2 px-lg-5">
            <div class="col-12 col-md-6">
                <h2 class="display5 color-azul f-700"><i class="fas fa-home"></i> Renta de casa - <span>{{$propiedad->titulo}}</span></h2>
                <h2 class="display6 f-400">$ {{number_format($propiedad->precio_venta, 2, '.', ' ')}}</h2>
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb f-400">
                                <li class="breadcrumb-item"><a class="color-verde" href="{{route('web.inmuebles',['inmueble' => 'propiedades'])}}">Inicio</a></li>
                                <li class="breadcrumb-item"><a class="color-verde" href="#">{{$propiedad->estado->nombre}}</a></li>
                                <li class="breadcrumb-item"><a href="" class="color-verde">{{$propiedad->municipio->nombre}}</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="row justify-content-center" id="inversion">
                    <div class="col-12">
                        <div class="row align-items-center py-4">
                            <div class="col-5">
                                <img src="assets/imagenes/logo-menu.png" class="img-fluid" alt="">
                            </div>
                            <div class="col-7 text-center">
                                <h2 class="display-6 color-azul font-weight-bold">¿Buscas invertir?</h2>
                                <h5 class="color-azul f-400">Conoce las mejores opciones de inversión para tí</h5>
                                <div class="row justify-content-center mt-4">
                                    <div class="col-10">
                                        <a href="#" type="button" class="btn btn-verde btn-md white-text rounded waves-effect">Haz clic para conocer más</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="row px-2 px-lg-5">
            <div class="col-12 col-md-7">
                <div class="row">
                    <div class="col-12">
                           <div class="item">
                            <div class="clearfix" style="width:100%">
                                <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                    @foreach($propiedad->imagenes as $imagen)
                                        
                                        <li data-thumb="{{asset('storage/'.$imagen->nombre)}}">
                                            <img src="{{asset('storage/'.$imagen->nombre)}}" width="100%"/>
                                        </li>
                                    @endforeach;
                                    
                                </ul>
                            </div>
                        </div>
                        </div>
                </div>
                
                <div class="row my-4">
                    <div class="col-4">
                        <button class="btn btn-lg btn-block btn-gradient-blue white-text"><i class="fas fa-phone-volume mr-2"></i> Llamada</button>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-lg btn-block btn-gradient-blue white-text"><i class="fas fa-comment mr-2"></i> Mensaje</button>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-lg btn-block btn-verde white-text"><i class="fab fa-whatsapp mr-2"></i> WhatsApp</button>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <h2 class="f-400">Excelente Ubicación - Col. Portales</h2>
                        <p>{{$propiedad->descripcion}}</p>
                        <h2 class="f-400">Amenidades</h2>
                        <p>Amenidades</p>
                            <ul>
                                @foreach($propiedad->amenidades as $amenidad)
                                    <li>{{$amenidad->titulo}}</li>
                                @endforeach
                            </ul>
                        <p>Generales</p>
                            <ul>
                                @foreach($propiedad->generales as $general)
                                    <li>{{$general->titulo}}</li>
                                @endforeach
                            </ul>
                        <p>Servicios</p>
                        <ul>
                            @foreach($propiedad->servicios as $servicio)
                                <li>{{$servicio->titulo}}</li>
                            @endforeach
                        </ul>
                        <p>Exteriores</p>
                        <ul>
                            @foreach($propiedad->exteriores as $exterior)
                                <li>{{$exterior->titulo}}</li>
                            @endforeach
                        </ul>
                        <p>Restricciones</p>
                        <ul>
                            @foreach($propiedad->restricciones as $restriccion)
                                <li>{{$restriccion->titulo}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3763.4000392829203!2d-99.16187238465564!3d19.395114086905693!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1ff0e4bca7849%3A0x4f0738651eff43ee!2sHeriberto%20Fr%C3%ADas%20407-481%2C%20Narvarte%20Poniente%2C%20Benito%20Ju%C3%A1rez%2C%2003020%20Ciudad%20de%20M%C3%A9xico%2C%20CDMX!5e0!3m2!1ses-419!2smx!4v1611798288265!5m2!1ses-419!2smx" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                    <div class="col-12 mt-4">
                         <button class="btn btn-lg btn-block btn-gradient-blue white-text"> Ver en Google Maps</button>
                    </div>
                </div>
                
                
                
            </div>

            <!--------------------------------------------------------   
           Barra lateral        
---------------------------------------------------------->
            <div class="col-md-5">
                <aside>

                    <div class="card mb-4">
                        <article class="card-group-item">
                            <div class="card-header stylish-color white-text">
                                <h4 class="title text-center f-400"><i class="fas fa-list-ul"></i> Caracteristicas</h4>
                            </div>
                            <div class="card-body">
                                <div class="filter-content">
                                    <div class="list-group list-group-flush">
                                        <div class="container">
                                            <div class="row border-bottom py-3">
                                                <div class="col-6">
                                                    <i class="far fa-clock mr-1 fa-lg"></i> Antiguedad
                                                </div>
                                                <div class="col-6 color-azul">
                                                    5 años
                                                </div>
                                            </div>
                                            <div class="row border-bottom py-3">
                                                <div class="col-6">
                                                    <i class="fas fa-bed mr-1 fa-lg"></i> Recamaras
                                                </div>
                                                <div class="col-6 color-azul">
                                                    {{$propiedad->recamaras}}
                                                </div>
                                            </div>
                                            <div class="row border-bottom py-3">
                                                <div class="col-6">
                                                    <i class="fas fa-car mr-1 fa-lg"></i> Estacionamientos
                                                </div>
                                                <div class="col-6 color-azul">
                                                    {{$propiedad->estacionamientos}}2
                                                </div>
                                            </div>
                                            <div class="row border-bottom py-3">
                                                <div class="col-6">
                                                    <i class="fas fa-toilet mr-1 fa-lg"></i> Baños Completos
                                                </div>
                                                <div class="col-6 color-azul">
                                                    {{$propiedad->banios}}
                                                </div>
                                            </div>
                                            <div class="row border-bottom py-3">
                                                <div class="col-6">
                                                    <i class="fas fa-border-all mr-1 fa-lg"></i> M2 construidos
                                                </div>
                                                <div class="col-6 color-azul">
                                                    {{$propiedad->superficie_construida}} m2
                                                </div>
                                            </div>
                                            <div class="row border-bottom py-3">
                                                <div class="col-6">
                                                    <i class="fas fa-border-none mr-1 fa-lg"></i> M2 totales
                                                </div>
                                                <div class="col-6 color-azul">
                                                    {{$propiedad->superficie_terreno}} m2
                                                </div>
                                            </div>
                                            <div class="row border-bottom py-3">
                                                <div class="col-6">
                                                    <i class="fas fa-map-marker-alt mr-1 fa-lg"></i> Ubicación
                                                </div>
                                                <div class="col-6 color-azul">
                                                    {{$propiedad->calle}}, {{$propiedad->municipio->nombre}}, {{$propiedad->codigo_postal}},
                                                    {{$propiedad->estado->abrev}}
                                                </div>
                                            </div>
                                            <div class="row border-bottom py-3">
                                                <div class="col-6">
                                                    <i class="fas fa-user mr-1 fa-lg"></i> Asesor
                                                </div>
                                                <div class="col-6 color-azul">
                                                    {{$propiedad->usuario->name}} <br>
                                                    {{$propiedad->usuario->email}}<br>
                                                </div>
                                            </div>
                                        </div>

                                    </div> <!-- list-group .// -->
                                </div>
                            </div>
                        </article> <!-- card-group-item.// -->
                    </div> <!-- card.// -->

                    <div class="card mb-4">
                        <article class="card-group-item">
                            <div class="card-header stylish-color white-text">
                                <h4 class="title text-center f-400"><i class="fas fa-share-alt"></i> Comparte</h4>
                            </div>
                            <div class="card-body">
                                <ul class="nav justify-content-center">
                                    <li class="nav-item">
                                        <a href="https://www.facebook.com/mdbootstrap" class="nav-link color-azul" target="_blank">
                                            <i class="fab fa-facebook-f fa-2x"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="https://twitter.com/MDBootstrap" class="nav-link color-azul" target="_blank">
                                            <i class="fab fa-instagram fa-2x"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="https://youtube" class="nav-link color-azul">
                                            <i class="fab fa-youtube fa-2x"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="https://youtube" class="nav-link color-azul">
                                            <i class="fab fa-whatsapp fa-2x"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="https://youtube" class="nav-link color-azul">
                                            <i class="fas fa-envelope fa-2x"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="https://youtube" class="nav-link color-azul">
                                            <i class="fas fa-share-alt fa-2x"></i>
                                        </a>
                                    </li>

                                </ul>

                            </div>
                        </article> <!-- card-group-item.// -->
                    </div> <!-- card.// -->

                    <div class="card mb-4">
                        <article class="card-group-item">
                            <div class="card-header stylish-color white-text">
                                <h4 class="title text-center f-400"><i class="fas fa-phone-volume"></i> Nosotros te llamamos</h4>
                            </div>
                            <div class="card-body">
                                <h5>Completa los siguientes datos y nosotros nos pondrémos en contacto contigo</h5>

                                <div class="row">

                                    <!--Grid column-->
                                    <div class="col-md-12 mb-md-0 mb-5">
                                        <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                                            <!--Grid row-->
                                            <div class="row">

                                                <!--Grid column-->
                                                <div class="col-md-12">
                                                    <div class="md-form mb-0">
                                                        <input type="text" id="name" name="name" class="form-control">
                                                        <label for="name" class="">Nombre completo</label>
                                                    </div>
                                                </div>
                                                <!--Grid column-->

                                                <!--Grid column-->
                                                <div class="col-md-12">
                                                    <div class="md-form mb-0">
                                                        <input type="text" id="email" name="email" class="form-control">
                                                        <label for="email" class="">Correo electrónico</label>
                                                    </div>
                                                </div>
                                                <!--Grid column-->

                                            </div>
                                            <!--Grid row-->

                                            <!--Grid row-->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="md-form mb-0">
                                                        <input type="tel" id="tel" name="tel" class="form-control">
                                                        <label for="tel" class="">Teléfono de contacto</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Grid row-->

                                            <!--Grid row-->
                                            <div class="row">

                                                <!--Grid column-->
                                                <div class="col-md-12">

                                                    <div class="md-form">
                                                        <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                                                        <label for="message">Mensaje</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <!--Grid row-->

                                        </form>

                                        <div class="text-center text-md-left">
                                            <a class="btn btn-warning btn-block" onclick="document.getElementById('contact-form').submit();">Enviar</a>
                                        </div>
                                        <div class="status"></div>
                                    </div>
                                    <!--Grid column-->
                                </div>
                            </div>
                        </article> <!-- card-group-item.// -->
                    </div> <!-- card.// -->

                    <div class="card mb-4">
                        <article class="card-group-item">
                            <div class="card-header stylish-color white-text">
                                <h4 class="title text-center f-400"><i class="fas fa-phone-volume"></i>Cotiza tu hipoteca</h4>
                            </div>
                            <div class="card-body">
                                <h5>Completa los siguientes campos con la informacón que consideres correcta</h5>

                                <div class="row">

                                    <!--Grid column-->
                                    <div class="col-md-12 mb-md-0 mb-5">
                                        <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                                            <!--Grid row-->
                                            <div class="row">

                                                <!--Grid column-->
                                                <div class="col-md-12">
                                                    <div class="md-form mb-0">

                                                        <p class="">Propósito de la hipoteca</p>
                                                        <select class="my-select" data-style="btn-azul" data-size="5" show-tick>
                                                            <option>Comprar una casa</option>
                                                            <option>Opción 2</option>
                                                            <option>Opción 3</option>
                                                            <option>Opción 4</option>
                                                            <option>Opción 5</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!--Grid column-->

                                                <!--Grid column-->
                                                <div class="col-md-12">
                                                    <div class="md-form mb-0">
                                                        <input type="text" id="propiedad" name="propiedad" class="form-control">
                                                        <label for="propiedad" class="">Valor de la propiedad</label>
                                                    </div>
                                                </div>
                                                <!--Grid column-->

                                                <!--Grid column-->
                                                <div class="col-md-12">
                                                    <div class="md-form mb-0">
                                                        <input type="text" id="credito" name="credito" class="form-control">
                                                        <label for="credito" class="">Monto del crédito</label>
                                                    </div>
                                                </div>
                                                <!--Grid column-->

                                            </div>
                                            <!--Grid row-->

                                            <!--Grid row-->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="md-form mb-0">
                                                        <p class="">Plazo del credito</p>
                                                        <select class="my-select" data-style="btn-azul" data-size="5" show-tick>
                                                            <option>20 años</option>
                                                            <option>Opción 2</option>
                                                            <option>Opción 3</option>
                                                            <option>Opción 4</option>
                                                            <option>Opción 5</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Grid row-->

                                            <!--Grid row-->
                                            <div class="row">
                                                <!--Grid column-->
                                                <div class="col-md-12">
                                                    <div class="md-form">
                                                        <p class="">Comprobación de ingresos</p>
                                                        <select class="my-select" data-style="btn-azul" data-size="5" show-tick>
                                                            <option>Asalariados</option>
                                                            <option>Opción 2</option>
                                                            <option>Opción 3</option>
                                                            <option>Opción 4</option>
                                                            <option>Opción 5</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Grid row-->
                                            
                                            <!--Grid row-->
                                            <div class="row">
                                                <!--Grid column-->
                                                <div class="col-md-12">
                                                    <div class="md-form">
                                                        <p class="">Su historial credicio es:</p>
                                                        <select class="my-select" data-style="btn-azul" data-size="5" show-tick>
                                                            <option>Bueno</option>
                                                            <option>Regular</option>
                                                            <option>Malo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Grid row-->

                                        </form>

                                        <div class="text-center text-md-left">
                                            <a class="btn btn-warning btn-block" onclick="document.getElementById('contact-form').submit();">Cotizar</a>
                                        </div>
                                        <div class="status"></div>
                                    </div>
                                    <!--Grid column-->
                                </div>
                            </div>
                        </article> <!-- card-group-item.// -->
                    </div> <!-- card.// -->


                </aside>
            </div>

        </div>
    </div>



    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-lg-6">
                <h2 class="text-center f-400">Otros usuarios tambien vieron esto</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">

            </div>
        </div>
    </div>
    <section id="relacionados">
        <div class="container-fluid mt-5">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 py-4">
                    <div class="owl-services owl-carousel owl-theme">
                        @foreach($propiedadesAleatorios as $aleatorio)
                            <div class="item">
                                <div class="card">
                                    <div class="card-header" style="padding: 0;">
                                        <img class="img-fluid" src="storage/{{$aleatorio->imagenes[0]->nombre}}" alt="">
                                    </div>
                                    <div class="card-body">
                                        <h4 class="black-text card-title"><a href="" class="black-text">{{$aleatorio->titulo}}</a></h4>
                                        <p><small class="color-azul">{{$aleatorio->municipio->nombre}}, {{$aleatorio->estado->nombre}}</small></p>
                                        <a href="{{route('web.propiedadesParticular', $aleatorio->id)}}" type="button" class="btn btn-success btn-sm">Ver más</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="inversion" class="my-5">
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

    @push('scripts')
        <script src="{{asset('js/lightslider.js')}}"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#image-gallery').lightSlider({
                    gallery: true,
                    item: 1,
                    thumbItem: 9,
                    controls: true,
                    pause: 7000,
                    slideMargin: 0,
                    speed: 1500,
                    auto: true,
                    loop: true,
                    enableTouch:true,
                    enableDrag:true,
                    onSliderLoad: function() {
                        $('#image-gallery').removeClass('cS-hidden');
                    }
                });
            });
        </script>
    @endpush

@endsection
