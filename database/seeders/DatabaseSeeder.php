<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(GigSeeder::class);
        $this->call(ImageDetailSeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(TransactionSeeder::class);
        $this->call(FavouriteGigSeeder::class);
    }
}
