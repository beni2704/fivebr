<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Review::create([
            'user_id' => 3,
            'gig_id' => 1,
            'review'=>'ini review nya dari saya bagus',
            'rating' =>4,
            'review_date' => '2020-04-08'
        ]);
        Review::create([
            'user_id' => 2,
            'gig_id' => 1,
            'review'=>'ini review nya dari saya bagus1',
            'rating' =>2,
            'review_date' => '2021-01-01'
        ]);
        Review::create([
            'user_id' => 3,
            'gig_id' => 1,
            'review'=>'ini review nya dari saya bagus2',
            'rating' =>5,
            'review_date' => '2021-02-01'
        ]);
        Review::create([
            'user_id' => 2,
            'gig_id' => 1,
            'review'=>'ini review nya dari saya bagus3',
            'rating' =>4,
            'review_date' => '2021-08-10'
        ]);
        Review::create([
            'user_id' => 3,
            'gig_id' => 1,
            'review'=>'ini review nya dari saya bagus4',
            'rating' => 5,
            'review_date' => '2021-09-08'
        ]);
        Review::create([
            'user_id' => 3,
            'gig_id' => 1,
            'review'=>'ini review nya dari saya bagus5',
            'rating' =>4,
            'review_date' => '2021-08-08'
        ]);
        Review::create([
            'user_id' => 3,
            'gig_id' => 1,
            'review'=>'ini review nya dari saya bagus6',
            'rating' =>4,
            'review_date' => '2021-08-08'
        ]);
        Review::create([
            'user_id' => 3,
            'gig_id' => 1,
            'review'=>'ini review nya dari saya bagus7',
            'rating' =>4,
            'review_date' => '2021-08-08'
        ]);
        Review::create([
            'user_id' => 3,
            'gig_id' => 1,
            'review'=>'ini review nya dari saya bagus8',
            'rating' =>4,
            'review_date' => '2021-08-08'
        ]);
        Review::create([
            'user_id' => 3,
            'gig_id' => 1,
            'review'=>'ini review nya dari saya bagus9',
            'rating' =>4,
            'review_date' => '2021-08-08'
        ]);
        Review::create([
            'user_id' => 3,
            'gig_id' => 1,
            'review'=>'ini review nya dari saya bagus10',
            'rating' =>4,
            'review_date' => '2021-08-08'
        ]);
        Review::create([
            'user_id' => 3,
            'gig_id' => 1,
            'review'=>'ini review nya dari saya bagus11',
            'rating' =>4,
            'review_date' => '2021-08-08'
        ]);
        Review::create([
            'user_id' => 3,
            'gig_id' => 1,
            'review'=>'ini review nya dari saya bagus12',
            'rating' =>4,
            'review_date' => '2021-08-08'
        ]);
        Review::create([
            'user_id' => 1,
            'gig_id' => 2,
            'review'=>'ini review nya dari saya bagus6',
            'rating' =>3,
            'review_date' => '2021-09-10'
        ]);
        Review::create([
            'user_id' => 2,
            'gig_id' => 1,
            'review'=>'ini review nya dari saya bagus7',
            'rating' =>5,
            'review_date' => '2021-07-07'
        ]);
    }
}
