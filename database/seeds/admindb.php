<?php

use Illuminate\Database\Seeder;
use App\admin;

class admindb extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
  public function run()
    {
        DB::table('admins')->insert([
            'name' => 'mohamed',
            'email' => 'mohamed@gmail.com',
            'password' => bcrypt('180632383'),
        ]);
        DB::table('admins')->insert([
            'name' => 'admin2',
            'email' => 'admin2@email.com',
            'password' => bcrypt('password'),
        ]);
    }
}
