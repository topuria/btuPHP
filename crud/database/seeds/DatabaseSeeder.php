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
        // $this->call(UserTableSeeder::class);

        App\User::create([
            'name' => 'BTUUser',
            'email' => 'BTU@BTU.com',
            'password' => bcrypt('123'),
        ]);

        factory(App\Page::class, 30)->create();
    }
}
