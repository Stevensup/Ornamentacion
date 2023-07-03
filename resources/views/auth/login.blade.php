@extends('layouts.app')
@extends('includes.header')

@section('content')
    <style>
        .gif-container {
            position: relative;
            z-index: 1;
            background-color: #c1dbea;
            padding: 20px;
            margin: 0 20px;
            border-radius: 10px;
        }

        .gif {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: auto;
        }

        .button-container {
            display: flex;
            align-items: center;
        }

        .login-button {
            margin-right: 10px;
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background-color: #1d1792; color: #fff;">
                        {{ __('Iniciar Sesion') }}
                    </div>
                    <div class="card-body">
                        <div class="gif-container">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Correo Electronico') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus
                                            style="background-color: #ddd; color: #333;">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert" style="color: #f67267;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password"
                                            style="background-color: #ddd; color: #333;">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert" style="color: #f67267;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember"
                                                style="color: #333;">{{ __('Recuerdame') }}</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4 button-container">
                                        <button type="submit" class="btn btn-primary login-button"
                                            style="background-color: #f67267; border-color: #f67267;">
                                            {{ __('Iniciar Sesion') }}
                                        </button>
                                        <a href="{{ route('register') }}" class="btn btn-primary login-button"
                                            style="background-color: #f67267; border-color: #f67267;">
                                            {{ __('Registrarse') }}
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="gif-container">
        <center>
            <div class="gif">
                <img src="{{ asset('images/prin/login.gif') }}" alt="Login GIF">
            </div>
        </center>
    </div>
@endsection

@extends('includes.footer')
@extends('includes.redes')
