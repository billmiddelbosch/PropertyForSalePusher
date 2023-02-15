@extends('layouts/basic')
@section('title', 'Homepage')
@section('body')


<div class="container">
    <div class="row  p-5 ">
        <div class="col-md-6">
            @include('./components/searchformComponent')
        </div>
        <img src="./resources/views/assets/Jumba_logo_rgb-01.png" class="col-md-6">
    </div>
</div>

@endsection