<?php

namespace Database\Seeders;

use App\Models\Gig;
use Illuminate\Database\Seeder;

class GigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gig::create([
            'name' => 'testing gig 123',
            'user_id' => 1,
            'category_id' => 2,
            'image' => 'dota1.jpeg',
            'about' => 'ini about lohhh',
            'price1' => 5,
            'price2' => 10,
            'price3' => 15,
            'desc1' => 'harga 5$',
            'desc2' => 'harga 10$',
            'desc3' => 'harga 15$',
        ]);
        Gig::create([
            'name' => 'gig test 321',
            'user_id' => 2,
            'category_id' => 4,
            'image' => 'dota2.jpg',
            'about' => 'ini about lohhh',
            'price1' => 50,
            'price2' => 100,
            'price3' => 150,
            'desc1' => 'harga 50$',
            'desc2' => 'harga 100$',
            'desc3' => 'harga 150$',
        ]);
        Gig::create([
            'name' => 'gig siapa ini',
            'user_id' => 1,
            'category_id' => 6,
            'image' => 'dota3.jpg',
            'about' => 'ini about lohhh',
            'price1' => 10,
            'price2' => 20,
            'price3' => 30,
            'desc1' => 'harga 10$',
            'desc2' => 'harga 20$',
            'desc3' => 'harga 30$',
        ]);
        Gig::create([
            'name' => 'gig dota123',
            'user_id' => 2,
            'category_id' => 4,
            'image' => 'dota4.jpg',
            'about' => 'ini about lohhh',
            'price1' => 10,
            'price2' => 30,
            'price3' => 50,
            'desc1' => 'harga 10$',
            'desc2' => 'harga 30$',
            'desc3' => 'harga 50$',
        ]);
        Gig::create([
            'name' => 'gig dota',
            'user_id' => 2,
            'category_id' => 2,
            'image' => 'dota5.jpg',
            'about' => 'ini about lohhh',
            'price1' => 100,
            'price2' => 300,
            'price3' => 500,
            'desc1' => 'harga 100$',
            'desc2' => 'harga 300$',
            'desc3' => 'harga 500$',
        ]);
        Gig::create([
            'name' => 'gig dota321',
            'user_id' => 2,
            'category_id' => 9,
            'image' => 'dota6.jpg',
            'about' => 'ini about lohhh',
            'price1' => 20,
            'price2' => 40,
            'price3' => 50,
            'desc1' => 'harga 20$',
            'desc2' => 'harga 40$',
            'desc3' => 'harga 50$',
        ]);
        Gig::create([
            'name' => 'gig dota26',
            'user_id' => 1,
            'category_id' => 8,
            'image' => 'dota7.jpg',
            'about' => 'ini about lohhh',
            'price1' => 8,
            'price2' => 10,
            'price3' => 90,
            'desc1' => 'harga 8$',
            'desc2' => 'harga 10$',
            'desc3' => 'harga 90$',
        ]);
        Gig::create([
            'name' => 'gig dota532',
            'user_id' => 2,
            'category_id' => 9,
            'image' => 'dota8.jpg',
            'about' => 'ini about lohhh',
            'price1' => 20,
            'price2' => 40,
            'price3' => 50,
            'desc1' => 'harga 20$',
            'desc2' => 'harga 40$',
            'desc3' => 'harga 50$',
        ]);
        Gig::create([
            'name' => 'gig dotafdsgh',
            'user_id' => 2,
            'category_id' => 5,
            'image' => 'dota9.jpg',
            'about' => 'ini about lohhh',
            'price1' => 80,
            'price2' => 100,
            'price3' => 900,
            'desc1' => 'harga 80$',
            'desc2' => 'harga 100$',
            'desc3' => 'harga 900$',
        ]);
        Gig::create([
            'name' => 'dotacg1',
            'user_id' => 1,
            'category_id' => 9,
            'image' => 'dota10.jpg',
            'about' => 'ini about lohhh',
            'price1' => 200,
            'price2' => 400,
            'price3' => 500,
            'desc1' => 'harga 200$',
            'desc2' => 'harga 400$',
            'desc3' => 'harga 500$',
        ]);
        Gig::create([
            'name' => 'gig dofas26',
            'user_id' => 2,
            'category_id' => 1,
            'image' => 'dota1.jpeg',
            'about' => 'ini about lohhh',
            'price1' => 40,
            'price2' => 400,
            'price3' => 900,
            'desc1' => 'harga 40$',
            'desc2' => 'harga 400$',
            'desc3' => 'harga 900$',
        ]);
        Gig::create([
            'name' => 'gig dotaads21',
            'user_id' => 2,
            'category_id' => 9,
            'image' => 'dota2.jpg',
            'about' => 'ini about lohhh',
            'price1' => 20,
            'price2' => 40,
            'price3' => 50,
            'desc1' => 'harga 20$',
            'desc2' => 'harga 40$',
            'desc3' => 'harga 50$',
        ]);
        Gig::create([
            'name' => 'gig dota2fsa6',
            'user_id' => 1,
            'category_id' => 8,
            'image' => 'dota6.jpg',
            'about' => 'ini about lohhh',
            'price1' => 8,
            'price2' => 10,
            'price3' => 90,
            'desc1' => 'harga 8$',
            'desc2' => 'harga 10$',
            'desc3' => 'harga 90$',
        ]);
    }
}
