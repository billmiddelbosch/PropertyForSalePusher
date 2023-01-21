@extends('layouts/basic')
@section('title', 'Woning View')
@section('body')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Woning View body</h3>
                @foreach ($woningen as $woning)
                    <p>{{$woning->straat}}</p>
                @endforeach
            </div>
        </div>
    </div>

@endsection
