<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\{Database\Seeder, Support\Facades\DB};

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            values: factory(User::class, 10000)->create()
        );

        DB::table('users')->insert(
            values: factory(User::class, 100)->state('admin')->create()
        );
    }
}
