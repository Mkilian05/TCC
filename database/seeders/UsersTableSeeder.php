<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userMatheus = User::create([
            'name' => 'Matheus',
            'password' => bcrypt('12345678'),
            'email' => 'mkilian05@gmail.com',
            'email_verified_at' => Carbon::now(),
        ]);

        $userMatheus->assignRole('admin');
    }
}
