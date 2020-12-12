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
        #testing model, it will be list view later
        $offer = new Offer;
        $offer->name = 'Tom';
        $offer->user_id = auth()->user()->id;
        $offer->description = 'fajnie';
        $offer->save();
        $offers = Offer::all();
        return $offers;
    }
    public function create(){
        return view('offer.create');
    }

    public function store(Request $request){
        $offer = new Offer;
        $offer->name = $request->input('name');
        $offer->user_id = auth()->user()->id;
        $offer->description = $request->input('description');
        $offer->save();
        $offers = Offer::all();
        return $offers;
    }
    public function edit(){

    }
    public function delete(){

    }
}