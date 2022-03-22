<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageDetail extends Model
{
    public $timestamps =false;
    use HasFactory;

    protected $fillable = ['gig_id','image_detail'];

    public function gig(){
        return $this->belongsTo(Gig::class);
    }
}
