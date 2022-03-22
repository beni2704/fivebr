<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Category::create([
            'name'=>'Graphics & Design',
            'isPopular' => false,
        ]);
        Category::create([
            'name'=>'Digital Marketing',
            'isPopular' => true,
        ]);
        Category::create([
            'name'=>'Writing & Translation',
            'isPopular' => true,
        ]);
        Category::create([
            'name'=>'Video & Animation',
            'isPopular' => false,
        ]);
        Category::create([
            'name'=>'Music & Animation',
            'isPopular' => false,
        ]);
        Category::create([
            'name'=>'Music & Audio',
            'isPopular' => true,
        ]);
        Category::create([
            'name'=>'Programming & Tech',
            'isPopular' => true,
        ]);
        Category::create([
            'name'=>'Data',
            'isPopular' => true,
        ]);
        Category::create([
            'name'=>'Business',
            'isPopular' => true,
        ]);
        Category::create([
            'name'=>'Lifestyle',
            'isPopular' => false,
        ]);
    }
}
