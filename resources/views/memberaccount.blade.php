@extends('layouts.app')

@section('content')
<section class="bg-trans">
    <div class="container">
        
        <div class="row">
            
            <div class="col-md-12">
                <div class="subscriptions">
                    <h2 class="page-sub-title">My Subscriptions</h2>
                    <a href="" class="btn my-btn mb-4">Add Gym</a>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Gym Name</th>
                                    <th scope="col">Gym Owner</th>
                                    <th scope="col">Videos</th>
                                    <th scope="col">Latest Entry</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">Rima</td>
                                    <td>Hasan</td>
                                    <td>7</td>
                                    <td>March 26, 2020 12:22pm</td>
                                    <td><a href="#" class="text-danger"><i class="fas fa-trash"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div><!-- //.row -->

    </div><!-- //.container -->
</section>
<section class="bg-white">
    <div class="container">
        
        <div class="row">
            
            <div class="col-md-12">
                <div class="account-details">
                    <h2 class="page-sub-title">My Account Details</h2>
                    <p>Need to make changes to your account?</p>
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="First Name">
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control" placeholder="Email Address">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="password" class="form-control" placeholder="Confirm Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Sponsors help pay our server costs. I agree to receive a monthly email from our sponsors to use this site for free. if I unsubscribe, then my account will be suspended.</label>
                            </div>
                        </div>
                        <button type="submit" class="btn my-btn btn-block">Update</button>
                    </form>                
                </div>
            </div>

        </div><!-- //.row -->

    </div><!-- //.container -->
</section>
@endsection