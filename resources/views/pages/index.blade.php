@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Moneh! Moneh! Moneh!</h1>
        <p>This is a site for quick and easy managing of accounts.</p>
        @guest
            <a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> 
            <a class="btn btn-success btn-lg" href="/register" role="button">Register</a></p>
        @else
            <a class="btn btn-danger btn-lg" href="/accounts/netflix" role="button">Netflix</a> 
            <a class="btn btn-success btn-lg" href="/accounts/spotify" role="button">Spotify</a> 
            <a class="btn btn-warning btn-lg" href="/accounts/cards" role="button">Cards</a> 
        @endguest   
    </div>
@endsection