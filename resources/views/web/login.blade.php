@extends('layouts.web')

@section('content')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
@endpush

<header id="header-desarrollos">
    <div class="container">
        <div class="row align-items-center justify-content-center altura-150">
            <div class="col-10 col-md-6">
                <div class="login-wrap mt-5">
                    <div class="login-html">
                        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
                        <input id="tab-2" type="radio" name="tab" class="for-pwd"><label for="tab-2" class="tab white-text">Recuperar contraseña</label>
                        <div class="login-form mt-4">
                            <div class="sign-in-htm">
                                <div class="group">
                                    <label for="user" class="label white-text">Correo electrónico</label>
                                    <input id="user" type="text" class="input">
                                </div>
                                <div class="group">
                                    <label for="pass" class="label white-text">Password</label>
                                    <input id="pass" type="password" class="input" data-type="password">
                                </div>
                                <div class="group">
                                    <input type="submit" class="button" value="Ingresar">
                                </div>
                                <div class="hr"></div>
                                <div class="group">
                                    <h6 class="white-text text-center">¿Aún no tienes cuenta? Registrate haciendo <a href="" class="color-verde"><span class="f-400">Clic aquí</span></a></h6>
                                </div>
                            </div>
                            <div class="for-pwd-htm">
                                <div class="group">
                                    <label for="user" class="label white-text">Correo electrónico</label>
                                    <input id="user" type="text" class="input">
                                </div>
                                <div class="group">
                                    <input type="submit" class="button" value="Reset Password">
                                </div>
                                <div class="hr"></div>
                                <div class="group">
                                    <h6 class="white-text">¿Aún no tienes cuenta? Registrate haciendo <a href="" class="link color-verde"><span class="f-400">Vlic aquí</span></a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>

@endsection