<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavouriteGig extends Model
{
    public $timestamps =false;
    use HasFactory;
    protected $fillable = ['user_id', 'gig_id'];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function gig(){
        return $this->belongsTo(Gig::class);
    }
}
