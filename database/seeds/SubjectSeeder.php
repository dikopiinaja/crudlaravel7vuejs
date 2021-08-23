<?php

use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subject')->insert([
            [
                'id' => '1001',
                'name' => 'Algoritma'
            ],
            [
                'id' => '1002',
                'name' => 'Pemrograman Dasar'
            ],
            [
                'id' => '1003',
                'name' => 'Basis Data'
            ],
            [
                'id' => '1004',
                'name' => 'Matematika dasar'
            ],
            [
                'id' => '1005',
                'name' => 'Teknik Digital'
            ]
        ]);
    }
}
