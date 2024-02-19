@extends('layouts.auth')

@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
<div class="col-lg-6 d-none d-lg-block">
    <img src="uno.png" alt="frrfgssf" style="width: 500px;height:300px">
</div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">{{ __('Register') }}</h1>
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
                                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
                                    
                                </head>
                                <body>


                                    <form method="POST" action="{{ route('register') }}" class="user">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="name" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>
                                        </div>
    
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="last_name" placeholder="{{ __('Last Name') }}" value="{{ old('last_name') }}" required>
                                        </div>
    
                                        <div class="form-group">   
                                            <input type="email" class="form-control form-control-user" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required>
                                        </div>
    
                                        <div class="container mt-4">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="password" class="form-control form-control-user" name="password" id="password1" placeholder="Password" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text eye-icon">
                                                            <i class="far fa-eye-slash" id="togglePassword1"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="password" class="form-control form-control-user" name="password" id="password2" placeholder=" ComfirmPassword" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text eye-icon">
                                                            <i class="far fa-eye-slash" id="togglePassword2"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </form>
                                   
    
                                    <hr>
    
                                    <div class="text-center">
                                        <a class="small" href="{{ route('login') }}">
                                            {{ __('Already have an account? Login!') }}
                                        </a>
                                    </div>
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
            $('.eye-icon').click(function() {
                var $passwordInput = $(this).closest('.input-group').find('input');
                if ($passwordInput.attr('type') === 'password') {
                    $passwordInput.attr('type', 'text');
                    $(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye');
                } else {
                    $passwordInput.attr('type', 'password');
                    $(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash');
                }
            });
        });
    </script>
                                   
</body>
</html>
                                