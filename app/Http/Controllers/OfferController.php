<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\User;

class OfferController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index','show','comments');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::all();
        return view('offer.index')->with('offers', $offers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('offer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['required'],
            'localization' => ['required', 'max:50'],
            'images'=>['required']
        
        ]);

        $offer = new Offer;
        $offer->name = $request->input('name');
        $offer->user_id = auth()->user()->id;
        $offer->description = $request->input('description');
        $offer->localization = $request->input('localization');
        $offer->images = $request->input('images');
        $image = $request->file('images');
            foreach($request->file('images') as $image){
            $name=$image->getClientOriginalName();
            $imagePath = public_path('uploadImages/');
            $image->move($imagePath,$name); 

            $offer->images = $offer->images ." ". '/uploadImages/'.$name;}
        $coverImage=$request->file('coverImage');
        $coverName=time().'.'.$coverImage->getClientOriginalExtension();
        $coverPath = public_path('/uploadImages');
        $coverImage->move($coverPath,$coverName); 

        $offer->coverImage ='/uploadImages/'.$coverName;
        
        

        $offer->save();
        return redirect('/offers/'.$offer->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   $offer = Offer::find($id);
        if($offer==null){
            return view('errors.idNullError');
        }
        else{
        $user = User::where('id', '=', $offer['user_id'])->get();
        $comments = $offer -> comments();
        return view('offer.detail')->with('offer', $offer)-> with('user', $user) -> with ('comments', $comments);}
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offer = Offer::find($id);
        if($offer->user_id == auth()->user()->id){
            return view('offer.edit')->with('offer', $offer);
        }
        else{
            return view('errors.permissionError');
        }
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
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['required']
        ]);
        $offer = Offer::find($id);
        if($offer->user_id == auth()->user()->id){
        $offer->update($request->all());
        return redirect('/offers/'.$offer->id);
        }
        else{
            return view('errors.permissionError');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offer = Offer::find($id);
        if($offer->user_id == auth()->user()->id){
        $offer->delete();
        return redirect('/');
        }
        else{
            return view('errors.permissionError');
            }
    }
    public function comments($id){
        $offer = Offer::find($id);
        $comments = Offer::find($id)->comments;
        return view ("comment.list")->with('comments', $comments)->with('offer', $offer);
    }
}
