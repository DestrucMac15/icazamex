@extends('layouts.web')

@section('content')

<header id="resultado-propiedades"></header>
    <section id="contacto" class="my-5">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    
                    <div class="row">
                        <!--Section: Contact v.2-->
                        <section class="mb-4">

                            <!--Section heading-->
                            <h2 class="h1-responsive font-weight-bold text-center my-4 color-azul">Contáctanos</h2>
                            <!--Section description-->
                            <p class="text-center w-responsive mx-auto mb-5">¿Tienes alguna pregunta? No dudes en contactarnos directamente. Nuestro equipo se pondrá en contacto contigo en cuestión de horas para ayudarte.</p>

                            <div class="row justify-content-center">

                                <!--Grid column-->
                                <div class="col-md-10 mb-md-0 mb-5">
                                    <form action="{{route('web.contactoStore')}}" method="POST">
                                        @csrf
                                        <!--Grid row-->
                                        <div class="row">

                                            <!--Grid column-->
                                            <div class="col-md-6">
                                                <div class="md-form mb-0">
                                                    <input type="text" id="name" name="name" class="form-control">
                                                    <label for="name" class="">Nombre completo</label>
                                                </div>
                                                @error('name')
                                                    <small>{{$message}}</small>
                                                @enderror
                                            </div>
                                            <!--Grid column-->

                                            <!--Grid column-->
                                            <div class="col-md-6">
                                                <div class="md-form mb-0">
                                                    <input type="text" id="email" name="email" class="form-control">
                                                    <label for="email" class="">Correo electrónico</label>
                                                </div>
                                                @error('email')
                                                    <small>{{$message}}</small>
                                                @enderror
                                            </div>
                                            <!--Grid column-->

                                        </div>
                                        <!--Grid row-->

                                        <!--Grid row-->
                                        <div class="row">
                                           <div class="col-md-6">
                                                <div class="md-form mb-0">
                                                    <input type="tel" id="tel" name="tel" class="form-control">
                                                    <label for="tel" class="">Teléfono</label>
                                                </div>
                                                @error('tel')
                                                    <small>{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <div class="md-form mb-0">
                                                    <input type="text" id="subject" name="subject" class="form-control">
                                                    <label for="subject" class="">Asunto</label>
                                                </div>
                                                @error('subject')
                                                    <small>{{$message}}</small>
                                                @enderror
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
                                                    @error('message')
                                                        <small>{{$message}}</small>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>
                                        <!--Grid row-->

                                        <div class="text-center text-md-left">
                                            <button type="submit" class="btn btn-azul btn-block">Enviar</button>
                                        </div>
                                        <br>
                                        @if(session('info'))
                                            <div class="alert alert-success">
                                                {{session('info')}}
                                            </div>
                                        @endif
                                    </form>

                                </div>
                                <!--Grid column-->
                            </div>

                        </section>
                        <!--Section: Contact v.2-->
                        
                    </div>
                    
                    <div class="row mt-5">
                        <div class="col-6 col-md-3 text-center border-left">
                           <h4><i class="fas fa-phone-alt color-azul mb-3"></i></h4>
                            <h5 class="mb-3 ">Telefonos de contácto</h5>
                                <a href="tel:015585966437" class="f-400">
                                    55 8596 6437 <span class="ml-1">|</span>
                                </a>
                                <a href="tel:015585966437" class="f-400">
                                    55 8596 6437
                                </a>
                        </div>
                        <div class="col-6 col-md-3 text-center border-left">
                            <h4><i class="fab fa-whatsapp fa-lg color-azul mb-3"></i></h4>
                            <h5 class="mb-3 ">Whatsapp</h5>
                                <a href="tel:015585966437" class="f-400">
                                    55 8596 6437 <span class="ml-1">|</span>
                                </a>
                                <a href="tel:015585966437" class="f-400">
                                    55 8596 6437
                                </a>
                        </div>
                        <div class="col-6 col-md-3 text-center border-left">
                            <h4><i class="fas fa-envelope fa-lg color-azul mb-3"></i></h4>
                            <h5 class="mb-3 ">Correo Electrónico</h5>
                                <a href="mailto:contacto@icazamex.com" class="f-400">
                                   contacto@icazamex.com
                                </a>
                        </div>
                        <div class="col-6 col-md-3 text-center border-left border-right">
                           <h5 class="mb-3 mt-5">Siguenos en redes</h5>
                            <ul class="nav justify-content-center">
                        <li class="nav-item">
                            <a href="https://www.facebook.com/mdbootstrap" class="nav-link color-azul" target="_blank">
                                <i class="fab fa-facebook-f fa-lg"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="https://twitter.com/MDBootstrap" class="nav-link color-azul" target="_blank">
                                <i class="fab fa-instagram fa-lg"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="https://youtube" class="nav-link color-azul">
                                <i class="fab fa-youtube fa-lg"></i>
                            </a>
                        </li>
                    </ul>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <section id="ubicacion">
        <div class="container-fluid">
            <div class="row">
                       <div class="col-12 mt-4">
                            <button class="btn btn-lg btn-block btn-gradient-blue white-text disabled">Dirección: Uxmal 958, Sta Cruz Atoyac, Benito Juárez, 03310 CDMX.</button>
                        </div>
                        <div class="col-12">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3764.0531896426996!2d-99.16151968578266!3d19.366849447799936!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1ffb9826a364f%3A0xe91874089cff9dd5!2sUxmal%20958%2C%20Sta%20Cruz%20Atoyac%2C%20Benito%20Ju%C3%A1rez%2C%2003310%20Ciudad%20de%20M%C3%A9xico%2C%20CDMX!5e0!3m2!1sen!2smx!4v1620253529387!5m2!1sen!2smx" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                        
                        
                    </div>
        </div>
    </section>

@endsection