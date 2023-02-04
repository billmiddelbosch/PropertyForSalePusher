@extends('layouts/basic')
@section('title', 'Woning Details')
@section('body')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Woning details</h3>
                <p>{{$woningdetails['Parameters']['Price']}}</p>
                <p>{{$woningdetails['Payload']['Province']}}</p>
                <p>{{$woningdetails['Payload']['County']}}</p>
                <p>{{$woningdetails['Payload']['Built']}}</p>
                <p>{{$woningdetails['Payload']['Size']}}</p>               
                <p>{{$woningdetails['Payload']['Forsale']}}</p>
            </div>
        </div>
    </div>

@endsection
