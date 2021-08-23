<?php

use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('student')->insert([
            [
                'id' => '1001',
                'name' => 'agus'
            ],
            [
                'id' => '1002',
                'name' => 'budi'
            ],
            [
                'id' => '1003',
                'name' => 'deni'
            ],
            [
                'id' => '1004',
                'name' => 'riko'
            ]
        ]);
    }
}
