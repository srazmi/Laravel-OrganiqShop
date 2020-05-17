@extends('layouts.organiq.mastermain')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mb-4">
                <div class="heading_s2"><h3>{{ __('ورود') }}</h3></div>

                
                    <form class="login_form" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('ایمیل') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('رمز عبور') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-default">
                                    {{ __('ورود') }}
                                </button>
                            </div>
                            <div class="form-group row login_footer">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label" for="remember">
                                            {{ __('مرا به خاطر بیاور') }}
                                        </label>
                                    </div>
                                </div>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link " href="{{ route('password.request') }}">
                                        {{ __('رمز عبور خود را فراموش کرده اید؟') }}
                                    </a>
                                @endif
                                
                            
                            </div>
                        </div>
                        <div class="nav-item">
                            
                            <a class="nav-link" href="{{ route('register') }}"><span>   کاربر جدید هستید؟ </span>{{ __('ثبت نام کنید') }}</a>
                        </div>
                        
                    
                    </form>
                    
                    
              
        </div>
    </div>
</div>

@include('layouts.organiq.partials.newslatter')
@endsection
