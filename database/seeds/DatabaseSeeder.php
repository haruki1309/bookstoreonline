<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	Eloquent::unguard();
        $path = 'database/seeds/SeederData.sql';
        DB::unprepared(file_get_contents($path));
        $admin = [
            [ 
                'username'=>'cy',
                'password'=>bcrypt('cy')

            ],
            [
                'username'=>'tinchodien',
                'password'=>bcrypt('111112')
            ]
        ];
        DB::table('admin')->insert($admin);
        $this->command->info('Insert data successfull!');
    }
}
