@extends('layouts.app')

@section('content')
    <h1>Add accounts</h1>
    <hr>
    <form action="{{action('AccountsController@store')}}" method="POST">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <h4>Netflix</h4>
                <div class="form-group">
                    <label>Netflix Email</label>
                    <input class="form-control" type="text" name="netflix_email" placeholder="netflix@email.com">
                </div>
                <div class="form-group">
                    <label>Netflix Password</label>
                    <input class="form-control" type="text" name="netflix_password" placeholder="password">
                </div>
                <div class="form-group">
                    <label>Netflix Subscribers</label>
                    <input class="form-control" type="text" name="netflix_subscribers" placeholder="name, name, name">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <h4>Spotify</h4>
                <div class="form-group">
                    <label>Spotify Email</label>
                    <input class="form-control" type="text" name="spotify_email" placeholder="spotify@email.com">
                </div>
                <div class="form-group">
                    <label>Spotify Password</label>
                    <input class="form-control" type="text" name="spotify_password" placeholder="password">
                </div>
                <div class="form-group">
                    <label>Spotify Subscriber</label>
                    <input class="form-control" type="text" name="spotify_subscribers" placeholder="name">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <h4>Card</h4>
                <div class="form-group">
                    <label>Card Number</label>
                    <input class="form-control" type="text" name="card_number" placeholder="123456789">
                </div>
                <div class="form-group">
                    <label>CVV</label>
                    <input class="form-control" type="text" name="card_cvv" placeholder="123">
                </div>
                <div class="form-group">
                    <label>Expiration</label>
                    <input class="form-control" type="text" name="card_expiration" placeholder="01/19">
                </div>
            </div>
        </div>  
        {{ csrf_field() }}
        <hr>
        <input class="btn btn-primary btn-lg float-right" type="submit">
    </form>
@endsection