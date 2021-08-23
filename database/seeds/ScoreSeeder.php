<?php

use Illuminate\Database\Seeder;

class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('scores')->insert([
            [
                'id' => '1',
                'student_id' => '1001',
                'subject_id' => '1002',
                'score' => '80'
            ],
            [
                'id' => '2',
                'student_id' => '1003',
                'subject_id' => '1005',
                'score' => '78'
            ]
        ]);
    }
}
