<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Offer;

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
        $offer->price = $request->input('price');
        $offer->images = $request->input('images');
        $image = $request->file('images');
        if($request->hasfile('images')){
            foreach($request->file('images') as $image){
            $name=$image->getClientOriginalName();
            $image->move(public_path().'/uploadImages/',$name);
            $offer->$image = '/uploadImages/'.$name;
            }
            
        }
        
        // if(isset($_POST['submit'])){
        //     foreach($_FILES['images']['name'] as $key=> $val){
        //         move_uploaded_file($_FILES['images']['tmp_name'][$key],"uploadImages/".$val);
        //         $offer->images = '/uploadImages/'.$val;
        //         //nie działa dodawanie kilku zdjęć na raz
        //     }
        // }
        // $countImages = count($_FILES['images']['name']);
        // for ($i=0; $i<$countImages; $i++){
        //     $imageName = $_FILES['images']['name'][$i];
        //     move_uploaded_file($_FILES['images']['tmp_name'][$i],'uploadImages/'.$imageName);
        // }
        // for ($i=0; $i<=length($image); $i++){
        //     $imageName = time().'.'.$image->getClientOriginalExtension();
        //     $imagePath = public_path('/uploadImages/');
        //     $image->move($imagePath, $imageName);
        
        // }
        

        $offer->save();
        return redirect('/'); ///!!!???!!!
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $offer = Offer::find($id);
        return view('offer.detail')->with('offer', $offer);
        
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
            return redirect('https://www.youtube.com/watch?v=73T5NVNb7lE');
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
        return redirect('/'.$offer->id);
        }
        else{
            return redirect('https://www.youtube.com/watch?v=73T5NVNb7lE');
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
            return redirect('https://www.youtube.com/watch?v=73T5NVNb7lE');
            }
    }
    public function comments($id){
        $comments = Offer::find($id)->comments;
        return view('comment.list')->with('comments', $comments);
    }
}
