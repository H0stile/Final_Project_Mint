<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $messages = array(
            array(
                'msg' => 'mobydick',
                'writer_id' => 1,
                'target_id' => 2,
                'time_msg' => 2,

            ),

            array(
                'title' => 'book 2',
                'price' => 9,
                'author_id' => 1
            ),

            array(
                'title' => 'book 3',
                'price' => 10.5,
                'author_id' => 2
            ),
        );

        foreach ($messages as $message) {
            DB::table('messages')->insert([
                'message' => $message['message'],
                'writer_id' => $message['writer_id'],
                'target_id' => $message['target_id'],
                'time_msg' => $message['time_msg']
            ]);
        }
    }
}
