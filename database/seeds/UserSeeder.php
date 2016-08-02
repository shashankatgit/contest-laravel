<?php

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
        
        $user = new \App\User();
        $user->name="Shashank";
        $user->email="test1@test.com";
        $user->password=bcrypt('hacker');
        $user->team = 1;
        $user->save();
    }
}
