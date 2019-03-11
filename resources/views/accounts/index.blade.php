@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Dashboard</h1>
            <hr>
            @if(isset($data) && count($data) > 0)
                <table class="table table-striped">
                    <tr class="col-md-12">
                        <th>Netflix</th>
                        <th>Spotify</th>
                        <th>Expiration</th>
                        <th></th>
                        <th></th>
                    @foreach ($data as $data)
                        </tr>
                        <td>{{$data['netflix_email']}}</td>   
                        <td>{{$data['spotify_email']}}</td>   
                        <td>{{$data['netflix_expiry']}}</td>   
                        <td>
                            <a class="btn btn-primary btn-sm" href="/accounts/{{$data['id']}}/edit">Edit</a>
                        </td>   
                        <td>
                            
                        </td>   
                    </tr>
                    @endforeach                    
            @endif
    </div>
@endsection