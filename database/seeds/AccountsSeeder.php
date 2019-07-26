<?php

use Illuminate\Database\Seeder;
use App\User;

class AccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5; $i++) {
          User::create([
            'name' => 'user'.$i,
            'email' => 'user'.$i.'@gmail.com',
            'password' => bcrypt('secret'),
            'role' => '3'
          ]);
          User::create([
            'name' => 'admin'.$i,
            'email' => 'admin'.$i.'@gmail.com',
            'password' => bcrypt('secret'),
            'role' => '1'
          ]);
        }
          User::create([
            'name' => 'XXI',
            'email' => 'XXI@gmail.com',
            'password' => bcrypt('xxi123'),
            'role' => '2'
          ]);
    }
}
