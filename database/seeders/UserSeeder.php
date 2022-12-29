<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash as Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Demo User',
            'login' => 'Demo',
            'password' => Hash::make('inv_OKgVF3'),
            'remember_token' => Str::random(10),
            'email' => 'test@gmail.com',
        ]);
    }
}
