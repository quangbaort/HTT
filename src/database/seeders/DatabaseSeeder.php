<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'adminHTT',
            'password' => Hash::make('HTTVIP'),
            'role' => 1
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
