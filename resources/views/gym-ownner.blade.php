@extends('layouts.app')

@section('content')
<section class="bg-trans">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">GYM Ownner</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Register
                </div>
            </div>
        </div>
    </div>
</div>
</section>

@endsection