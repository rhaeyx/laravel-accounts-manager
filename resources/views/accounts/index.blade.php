@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Dashboard</h1>
            <hr>
            @if(isset($netflix) && isset($spotify))
                <table class="table table-striped">
                    <tr class="col-md-12">
                        <th>Netflix</th>
                        <th>Spotify</th>
                        <th>Expiration</th>
                        <th></th>
                        <th></th>
                    @for($i = 0; $i < count($netflix); $i++)
                    </tr>
                        <td>{{$netflix[$i]['email']}}</td>   
                        <td>{{$spotify[$i]['email']}}</td>   
                        <td>{{$netflix[$i]['cancel_date']}}</td>   
                        <td></td>   
                        <td></td>   
                    </tr>
                    @endfor
            @endif
    </div>
@endsection