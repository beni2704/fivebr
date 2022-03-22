<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::create([
            'user_id' => 1,
            'gig_id' => 1,
            'type' => 'Basic',
            'price' => 50,
            'transaction_date' => '2021-08-08'
        ]);
        Transaction::create([
            'user_id' => 1,
            'gig_id' => 2,
            'type' => 'Standart',
            'price' => 150,
            'transaction_date' => '2021-09-10'
        ]);
        Transaction::create([
            'user_id' => 2,
            'gig_id' => 1,
            'type' => 'Premium',
            'price' => 10,
            'transaction_date' => '2021-07-07'
        ]);
    }
}
