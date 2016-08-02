<?php

use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $question = new \App\Question();
        $question -> text="Dummy first question";
        $question -> answer = "dummy";
        $question -> save();
    }
}
