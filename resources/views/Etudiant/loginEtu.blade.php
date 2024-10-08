<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

@extends('layouts.app')

@section('content')

<div class="container">
    
    <div class="row justify-content-center">

        <div class="col-md-8">
        <h1>Espace Employé</h1>

            <div class="card">

               

                <div class="card-body">
                    <form method="POST" action="{{url('loginEtu')}}" enctype='multipart/form-data'>
                        @csrf
                        @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
             <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Code Employe') }}</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="CodeEmploye" value="{{ old('CodeEmploye') }}"  autofocus>

                              
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control " name="password" required autocomplete="current-password">

                            
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" name="login">
                                    Login
                                </button>

                                <!-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif -->
                            </div>
                        </div>
                      


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
</body>
</html>

