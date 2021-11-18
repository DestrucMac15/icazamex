<div id="top-menu" class="fixed-top  scrolling-navbar">
   
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">

        <!-- Brand -->
        <a class="navbar-brand" href="/">
            <img src="assets/imagenes/logo-menu.png" class="logo-menu" alt="Icaza">
        </a>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuIcaza" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="menuIcaza">
            <!-- Left -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link btn border border-light rounded waves-effect" href="{{route('web.inmuebles',['inmueble'=>'desarrollos'])}}">Desarrollos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn border border-light rounded waves-effect" href="{{route('web.inmuebles',['inmueble'=>'propiedades'])}}">Propiedades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn border border-light rounded waves-effect" href="{{route('web.promociones')}}">Promociones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn border border-light rounded waves-effect" href="{{route('web.blog')}}">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn border border-light rounded waves-effect" href="{{route('web.contacto')}}">Contacto</a>
                </li>
            </ul>

            <!-- Right -->
            <ul class="navbar-nav nav-flex-icons d-flex align-items-center">
                <li class="nav-item">
                    <a href="https://www.facebook.com/icazamex/" class="nav-link" target="_blank">
                        <i class="fab fa-facebook-f fa-lg"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://instagram.com/icazamex?igshid=j2x7uj1u36ds" class="nav-link" target="_blank">
                        <i class="fab fa-instagram fa-lg"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://www.youtube.com/channel/UC7woaP1ygT1rHgfIXp4YixA" class="nav-link">
                        <i class="fab fa-youtube fa-lg"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://wa.me/+5215516920225" target="_blank" class="nav-link">
                        <i class="fab fa-whatsapp fa-lg text-white d-flex justify-content-center align-items-center" style="background: #25d366; width: 30px; height: 30px; border-radius: 50%;"></i>
                    </a>
                </li>
                <!--<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                        <a class="dropdown-item" href="{{ route('login') }}">Log in</a>
                        <!-- <a class="dropdown-item" href="#">Log out</a>
                    </div>
                </li>-->
            </ul>
        </div>

    </nav>
    <!-- Navbar -->

</div>
