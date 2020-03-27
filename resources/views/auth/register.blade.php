@extends('layouts.app')

@section('content')
<!-- Section Register Start -->
<section class="bg-trans">
		<div class="container">

			<div class="row justify-content-center">
				
				<div class="col-lg-8">
					<div class="login-register">
						<h3>Register</h3>
						<form method="POST" action="{{ route('register') }}">
                        @csrf
							<div class="form-row">
								<div class="form-group col-md-6">
                                    <input id="firstname" placeholder="First Name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
								</div>
								<div class="form-group col-lg-6">
                                    <input id="lastname" placeholder="Last Name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
                                    <input id="name" placeholder="UserName" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
								</div>
								<div class="form-group col-lg-6">
                                    <input id="email" placeholder="Email Address" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
                                    <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
								</div>
								<div class="form-group col-lg-6">
                                    <input id="password-confirm" placeholder="Confirm password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
								</div>
							</div>
							<div class="form-group btn-group account-type-btn">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn my-btn gym_option active"  id="btn_individual">
                                        <input type="radio" name="role_id" id="option1" value="3" autocomplete="off" checked> Individual
                                    </label>
                                    <label class="btn my-btn gym_option gym_ownner"  id="btn_gym_owner">
                                        <input type="radio" name="role_id" id="option2" value="2" autocomplete="off"> Gym Owner
                                    </label>
                                </div>
							</div>
							<fieldset id="gym_owner_account">
								<div class="form-group">
                                    <input id="gym_name" placeholder="Gym name" type="text" class="form-control @error('gym_name') is-invalid @enderror" name="gym_name" required autocomplete="gym_name">

                                    @error('gym_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
								</div>
								<div class="form-group">
                                    <input id="gym_address_1" placeholder="Gym Address" type="text" class="form-control @error('gym_address_1') is-invalid @enderror" name="gym_address_1" required autocomplete="gym_address_1">

                                    @error('gym_address_1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
								</div>
								<div class="form-group">
                                    <input id="gym_address_2" placeholder="Gym Address" type="text" class="form-control @error('gym_address_2') is-invalid @enderror" name="gym_address_2" required autocomplete="gym_address_2">

                                    @error('gym_address_2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
								</div>
								<div class="form-row">
									<div class="form-group col-md-6">
                                        <input id="city" placeholder="City" type="text" class="form-control @error('city') is-invalid @enderror" name="city" required autocomplete="city">

                                        @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
									</div>
									<div class="form-group col-md-6">
                                        <input id="state_province" placeholder="State / Province" type="text" class="form-control @error('state_province') is-invalid @enderror" name="state_province" required autocomplete="state">

                                        @error('state_province')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-6">
                                        <input id="country" placeholder="Country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" required autocomplete="country">

                                        @error('country')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
									</div>
									<div class="form-group col-md-6">
                                        <input id="zip_code" placeholder="ZIP code" type="text" class="form-control @error('zip_code') is-invalid @enderror" name="zip_code" required autocomplete="zip code">

                                        @error('zip_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
									</div>
								</div>
								<div class="form-group">
                                    <input id="website" placeholder="Website eg: www.gymname.com" type="text" class="form-control @error('website') is-invalid @enderror" name="website" required autocomplete="website">

                                    @error('website')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
								</div>
							</fieldset>
							<div class="form-group">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="customCheck1" required>
									<label class="custom-control-label" for="customCheck1">Sponsors help pay our server costs. I agree to receive a monthly email from our sponsors to use this site for free. if I unsubscribe, then my account will be suspended.</label>
								</div>
							</div>
                            <button type="submit" class="btn my-btn btn-block">
                                    {{ __('Register') }}
                                </button>
						</form>
						<div class="login-register-bottom">
							<hr>
							<p>Already have an account? <a href="{{ route('login') }}">Log in</a></p>
						</div>
					</div>
				</div>

			</div><!-- //.row -->

		</div><!-- //.container -->
	</section><!-- //Section Register End -->

<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row justify-content-md-center">

                            <div class="col-md-5">
                            <input id="firstname" placeholder="First Name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-5">
                                <input id="lastname" placeholder="Last Name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-center">

                            <div class="col-md-10 justify-content-md-center">
                                <input id="name" placeholder="UserName" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-md-center">
                            <div class="col-md-10">
                                <input id="email" placeholder="Email Address" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-md-center">
                            <div class="col-md-10 justify-content-md-center">
                                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-md-center">
                            <div class="col-md-10">
                                <input id="password-confirm" placeholder="Confirm password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-center">
                            <div class="col-md-10">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn btn-outline-secondary gym_option active">
                                        <input type="radio" name="role_id" id="option1" value="1" autocomplete="off" checked> Individual
                                    </label>
                                    <label class="btn btn btn-outline-secondary gym_option gym_ownner">
                                        <input type="radio" name="role_id" id="option2" value="2" autocomplete="off"> Gym Owner
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="gym-user-fields">
                        <div class="form-group row justify-content-md-center">
                            <div class="col-md-10">
                                <input id="gym_name" placeholder="GYM name" type="text" class="form-control @error('gym_name') is-invalid @enderror" name="gym_name" required autocomplete="gym_name">

                                @error('gym_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-center">
                            <div class="col-md-10">
                                <input id="gym_address_1" placeholder="GYM Address" type="text" class="form-control @error('gym_address_1') is-invalid @enderror" name="gym_address_1" required autocomplete="gym_address_1">

                                @error('gym_address_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-center">
                            <div class="col-md-10">
                                <input id="gym_address_2" placeholder="GYM Address" type="text" class="form-control @error('gym_address_2') is-invalid @enderror" name="gym_address_2" required autocomplete="gym_address_2">

                                @error('gym_address_2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-center">
                            <div class="col-md-5">
                                <input id="city" placeholder="City" type="text" class="form-control @error('city') is-invalid @enderror" name="city" required autocomplete="city">

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-5">
                                <input id="state_province" placeholder="State / Province" type="text" class="form-control @error('state_province') is-invalid @enderror" name="state_province" required autocomplete="state">

                                @error('state_province')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-center">
                            <div class="col-md-7">
                                <input id="country" placeholder="Country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" required autocomplete="country">

                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                            <input id="zip_code" placeholder="ZIP code" type="text" class="form-control @error('zip_code') is-invalid @enderror" name="zip_code" required autocomplete="zip code">

                            @error('zip_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-center">
                            <div class="col-md-10">
                                <input id="website" placeholder="Website eg: www.gymname.com" type="text" class="form-control @error('website') is-invalid @enderror" name="website" required autocomplete="website">

                                @error('website')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        </div>
                        <div class="form-group row justify-content-md-center">
                            <div class="col-sm-10">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="confirm_subscrib" id="defaultUnchecked" required>
                                    <label class="custom-control-label" for="defaultUnchecked" >Sponsors help pay our server costs. I agree to receive a monthly email from our sponsors to use this site for free. if I unsubscibe, then my account will be suspended.</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-1">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
<script>
// jQuery(document).ready(function($){
//     var gym = false;
//     var gym_content = $('.gym-user-fields').html();
//     $('.gym-user-fields').html('');
//     $('.gym_option').click(function(){
//         if($('.gym_ownner').hasClass('active')){
//             $('.gym-user-fields').html(gym_content);
//         }else{
//             $('.gym-user-fields').html('');
//         }
//     });
// })
</script>
@endsection
