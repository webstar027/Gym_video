@extends('layouts.app')

@section('content')
	<section class="bg-trans">
		<div class="container">

			<div class="row">
				
				<div class="col-lg-12">
					<div class="about-us">
						<h2 class="title-default">Forgot Your Password?</h2>
						<p class="title-helper">Reset it here</p>
					</div>
				</div>

			</div><!-- //.row -->
            
            <div class="row justify-content-center">
				
				<div class="col-lg-5">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
					<div class="about-us">
						<form method="POST" action="{{ route('password.email') }}">
                        @csrf
                            <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror text-center"  placeholder="Email Address or Username" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn my-btn btn-block">Reset My Password</button>
                        </form>
					</div>
				</div>

			</div><!-- //.row -->

		</div><!-- //.container -->
	</section>
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
