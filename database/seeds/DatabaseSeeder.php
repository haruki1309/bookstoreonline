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

                'username'=>'admin',
                'password'=>bcrypt('admin'),    
                'role_id'=>1
            ]
        ];
        DB::table('admin')->insert($admin);

        $user = [
            [
                'name'=>'Bùi Trung Tín',
                'email'=>'trungtin0904@gmail.com',
                'phone'=>'0786481276',
                'password'=>bcrypt('trungtin0404')
            ]
        ];
        DB::table('user')->insert($user);
        $this->command->info('Insert data successfull!');
    }
}
