<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $offer = Offer::whereHas('user', function($innerQuery) {
            $innerQuery->where('user_id', 'LIKE', auth()->user()->id);
        })->get();

        return view('home')->with('offer', $offer);
    
    }
}


