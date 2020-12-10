<?php

namespace App\Http\Controllers;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index(){
        $offer = new Offer;
        $offer->name = 'Tom';
        $offer->save();
        $offers = Offer::all();
        return $offers;
    }
}
