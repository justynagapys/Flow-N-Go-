<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comment;

use App\Models\Offer;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth');
     }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comment.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $o_id)
    {
        $validated = $request->validate([
            'name'=>['required'],
            'message'=>['required']
        ]);
        $comment = New Comment;
        $comment->name = $request->input('name');
        $comment->message = $request->input('message');
        $comment->user_id = auth()->user()->id;
        $comment->offer_id = $o_id;
        $comment->save();
        return redirect('offers/'.$comment->offer_id.'/');
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        if($comment->user_id == auth()->user()->id){
            return view('comment.edit');
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
            'message'=>['required']
        ]);
        $comment = Comment::find($id);
        if($comment->user_id == auth()->user()->id){
            $comment->update($request->all());
            return redirect('offers/'.$comment->offer_id.'/comments');
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
        $comment = Comment::find($id);
        if($comment->user_id == auth()->user()->id){
            $comment->delete();
            return redirect('offers/'.$comment->offer_id.'/comments');
        }
        else{
            return view('errors.permissionError');
        }
    }
}
