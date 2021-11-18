<footer class="bg-azul text-white text-lg-start">
    <!-- Grid container -->
    <div class="container-fluid p-4">
        <!--Grid row-->
        <div class="row">
            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <div class="footer-logo" style="max-width: 50%; margin-bottom: 20px;">
                    <img src="assets/imagenes/logo-white.png" class="d-block mx-auto img-fluid" alt="" />
                </div>

                <div style="line-height: 2;">
                    <ul class="nav py-2 white-text mr-0 mr-lg-4 telefonos d-flex justify-content-center">
                        <li class="nav-item mr-3">
                            <i class="fas fa-phone-alt fa-lg mr-2"></i>
                            <a href="tel:015585966437" class="white-text f-400">
                                55 8596 6437 <span class="ml-1">|</span>
                            </a>
                        </li>
                        <li class="nav-item mr-3">
                            <a href="tel:015572124635" class="white-text f-400">
                                55 7212 4635 <span class="ml-1">|</span>
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
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-3 col-md-3 mb-4 mb-md-0 d-flex justify-content-center align-items-center">
                <ul class="list-unstyled mb-0">
                    <li class="text-center text-md-left">
                        <a href="" class="text-white ">Desarrollos</a>
                    </li>
                    <li class="text-center text-md-left">
                        <a href="" class="text-white">Propiedades</a>
                    </li>
                    <li class="text-center text-md-left">
                        <a href="#" class="text-white">Promociones</a>
                    </li>
                    <li class="text-center text-md-left">
                        <a href="{{route('web.contacto')}}" class="text-white">Contacto</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 mb-4 mb-md-0 d-flex justify-content-center align-items-center">
                <ul class="list-unstyled mb-0">
                    <li class="text-center text-md-left">
                        <a href="{{route('web.preguntasFrecuentes')}}" class="text-white">Preguntas Frecuentes</a>
                    </li>
                    <li class="text-center text-md-left">
                        <a href="{{route('web.blog')}}" class="text-white">Artículos de Interés</a>
                    </li>
                    <li class="text-center text-md-left">
                        <a href="{{route('web.login')}}" class="text-white">Ingresa a tu cuenta</a>
                    </li>
                </ul>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <!--<div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase f-400 mb-3">Legales</h5>
                <ul class="list-unstyled">
                    <li>
                        <a href="#!" class="text-white">Aviso de privacidad</a>
                    </li>
                    <li>
                        <a href="#!" class="text-white">Terminos y condiciones</a>
                    </li>

                </ul>
            </div>-->
            <!--Grid column-->
            <!--Grid column-->
            <div class="col-lg-3 col-md-3 mb-4 mb-md-0 d-flex flex-column align-items-end">
                <h5 class="text-uppercase f-400 mb-3">Síguenos</h5>
                <ul class="nav ">
                    <li class="nav-item">
                        <a href="https://www.facebook.com/icazamex/" class="nav-link text-white" target="_blank">
                            <i class="fab fa-facebook-f fa-lg"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="https://instagram.com/icazamex?igshid=j2x7uj1u36ds" class="nav-link text-white" target="_blank">
                            <i class="fab fa-instagram fa-lg"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.youtube.com/channel/UC7woaP1ygT1rHgfIXp4YixA" class="nav-link text-white">
                            <i class="fab fa-youtube fa-lg"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3 d-flex justify-content-between" style="background-color: rgba(0, 0, 0, 0.2)">
        <div>
            © 2021 Copyright: Icazamex
        </div>
        <div>
            <small><a href="{{route('web.aviso')}}" class="text-white">Aviso de Privacidad</a></small>
            <small><a href="{{route('web.terminos')}}" class="text-white">Términos y Condiciones</a></small>
        </div>
    </div>
    <!-- Copyright -->
</footer>
