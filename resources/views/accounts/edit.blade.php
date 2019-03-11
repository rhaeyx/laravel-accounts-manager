@extends('layouts.app')

@section('content')
    <h1>Edit Account</h1>
    <hr>
    <form action="{{action('AccountsController@update', $data->id)}}" method="POST">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <h4>Netflix</h4>
                <div class="form-group">
                    <label>Netflix Email</label>
                    <input class="form-control" type="text" name="netflix_email" placeholder="netflix@email.com" value="{{$data['netflix_email']}}">
                </div>
                <div class="form-group">
                    <label>Netflix Password</label>
                    <input class="form-control" type="text" name="netflix_password" placeholder="password" value="{{$data['netflix_password']}}">
                </div>
                <div class="form-group">
                    <label>Netflix Subscribers</label>
                    <input class="form-control" type="text" name="netflix_subscriber" placeholder="name, name, name" value="{{$data['netflix_subscriber']}}">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <h4>Spotify</h4>
                <div class="form-group">
                    <label>Spotify Email</label>
                    <input class="form-control" type="text" name="spotify_email" placeholder="spotify@email.com" value="{{$data['spotify_email']}}">
                </div>
                <div class="form-group">
                    <label>Spotify Password</label>
                    <input class="form-control" type="text" name="spotify_password" placeholder="password" value="{{$data['spotify_password']}}">
                </div>
                <div class="form-group">
                    <label>Spotify Subscriber</label>
                    <input class="form-control" type="text" name="spotify_subscriber" placeholder="name" value="{{$data['spotify_subscriber']}}">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <h4>Card</h4>
                <div class="form-group">
                    <label>Card Number</label>
                    <input class="form-control" type="text" name="card_number" placeholder="123456789" value="{{$data['card_number']}}">
                </div>
                <div class="form-group">
                    <label>CVV</label>
                    <input class="form-control" type="text" name="card_cvv" placeholder="123" value="{{$data['card_cvv']}}">
                </div>
                <div class="form-group">
                    <label>Expiration</label>
                    <input class="form-control" type="text" name="card_expiry" placeholder="01/19" value="{{$data['card_expiry']}}">
                </div>
            </div>
        </div>  
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <hr>
        <input class="btn btn-primary btn-lg float-right" type="submit">
    </form>
@endsection