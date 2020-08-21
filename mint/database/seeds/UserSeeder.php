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
        $type = array('mentor','mentee');
        $mentorStatus = array('pending','validate');
        $availability = array(true, false);

        $count = 20;

        for ($i=0; $i < $count; $i++) { 
            DB::table('users')->insert([
                'email' => $faker->freeEmail,
                'password' => Hash::make('password'),
                'firstname' => firstName($gender = null|'male'|'female'),
                'lastname' => $faker->lastName,
                'type' => array_rand($type),
                'linkedin' => 'https://www.linkedin.com/in/john-doe',
                'mentor_status' => rand_array($mentorStatus),
                'profile_image' => 'defaultProfileLogo.png',
                'pitch' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                'availability' => array_rand($availability),
            ]);
        }
    }
}
