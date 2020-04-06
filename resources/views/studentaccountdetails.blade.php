@extends('layouts.app')

@section('content')
<section class="bg-trans">
    <div class="container">
        
        <div class="row">
            
            <div class="col-md-12">
                <div class="gym-name-stats mb-3">
                    <nav class="nav nav-pills">
                        <a class="nav-link rounded-0 border border-primary"  href="{{ route('student_account') }}" aria-selected="true">Subscriptions</a>
                        <a class="nav-link rounded-0 border border-primary active"  href="#account_details">Account Details</a>
                        <a class="nav-link rounded-0 border border-primary" href="#">Favorite Videos</a>
                    </nav>
                </div>
                <div class="account_details" id="account_details">
                    <div class="row">
                        <div class="col-md-12">
                            <p><a href="{{ route('student_account') }}">My Account</a> <i class="fas fa-angle-right"></i> Account Details</p>
                            <div class="account-details">
                                <h2 class="page-sub-title">My Account Details</h2>
                                <p>Need to make changes to your account?</p>
                                <form action="{{ route('auth_update', ['id'=>$user->id]) }}" method="POST">
                                    {{ method_field('PUT') }}
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" value="{{ $user -> first_name }}" name="first_name" placeholder="First Name" required>
                                            @error('first_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" value="{{ $user -> last_name }}" name="last_name" placeholder="Last Name" required>
                                            @error('last_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                                <input id="username" placeholder="Username" value="{{ $user -> username }}" type="text" disabled class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                                @error('username')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user -> email }}"  name="email" placeholder="Email Address" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" autocomplete="old-password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" autocomplete="old-password">
                                        </div>
                                        @if(session()->has('success'))
                                            <div class="alert alert-success">
                                                {{ session()->get('success') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" checked class="custom-control-input" id="customCheck1" required>
                                            <label class="custom-control-label" for="customCheck1">Sponsors help pay our server costs. I agree to receive a monthly email from our sponsors to use this site for free. if I unsubscribe, then my account will be suspended.</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn my-btn btn-block">Update</button>
                                </form>                
                            </div>
                        </div>
                    </div><!-- //.row -->
                </div>               
            </div>

        </div><!-- //.row -->

    </div><!-- //.container -->
</section>
<script>
		jQuery(document).ready(function(){
			$('.calcel-request').click(function(e){
				
				var r = confirm("Are you sure cancel this?");
				if(r == true){
					return;
				}else{
					e.preventDefault();
				}
            });
            var table = $('.dtBasicExample').DataTable({
                "bJQueryUI": true,
                "sPaginationType": "full_numbers",
                "bPaginate": true,
                "bFilter": true,
                "bSort": true,
                "aaSorting": [
                [1, "asc"]
                ],
                "aoColumnDefs": [{
                "bSortable": true,
                "aTargets": [0]
                }, {
                "bSortable": true,
                "aTargets": [1]
                }, {
                "bSortable": true,
                "aTargets": [2]
                }, {
                "bSortable": true,
                "aTargets": [3]
                }, {
                "bSortable": false,
                "aTargets": [4]
                }],
            });
		});
	</script>
@endsection