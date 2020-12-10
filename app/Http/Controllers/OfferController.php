<?php

namespace App\Http\Controllers;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $offer = new Offer;
        $offer->name = 'Tom';
        $offer->user_id = auth()->user()->id;
        $offer->save();
        $offers = Offer::all();
        return $offers;
    }
}
