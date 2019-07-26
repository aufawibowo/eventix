<?php

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
        $this->call(CinemasTableSeeder::class);
        $this->call(FilmsTableSeeder::class);
        $this->call(SchedulesTableSeeder::class);
        $this->call(AccountsSeeder::class);

    }
}
