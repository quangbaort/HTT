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
            'name' => 'Tiger',
            'password' => Hash::make('HTTVIP'),
            'name_hago' => 'SG tiger',
            'id_hago' => '123456789',
            'role' => 1,
            'vip' => 4,
            'id_hago'=> 69,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
