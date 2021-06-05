<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BalanceHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Balance::factory(10)->create();
    }
}
