<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gig extends Model
{
    public $timestamps =false;
    use HasFactory;


    public function review(){
        return $this->hasMany(Review::class,'id','category_id');
    }

    public function transaction(){
        return $this->hasMany(Transaction::class,'id','user_id');
    }

    public function favouriteGig(){
        return $this->hasMany(FavouriteGig::class,'id','user_id');
    }
    
    public function imageDetail(){
        return $this->hasMany(ImageDetail::class,'id','user_id');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
