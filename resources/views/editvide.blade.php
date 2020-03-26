@extends('layouts.app')

@section('content')
<section class="bg-trans">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                <div class="card-header">Edit Video</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    add new
                </div>
        </div>
    </div>
</div>
</section>
@endsection