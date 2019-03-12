@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12 col-md-offset-2">
            <h1>Netflix</h1>
            <hr>
            @if(isset($data) && count($data) > 0)
            <div class="panel panel-default">
                <table class="table table-striped table-dark col-md-12 col-lg-12">
                    <tr class="col-sm- col-md-12 col-lg-12">
                        <th>#</th>
                        <th>Netflix</th>
                        <th>Netflix Users</th>
                        <th>Expiration</th>
                        <th></th>
                        <th></th>
                    @php
                     $i = 1;
                    @endphp
                    @foreach ($data as $data)
                        </tr>
                        <td>
                            @php
                                echo $i;
                                $i++;                                
                            @endphp
                        </td>
                        <td>{{$data['netflix_email']}}</td>   
                        <td>{{$data['netflix_subscriber']}}</td>   
                        <td>{{$data['netflix_expiry']}}</td>   
                        <td>
                            <a class="btn btn-primary btn-sm" href="/accounts/{{$data['id']}}/edit">Edit</a>
                        </td>   
                        <td>
                        <form class="hidden" action="{{action('AccountsController@destroy', $data->id)}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            {{ csrf_field() }}
                            <input class="btn btn-danger btn-sm" type="submit" value="Delete">
                        </form>
                        </td>   
                    </tr>
                    @endforeach                    
                </table>
            </div>
            @else
                <h2>No data found.</h2>
            @endif
    </div>
@endsection