<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('students')->insert(
            [
                [
                    'name' => 'Juan María',
                    'lastname' => 'Mateos',
                    'birth_date' => '1741/03/12',
                    'phone' => '969599899',
                    'email' => 'email@email.com',
                    'dni' => '34789890S',
                    'city' => 'Alicante',
                    'course_id' => 2
                ]
            ]
        );

    }
}
