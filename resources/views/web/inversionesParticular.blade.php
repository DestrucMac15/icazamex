@extends('layouts.web')

@section('content')

<header id="desarrollo-resultado" style="background-image: url('storage/{{$inversion->imagenes[0]->nombre}}')">

</header>
<div class="container-fluid mt-negativo">
    <div class="row px-2 px-lg-5">
        <div class="col-10 col-md-6 bg-light-desarrollo p-5">
            <h2 class="display5 color-azul f-700">{{$inversion->titulo}}</h2>
            <h2 class="display6 f-400">{{$inversion->precio_venta}}</h2>
            <div class="row">
                <div class="col-12">
                    <h5 class="color-verde">{{$inversion->estado->nombre}}</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="inversion-resultado" class="my-5 grey lighten-4 p-5">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="color-azul text-uppercase f-400">Número de departamentos</h4>
                                <h5>{{$inversion->recamaras}} departamentos</h5>
                                <hr>
                            </div>
                            <div class="col-12">
                                <h4 class="color-azul text-uppercase f-400">Metros totales de áreas verdes</h4>
                                <h5>4000 m2</h5>
                                <hr>
                            </div>
                            <div class="col-12">
                                <h4 class="color-azul text-uppercase f-400">Servicios y comodidades</h4>
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <h3>Generales</h3>
                                            <ul>
                                                @foreach($inversion->generales as $general)
                                                    <li>{{$general->titulo}}</li>
                                                @endforeach
                                            </ul>
                                        <h3>Exteriores</h3>
                                        <ul>
                                            @foreach($inversion->exteriores as $exterior)
                                                <li>{{$exterior->titulo}}</li>
                                            @endforeach
                                        </ul>
                                        <h3>Restricciones</h3>
                                        <ul>
                                            @foreach($inversion->restricciones as $restriccion)
                                                <li>{{$restriccion->titulo}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="color-azul text-uppercase f-400">Ubicación</h4>
                                <h5>{{$inversion->calle}}, {{$inversion->municipio->nombre}}, {{$inversion->codigo_postal}},
                                    {{$inversion->estado->abrev}}</h5>
                                <hr>
                            </div>
                            <div class="col-12">
                                <h4 class="color-azul text-uppercase f-400">Información de la zona</h4>
                                <p>{{$inversion->descripcion}}</p>
                                <hr>
                            </div>
                            <div class="col-12">
                                <h4 class="color-azul text-uppercase f-400 mb-2">Contacto del asesor</h4>
                                <p><i class="fas fa-user"></i> {{$inversion->usuario->name}}</p>
                                <p><i class="fas fa-envelope"></i> {{$inversion->usuario->email}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <img src="assets/imagenes/resultado-inversion.jpg" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="slider-resultado" class="my-5">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="owl-inversion owl-carousel owl-theme">
                    <div class="item">
                        <img src="img/1.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="img/2.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="img/3.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="img/4.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="img/5.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="departamentos">
    <div class="container-fluid" class="my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="table-responsive">
          <table class="table">
            <thead class="black white-text">
              <tr>
                <th scope="col">Departamento</th>
                <th scope="col">Estacionamientos</th>
                <th scope="col">Nivel</th>
                <th scope="col">Habitaciones</th>
                <th scope="col">Baños</th>
                <th scope="col">Balcón</th>
                <th scope="col">Terr/Patio</th>
                <th scope="col">m2 Totales</th>
                <th scope="col">Precio</th>
              </tr>
            </thead>
            <tbody>
                @foreach($inversion->inversiones as $item)
                    <tr>
                        <td>{{$item->titulo}}</td>
                        <td>{{$item->estacionamientos}}</td>
                        <td>{{$item->nivel}}</td>
                        <td>{{$item->habitaciones}}</td>
                        <td>{{$item->banios}}</td>
                        <td>{{$item->balcones}}</td>
                        <td>{{$item->patio}}</td>
                        <td>{{$item->m2}}</td>
                        <td>
                            @if($item->estatus == 'disponible')
                                ${{$item->precio}}.00
                            @elseif($item->estatus == 'apartado')
                                <span class="badge badge-warning">Apartado</span>
                            @else 
                                <span class="badge badge-danger">Vendido</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
            </div>
            </div>
        </div>
    </div>
</section>

<section id="descarga" class="my-5">
        <div class="container-fluid">
    <div class="row my-5 justify-content-center">
        <div class="col-12 col-lg-10 text-center py-5 grey lighten-4">
           <div class="row">
                <div class="col-12">
                    <h2 class="f-400">
                        ¿Quieres conocer cada detalle de esta inversión?
                    </h2>
                    <br>
                    <button type="button" class="btn btn-gradient-blue btn-lg white-text m-2">Descarga el brouche haciendo click aquí</button>
                </div>
            </div>
        </div>
    </div>

</div>


</section>



<section id="contacto" class="mt-5">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card mb-4 z-depth-0">
                            <article class="card-group-item">
                                <div class="card-header bg-white text-right f-400">
                                    <h2 class="title-contact color-azul f-400"> Contactanos para saber más de está inversión</h2>
                                    <h5 class="f-400">Completa los siguientes datos y nosotros nos pondrémos en contacto contigo</h5>
                                </div>
                                <div class="card-body">
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
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/mnf5-nLijs0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="contacto">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="row">
                    <div class="col-12">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3763.4000392829203!2d-99.16187238465564!3d19.395114086905693!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1ff0e4bca7849%3A0x4f0738651eff43ee!2sHeriberto%20Fr%C3%ADas%20407-481%2C%20Narvarte%20Poniente%2C%20Benito%20Ju%C3%A1rez%2C%2003020%20Ciudad%20de%20M%C3%A9xico%2C%20CDMX!5e0!3m2!1ses-419!2smx!4v1611798288265!5m2!1ses-419!2smx" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                    <div class="col-12 mt-4">
                        <button class="btn btn-lg btn-block btn-gradient-blue white-text"> Ver en Google Maps</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-10 col-lg-6">
            <h2 class="text-center f-400 my-5">Otros usuarios tambien vieron esto</h2>
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
