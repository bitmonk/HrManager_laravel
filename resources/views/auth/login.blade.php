@extends('layouts.auth')

@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">{{ __('Login') }}</h1>
                                </div>

                                @if ($errors->any())
                                    <div class="alert alert-danger border-left-danger" role="alert">
                                        <ul class="pl-4 my-2">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <!DOCTYPE html>
                                <html lang="en">
                                <head>
                                    <meta charset="UTF-8">
                                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                    <meta http-equiv="X-UA-Compatible" content="ie=edge">
                                    <title>Document</title>
                                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
                                </head>
                                <body>
                                    <form method="POST" action="{{ route('login') }}" class="user">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autofocus>
                                        </div>
    
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="password" class="form-control form-control-user" name="password" placeholder="{{ __('Password') }}" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="fa-regular fa-eye-slash"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        
    
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
                                            </div>
                                        </div>
    
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                {{ __('Login') }}
                                            </button>
                                        </div>
    
                                        <hr>
    
                                        <div class="form-group">
                                            <button type="button" class="btn btn-github btn-user btn-block">
                                                <i class="fab fa-github fa-fw"></i> {{ __('Login with GitHub') }}
                                            </button>
                                        </div>
    
                                        <div class="form-group">
                                            <button type="button" class="btn btn-twitter btn-user btn-block">
                                                <i class="fab fa-twitter fa-fw"></i> {{ __('Login with Twitter') }}
                                            </button>
                                        </div>
    
                                        <div class="form-group">
                                            <button type="button" class="btn btn-facebook btn-user btn-block">
                                                <i class="fab fa-facebook-f fa-fw"></i> {{ __('Login with Facebook') }}
                                            </button>
                                        </div>
                                    </form>
    
                                    <hr>
    
                                    @if (Route::has('password.request'))
                                        <div class="text-center">
                                            <a class="small" href="{{ route('password.request') }}">
                                                {{ __('Forgot Password?') }}
                                            </a>
                                        </div>
                                    @endif
    
                                    @if (Route::has('register'))
                                        <div class="text-center">
                                            <a class="small" href="{{ route('register') }}">{{ __('Create an Account!') }}</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.input-group-text').on('click', function() {
                var $passwordInput = $(this).closest('.input-group').find('input');
                var type = $passwordInput.attr('type');
                
                if (type === 'password') {
                    $passwordInput.attr('type', 'text');
                    $(this).html('<i class="far fa-eye"></i>');
                } else {
                    $passwordInput.attr('type', 'password');
                    $(this).html('<i class="far fa-eye-slash"></i>');
                }
            });
        });
    </script>
    
    
 </body>
 </html>

                                