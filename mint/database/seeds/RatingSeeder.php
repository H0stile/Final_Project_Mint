<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ratings = array(
            array('writer_id' => '1',
            'target_id' => '2',
            'score' => '5',
            'comment' => 'this is the first message'),

            array('writer_id' => '1',
            'target_id' => '2',
            'score' => '3',
            'comment' => 'this is the second message'),

            array('writer_id' => '1',
            'target_id' => '2',
            'score' => '2',
            'comment' => 'this is the third message'),
            
        );
        foreach ($ratings as $rating) {

            DB::table('ratings')->insert([

                'writer_id' => $rating['writer_id'],
                'target_id' => $rating['price'],
                'score' => $rating['author_id'],
                'comment' => $rating['comment'],
            
                ]);    
        }
        
    }
}
