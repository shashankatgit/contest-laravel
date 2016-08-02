<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new \App\Admin();
        $admin->name="Shashank";
        $admin->email="test@test.com";
        $admin->password=bcrypt('hacker');
        $admin->save();
    }
}
