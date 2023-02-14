@extends('layouts/basic')
@section('title', 'Woning Details')
@section('body')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Woning details</h3>
                <p>{{$altumDetails['Output']['PriceEstimation']}}</p>
                <p>----</p>
                <p>{{$jumbaDetails['Parameters']['Price']}}</p>
                <p>{{$jumbaDetails['Payload']['Province']}}</p>
                <p>{{$jumbaDetails['Payload']['County']}}</p>
                <p>{{$jumbaDetails['Payload']['Built']}}</p>
                <p>{{$jumbaDetails['Payload']['Size']}}</p>               
                <p>{{$jumbaDetails['Payload']['Forsale']}}</p>
                <p> Jumba value van {{$jumbaDetails['Payload']['JumbaValue'][0]}} </p>
                <p> Jumba value tot {{$jumbaDetails['Payload']['JumbaValue'][1]}} </p>                
                @for ($i = 0; $i < count($jumbaDetails['Payload']['Images']); $i++)
                  <img src="{{$jumbaDetails['Payload']['Images'][$i]}}">                    
                @endfor
            </div>
        </div>
    </div>

@endsection
