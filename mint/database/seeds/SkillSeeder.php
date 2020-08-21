<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skills')->insert(
            [
            'skill' => "HTML/CSS"
            ],
            [
            'skill' => "JavaScript"
            ],
            [
            'skill' => "JQuery"
            ],
            [
            'skill' => "Vue"
            ],
            [
            'skill' => "React"
            ],
            [
            'skill' => "Angular"
            ],
            [
            'skill' => "TypeScript"
            ],
            [
            'skill' => "NodeJS"
            ],
            [
            'skill' => "PHP"
            ],
            [
            'skill' => "Laravel"
            ],
            [
            'skill' => "Symphony"
            ],
            [
            'skill' => "SQL"
            ],
            [
            'skill' => "Java"
            ],
            [
            'skill' => "C"
            ],
            [
            'skill' => "C++"
            ],
            [
            'skill' => "C#"
            ],
            [
            'skill' => "Python"
            ],
            [
            'skill' => "Assembly"
            ],
            [
            'skill' => "VBA"
            ],
            [
            'skill' => "Visual Basic .NET"
            ],
            [
            'skill' => "Swift"
            ],
            [
            'skill' => "Bash/Shell/PowerShell"
            ],
            [
            'skill' => "Go"
            ],
            [
            'skill' => "Kotlin"
            ],
            [
            'skill' => "Ruby"
            ],
            [
            'skill' => "Cobol"
            ],
            [
            'skill' => "Perl"
            ],
            [
            'skill' => "Scala"
            ],
            [
            'skill' => "MATLAB"
            ],
            [
            'skill' => "Groovy"
            ],
            [
            'skill' => "Delphi/Object Pascal"
            ],
            [
            'skill' => "R"
            ],

        );
    }
}
