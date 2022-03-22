<?php

namespace App\Http\Controllers;

use App\Models\Gig;
use App\Models\Review;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store($id,Request $request)
    {
        //
        $userId = Auth::id();
        $transaction = new Transaction();
        $transaction->user_id = $userId;
        $transaction->gig_id = $id;
        $transaction->type = $request->type;
        $transaction->price = $request->price;
        $transaction->save();

        return redirect("/gig/{$id}")->with('success', 'Checkout success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $type)
    {
        //
        $gig = Gig::find($id);
        $reviewMath = Review::where('gig_id', $id)->get();
        $ratingCount = $reviewMath->count();
        $ratingAverage = floor($reviewMath->average('rating'));
        $userId = $userId = Auth::id();
        $type = $type;

        return view('checkout',compact('gig','userId','ratingAverage','ratingCount','type'));
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
    public function destroy($id)
    {
        //
    }
}
