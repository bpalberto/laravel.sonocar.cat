<?php

namespace App\Http\Controllers;

use App\subscriber;

class SubscriptionAuthController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
        $this->middleware('auth');
    }
    
    public function subscribers() {
        $subscribers = subscriber::all();
        
        if ( $subscribers->isNotEmpty() ) {
            return view('subscribers', [ 'subscribers' => $subscribers ]);
        } 
        
        return view('subscribers', [ 'subscribers' => null ]);
    }
    
    
}
