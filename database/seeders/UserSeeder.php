<?php

namespace Database\Seeders;

use App\{Models\AdminModel, Models\UserModel};
use Illuminate\{Database\Seeder, Support\Facades\Hash, Support\Str};

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserModel::factory()->count(count: 10000)->create();
        (new AdminModel(attributes: [
            'name' => 'ConvertedIn',
            'email' => 'admin@convertedin.com',
            'email_verified_at' => now(),
            'password' => Hash::make(value: 'password'),
            'remember_token' => Str::random(length: 10),
        ]))->save();
        AdminModel::factory()->count(count: 100)->create();
    }
}
