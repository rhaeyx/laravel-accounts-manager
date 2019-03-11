<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Account;
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
        $data = Auth::user()->accounts;

        $title = 'Dashboard';
        return view('accounts.index')->with(compact('title', 'data'));
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
            'netflix_subscriber' => 'required',
            'spotify_email' => 'required',
            'spotify_password' => 'required',
            'spotify_subscriber' => 'required',
            'card_number' => 'required',
            'card_cvv' => 'required',
            'card_expiry' => 'required'
        ]);

        $expiry = date('d/m/Y', strtotime('+1 month'));
        
        $account = new Account;
        $account->user_id = Auth::user()->id;

        # Card Data
        $account->card_number = $request['card_number'];
        $account->card_cvv = $request['card_cvv'];
        $account->card_expiry = $request['card_expiry'];

        # Netflix Data
        $account->netflix_email = $request['netflix_email'];
        $account->netflix_password = $request['netflix_password'];
        $account->netflix_subscriber = $request['netflix_subscriber'];
        $account->netflix_expiry = $expiry;
        
        # Spotify Data
        $account->spotify_email = $request['spotify_email'];
        $account->spotify_password = $request['spotify_password'];
        $account->spotify_subscriber = $request['spotify_subscriber'];
        $account->spotify_expiry = $expiry;
        
        $account->save();

        return redirect('/accounts')->with('success', 'Account created.');
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
        $data = Account::find($id);

        if(Auth::user()->id !== $data->user_id) {
            return redirect('/login')->with('error', 'Unauthorized.');
        }

        $title = 'Edit';
        return view('accounts.edit')->with(compact('title', 'data'));
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
        $request->validate([
            'netflix_email' => 'required',
            'netflix_password' => 'required',
            'netflix_subscriber' => 'required',
            'spotify_email' => 'required',
            'spotify_password' => 'required',
            'spotify_subscriber' => 'required',
            'card_number' => 'required',
            'card_cvv' => 'required',
            'card_expiry' => 'required'
        ]);
    
        
        
        $account = Account::find($id);
        
        # Check if the updater is the owner of the account
        if(Auth::user()->id !== $account->user_id) {
            return redirect('/accounts')->with('error', 'That account does not belong to you');
        }
        
        # Card Data
        $account->card_number = $request['card_number'];
        $account->card_cvv = $request['card_cvv'];
        $account->card_expiry = $request['card_expiry'];

        # Netflix Data
        $account->netflix_email = $request['netflix_email'];
        $account->netflix_password = $request['netflix_password'];
        $account->netflix_subscriber = $request['netflix_subscriber'];
        
        # Spotify Data
        $account->spotify_email = $request['spotify_email'];
        $account->spotify_password = $request['spotify_password'];
        $account->spotify_subscriber = $request['spotify_subscriber'];
        
        $account->save();
    
        return redirect('/accounts')->with('success', 'Account updated.');
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
