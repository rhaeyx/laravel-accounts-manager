<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Card;
use App\Netflix;
use App\Spotify;
use App\User;

class AccountsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $netflix = Auth::user()->netflix;
        $spotify = Auth::user()->spotify;

        $title = 'Dashboard';
        return view('accounts.index')->with(compact('title', 'netflix', 'spotify'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create';
        return view('accounts.create')->with(compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'netflix_email' => 'required',
            'netflix_password' => 'required',
            'netflix_subscribers' => 'required',
            'spotify_email' => 'required',
            'spotify_password' => 'required',
            'spotify_subscribers' => 'required',
            'card_number' => 'required',
            'card_cvv' => 'required',
            'card_expiration' => 'required'
        ]);

        $user_id = Auth::user()->id;
        $cancel_date = date('d/m/Y', strtotime('+1 month'));
        
        $card = new Card;
        $card->card_number = $request['card_number'];
        $card->cvv = $request['card_cvv'];
        $card->expiration = $request['card_expiration'];
        $card->user_id = $user_id;

        # Save card data to get card_id
        $card->save();
        $card_id = $card->id;

        $netflix = new Netflix;
        $netflix->email = $request['netflix_email'];
        $netflix->password = $request['netflix_password'];
        $netflix->subscribers = $request['netflix_subscribers'];
        $netflix->cancel_date = $cancel_date;
        $netflix->card_id = $card_id;       
        $netflix->user_id = $user_id;
        
        $spotify = new Spotify;
        $spotify->email = $request['spotify_email'];
        $spotify->password = $request['spotify_password'];
        $spotify->subscribers = $request['spotify_subscribers'];
        $spotify->cancel_date = $cancel_date;
        $spotify->card_id = $card_id;
        $spotify->user_id = $user_id;
        
        # Save the data.
        $netflix->save();
        $spotify->save();

        return redirect('/accounts')->with('success', 'Accounts created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
