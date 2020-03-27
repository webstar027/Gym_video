@extends('layouts.app')

@section('content')
<section class="bg-trans">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <h1>Hello {{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}</h1>

            </div>
        </div>
    </div>
</section>
@endsection