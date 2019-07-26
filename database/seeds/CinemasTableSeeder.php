<?php

use Illuminate\Database\Seeder;

class CinemasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('cinemas')->insert([
          'name' => 'ciputra world xxi',
          'price' => 35000
      ]);

       DB::table('cinemas')->insert([
          'name' => 'cito 21',
          'price' => 35000
      ]);

       DB::table('cinemas')->insert([
          'name' => 'delta',
          'price' => 35000
      ]);

       DB::table('cinemas')->insert([
          'name' => 'galaxy xxi',
          'price' => 40000
      ]);

       DB::table('cinemas')->insert([
          'name' => 'grand city xxi',
          'price' => 40000
      ]);

       DB::table('cinemas')->insert([
          'name' => 'lenmarc xxi',
          'price' => 35000
      ]);
       DB::table('cinemas')->insert([
          'name' => 'pakuwon city xxi',
          'price' => 35000
      ]);

       DB::table('cinemas')->insert([
          'name' => 'pakuwon mall imax',
          'price' => 40000
      ]);

       DB::table('cinemas')->insert([
          'name' => 'pakuwon mall xxi',
          'price' => 40000
      ]);
       DB::table('cinemas')->insert([
          'name' => 'ptc xxi',
          'price' => 35000
      ]);

       DB::table('cinemas')->insert([
          'name' => 'royal',
          'price' => 40000
      ]);

       DB::table('cinemas')->insert([
          'name' => 'surabaya town square',
          'price' => 40000
      ]);

       DB::table('cinemas')->insert([
          'name' => 'transmart ngagel xxi',
          'price' => 35000
      ]);

       DB::table('cinemas')->insert([
          'name' => 'transmart rungkut xxi',
          'price' => 35000
      ]);

       DB::table('cinemas')->insert([
          'name' => 'tunjungan 3 xxi',
          'price' => 35000
      ]);

       DB::table('cinemas')->insert([
          'name' => 'tunjungan 5 imax',
          'price' => 45000
      ]);

       DB::table('cinemas')->insert([
          'name' => 'tunjungan 5 xxi',
          'price' => 40000
      ]);

       DB::table('cinemas')->insert([
          'name' => 'tunjungan plaza xx1',
          'price' => 35000
      ]);
    }
}
