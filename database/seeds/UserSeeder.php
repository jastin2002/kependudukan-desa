<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama'              => 'Kadus Marga Mulya',
            'email'             => 'admin@gmail.com',
            'email_verified_at' => now(),
            'role'              => 'kependudukan',
            'password'          => bcrypt('admin123'),
        ]);
    }
}
