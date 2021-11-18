@extends('layouts.web')

@section('content')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
@endpush

<header id="header-desarrollos" class="py-5">
    <div class="container py-5">
        <div class="row align-items-center justify-content-center altura-150">
            <div class="col-12 col-md-6">
                <div class="login-wrap mt-5" style="min-height: 700px">
                    <div class="login-html">
                        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Registro</label>
                        <input id="tab-2" type="radio" name="tab" class="for-pwd"><label for="tab-2" class="tab white-text d-none">Recuperar contraseña</label>
                        <div class="login-form mt-4">
                            <div class="sign-in-htm">
                               <div class="group">
                                    <label for="user" class="label white-text">Nombre completo</label>
                                    <input id="user" type="text" class="input">
                                </div>
                                <div class="group">
                                    <label for="mail" class="label white-text">Correo electrónico</label>
                                    <input id="mail" type="mail" class="input">
                                </div>
                                <div class="group">
                                    <label for="tel" class="label white-text">Teléfono</label>
                                    <input id="tel" type="tel" class="input">
                                </div>
                                <div class="group">
                                    <label for="pass" class="label white-text">Contraseña</label>
                                    <input id="pass" type="password" class="input" data-type="password">
                                </div>
                                <div class="group">
                                    <label for="pass2" class="label white-text">Repetir contraseña</label>
                                    <input id="pass2" type="password" class="input" data-type="password2">
                                </div>
                                <div class="group">
                                    <input type="submit" class="button" value="Registrar">
                                </div>
                                <div class="hr"></div>
                            </div>
<!--
                            <div class="for-pwd-htm">
                                <div class="group">
                                    <label for="user" class="label white-text">Correo electrónico</label>
                                    <input id="user" type="text" class="input">
                                </div>
                                <div class="group">
                                    <input type="submit" class="button" value="Reset Password">
                                </div>
                                <div class="hr"></div>
                            </div>
-->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>

@endsection