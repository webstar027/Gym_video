@extends('layouts.app')

@section('content')
<section class="bg-trans">
    <div class="container">

        <div class="row justify-content-center">
            
            <div class="col-lg-5">
                <div class="login-register">
                    <h3>{{ __('Reset Password') }}</h3>
                    <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                        <div class="form-group">
                            <input id="email" placeholder="Email Address" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"
                                autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password" placeholder="Password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <button type="submit" class="btn my-btn btn-block">{{ __('Reset Password') }}</button>
                    </form>
                </div>
            </div>

        </div><!-- //.row -->

    </div><!-- //.container -->
</section>
<!-- <section class="bg-trans">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3 class="text-center">{{ __('Reset Password') }}</h3>
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group row justify-content-center">
                        <div class="col-md-6">
                            <input id="email" placeholder="Email Address" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"
                                autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">

                        <div class="col-md-6">
                            <input id="password" placeholder="Password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section> -->
@endsection
