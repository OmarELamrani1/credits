<?php

namespace Database\Seeders;

use App\Models\Credit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Credit::create([
            'amount' => 30000,
            'amountRemained' => 30000
        ]);
    }
}
