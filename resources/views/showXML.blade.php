@extends('layouts/basic')
@section('title', 'XML viewer')
@section('body')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Update table gelukt. Hieronder de meest recente 10 woningen</h3>
                <div class="row">
                    <div class="column">
                        <div class="col-md-4">
                            <table class="table table-striped">
                                <thead>
                                    <th>Locatie url</th>
                                    <th>Updated</th>
                                </thead>
                                @for ($i = 0; $i < 100; $i++)
                                <tbody>
                                    <td> {{$woningen[$i]['loc']}}</td>
                                    <td> {{$woningen[$i]['lastmod']}}</td>
                                </tbody>
                                @endfor
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection