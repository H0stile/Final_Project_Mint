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
                'message' => 'Text message number 1',
                'writer_id' => 1,
                'target_id' => 2,
                'time_msg' => '2020-08-11 15:55:45',

            ),

            array(
                'message' => 'Text message number 2',
                'writer_id' => 2,
                'target_id' => 1,
                'time_msg' => '2020-06-11 15:30:15',
            ),

            array(
                'message' => 'Text message number 3',
                'writer_id' => 1,
                'target_id' => 3,
                'time_msg' => '2020-05-11 10:05:20',
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
