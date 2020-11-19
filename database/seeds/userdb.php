<?php

use Illuminate\Database\Seeder;
use App\user;

class userdb extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
  public function run()
    {
        DB::table('users')->insert([
            'name' => 'mohamed',
            'email' => 'mohamed@gmail.com',
            'password' => bcrypt('180632383'),
        ]);
        DB::table('users')->insert([
            'name' => 'user2',
            'email' => 'user2@email.com',
            'password' => bcrypt('password'),
        ]);
    }
}
