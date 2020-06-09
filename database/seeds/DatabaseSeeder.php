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
        // $this->call(UserSeeder::class);
        factory(App\Model\Genre::class,5)->create();//5 genres
        factory(App\Model\Film::class,10)->create();//10 films
        factory(App\Model\Comment::class, 20)->create();// 20 comments
    }
}
