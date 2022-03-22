<?php

namespace App\Http\Controllers;

use App\Models\FavouriteGig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $userId = Auth::id();
        $gigs = FavouriteGig::where('user_id',$userId)->get();
        
        $isFavourite = FavouriteGig::where('user_id',$userId)->get();

        return view('favouritegig',compact('gigs','userId','isFavourite'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($userid, $gigid)
    {
        $favourite = new FavouriteGig();
        $favourite->user_id = $userid;
        $favourite->gig_id = $gigid;
        $favourite->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($userid, $gigid)
    {
        FavouriteGig::where('user_id', $userid)->where('gig_id', $gigid)->delete();
    }
}
