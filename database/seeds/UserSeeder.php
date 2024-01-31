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
            'email'             => 'kadus2@gmail.com',
            'email_verified_at' => now(),
            'role'              => 'kependudukan',
            'password'          => bcrypt('kadus123'),
        ]);
    }
}
