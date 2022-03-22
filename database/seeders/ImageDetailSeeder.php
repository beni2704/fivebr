<?php

namespace Database\Seeders;

use App\Models\ImageDetail;
use Illuminate\Database\Seeder;

class ImageDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ImageDetail::create([
            'gig_id' => 1,
            'image_detail'=>'dota1.jpeg'
        ]);
        ImageDetail::create([
            'gig_id' => 1,
            'image_detail'=>'dota2.jpg'
        ]);
        ImageDetail::create([
            'gig_id' => 2,
            'image_detail'=>'dota3.jpg'
        ]);
        ImageDetail::create([
            'gig_id' => 2,
            'image_detail'=>'dota4.jpg'
        ]);
        ImageDetail::create([
            'gig_id' => 3,
            'image_detail'=>'dota5.jpg'
        ]);
        ImageDetail::create([
            'gig_id' => 3,
            'image_detail'=>'dota6.jpg'
        ]);
        ImageDetail::create([
            'gig_id' => 4,
            'image_detail'=>'dota7.jpg'
        ]);
        ImageDetail::create([
            'gig_id' => 4,
            'image_detail'=>'dota8.jpg'
        ]);
        ImageDetail::create([
            'gig_id' => 4,
            'image_detail'=>'dota9.jpg'
        ]);
        ImageDetail::create([
            'gig_id' => 4,
            'image_detail'=>'dota10.jpg'
        ]);
    }
}
