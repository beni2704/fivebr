<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\FavouriteGig;
use App\Models\Gig;
use App\Models\ImageDetail;
use App\Models\Review;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GigController extends Controller
{
    public function search(Request $request)
    {
        $categories = Category::all();
        $min = 0;
        $max = 99999999;
        $title = "";
        $categoryId = "";
        $sellerName = "";
        $userId = Auth::id();
        
        if ($request->title != null) {
            $title = $request->title;
        }
        if ($request->category != null) {
            $categoryId = $request->category;
        }

        if ($request->category == -1){
            $categoryId = "";
        }

        if ($request->min != null) {
            $min = $request->min;
        }
        if ($request->max != null) {
            $max = $request->max;
        }
        if ($request->seller != null){
            $sellerName = $request->seller;
        }
        
        $gigs = Gig::with('user')
            ->where('gigs.name', 'LIKE', "%$title%")
            ->where('category_id', 'LIKE', "%$categoryId%")
            ->where('price1', '>=', "$min")
            ->where('price1', '<=', "$max")
            ->where('users.name', 'LIKE', "%$sellerName%")
            ->join('users','users.id','=','user_id')
            ->select('gigs.name as gigName', 'users.name as userName', 'gigs.id as gigId', 'users.id as userId', 'users.profile_picture as profilePicture' ,'gigs.*')
            ->paginate(10);

        $gigs->appends([
            'name'=>$request->name,
            'category'=>$request->category,
            'min' => $request->min,
            'max' => $request->max,
            'seller' => $request->seller
        ]);

        $isFavourite = FavouriteGig::where('favourite_gigs.user_id',$userId)
            ->where('gigs.id','favourite_gigs.gig_id')
            ->join('gigs','favourite_gigs.gig_id','=','gigs.id')
            ->get();
        
        return view('search', compact('categories', 'gigs', 'request','isFavourite','userId'));
    }
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
        $categories = Category::all();
        $userId = Auth::id();

        return view('editgig', compact('categories', 'userId'), ['gig' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $userId = Auth::id();
        $request->validate([
            'name' => 'required',
            'about' => 'required',
            'price1' => 'required|lt:price2|lt:price3',
            'price2' => 'required|gt:price1|lt:price3',
            'price3' => 'required|gt:price1|gt:price2',
            'desc1' => 'required',
            'desc2' => 'required',
            'desc3' => 'required',
            'images' => 'array',
            'images.*' => 'required|file|image',
        ]);
        $gig = new Gig();
        $gig->name = $request->name;
        $gig->about = $request->about;
        $gig->price1 = $request->price1;
        $gig->price2 = $request->price2;
        $gig->price3 = $request->price3;
        $gig->desc1 = $request->desc1;
        $gig->desc2 = $request->desc2;
        $gig->desc3 = $request->desc3;
        $gig->category_id = $request->category;

        $gig->user_id = $userId;

        $images = $request->images;
        $gig->image = $images[0]->getClientOriginalName();
        $gig->save();

        foreach ($images as $index => $image) {
            $image->move('storage', $image->getClientOriginalName());
            if ($index > 0) {
                ImageDetail::create(['gig_id' => $gig->id, 'image_detail' => $image->getClientOriginalName()]);
            }
        }
        return redirect("profile/{$userId}");
    }
    
    public function storeReview($id, Request $request)
    {
        //
        $userId = Auth::id();
        $request->validate([
            'rating' => 'required|between:1,5|integer',
            'review' => 'required',
        ]);
        $review = new Review();
        $review->user_id = $userId;
        $review->gig_id = $id;
        $review->rating = $request->rating;
        $review->review = $request->review;
        $review->save();

        return redirect("/gig/{$id}");
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
        $gig = Gig::find($id);
        $images = ImageDetail::where('gig_id', $id)->get();
        $reviews = Review::with('user')->where('gig_id', $id)->simplePaginate(10);
        $reviewMath = Review::where('gig_id', $id)->get();
        $ratingCount = $reviewMath->count();
        $ratingAverage = floor($reviewMath->average('rating'));
        $userId = Auth::id();

        $transactionValid = Transaction::where('gig_id', $id)->where('user_id', $userId)->get();
        // dd($transactionValid);

        $isFavourite = FavouriteGig::where('user_id',$userId)->where('gig_id',$id)->get();

        return view('gigdetail', compact('gig', 'images', 'reviews', 'ratingCount', 'ratingAverage', 'userId','transactionValid','isFavourite'));
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
        $categories = Category::all();
        $gig = Gig::find($id);
        $userId = Auth::id();

        return view('editgig', compact('gig', 'categories', 'userId'));
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
        $request->validate([
            'name' => 'required',
            'about' => 'required',
            'price1' => 'required|lt:price2|lt:price3',
            'price2' => 'required|gt:price1|lt:price3',
            'price3' => 'required|gt:price1|gt:price2',
            'desc1' => 'required',
            'desc2' => 'required',
            'desc3' => 'required',
        ]);
        $gig = Gig::find($id);
        $gig->name = $request->name;
        $gig->about = $request->about;
        $gig->price1 = $request->price1;
        $gig->price2 = $request->price2;
        $gig->price3 = $request->price3;
        $gig->desc1 = $request->desc1;
        $gig->desc2 = $request->desc2;
        $gig->desc3 = $request->desc3;
        $gig->category_id = $request->category;
        $gig->save();

        if ($request->has('images')) {
            $request->validate([
                'images' => 'array',
                'images.*' => 'required|file|image',
            ]);
            $images = $request->images;
            foreach ($images as $image) {
                $image->move('storage', $image->getClientOriginalName());
                ImageDetail::create(['gig_id' => $gig->id, 'image_detail' => $image->getClientOriginalName()]);
            }
        }
        return redirect("/gig/$gig->id");
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
        $gig = Gig::where('id', $id)->first();
        $gig->delete();
        $userId = Auth::id();
        return redirect("/profile/$userId");
    }
}
