<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
use Carbon\Carbon;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PostsTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}





