@extends('layouts.app')

@section('content')
<section class="bg-trans">
    <div class="container">

        <div class="row justify-content-center">
            
            <div class="col-lg-5">
                <div class="login-register">
                    <h3>Log In</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <input id="text" type="text" class="form-control {{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email Address or Username"  name="login" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message ?? ''}}</strong>
                                </span>
                            @enderror
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message ?? ''}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn my-btn btn-block">Log In</button>
                    </form>
                    <div class="login-register-bottom">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                        <hr>
                        <p>Don’t have an account yet? <a href="{{ route('register') }}">{{ __('Register') }}</a></p>
                    </div>
                </div>
            </div>

        </div><!-- //.row -->

    </div><!-- //.container -->
</section><!-- //Section Log In End -->
@endsection
