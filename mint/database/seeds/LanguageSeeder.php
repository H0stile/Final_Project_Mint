<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('languages')->insert([
            'languages' => 'French',

        ]);
        DB::table('languages')->insert([
            'languages' => 'German',

        ]);
        DB::table('languages')->insert([

            'languages' => 'Luxembourgish',
        ]);
        DB::table('languages')->insert([

            'languages' => 'English',
        ]);
    }
}
