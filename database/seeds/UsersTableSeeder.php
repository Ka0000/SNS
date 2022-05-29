<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
                'id' => '1',
                'username' => 'test1',
                'mail' => 'test1@test.com',
                'password' => bcrypt('password1'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')

            ],
            [
                'id' => '2',
                'username' => 'test2',
                'mail' => 'test2@test.com',
                'password' => bcrypt('password2'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => '3',
                'username' => 'test3',
                'mail' => 'test3@test.com',
                'password' => bcrypt('password3'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
         ]);
    }
}
