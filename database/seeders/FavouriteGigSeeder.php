<?php

namespace Database\Seeders;

use App\Models\FavouriteGig;
use Illuminate\Database\Seeder;

class FavouriteGigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        FavouriteGig::create([
            'user_id' => 1,
            'gig_id' => 2,
        ]);
        FavouriteGig::create([
            'user_id' => 1,
            'gig_id' => 3,
        ]);
        FavouriteGig::create([
            'user_id' => 1,
            'gig_id' => 1,
        ]);
        FavouriteGig::create([
            'user_id' => 2,
            'gig_id' => 3,
        ]);
        FavouriteGig::create([
            'user_id' => 2,
            'gig_id' => 4,
        ]);
    }
}
