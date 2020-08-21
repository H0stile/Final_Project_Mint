<?php

use Illuminate\Database\Seeder;
// require_once 'vendor/autoload.php';

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $type = ['mentor','mentee'];
        $mentorStatus = ['pending','validate'];
        $availability = array(true, false);

        $count = 20;

        for ($i=0; $i < $count; $i++) { 
            DB::table('users')->insert([
                'email' => $faker->freeEmail,
                'password' => Hash::make('password'),
                'firstname' => $faker->firstName($gender = 'male'|'female'),
                'lastname' => $faker->lastName,
                'type' => $type[rand(0,1)],
                'linkedin' => 'https://www.linkedin.com/in/john-doe',
                'mentor_status' => $mentorStatus[rand(0,1)],
                'profile_image' => 'defaultProfileLogo.png',
                'pitch' => $faker->paragraph($nbSentences = 1, $variableNbSentences = true),
                'availability' => array_rand($availability),
            ]);
        }
    }
}
