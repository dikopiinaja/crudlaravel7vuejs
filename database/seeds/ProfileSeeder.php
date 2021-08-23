<?php

use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert(
            [
                'id' => '1',
                'name' => 'ifan',
                'email' => 'ifan@gmail.com'
            ],
            [
                'id' => '2',
                'name' => 'budi',
                'email' => 'budi@gmail.com'
            ],
            [
                'id' => '3',
                'name' => 'kadul',
                'email' => 'kadul@gmail.com'
            ]
        );
    }
}
