<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(AdminSeeder::class);
        $this->call(TransactionTypeSeeder::class);

        for ($i = 1; $i<=12; $i++) {
            Employee::factory()->has(Transaction::factory()->count(15))->create();
        }

    }
}
