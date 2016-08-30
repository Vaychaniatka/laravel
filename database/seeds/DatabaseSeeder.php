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
        // $this->call(UsersTableSeeder::class);
        $this->call(PostsSeeder::class);
    }
}


class PostsSeeder extends Seeder
{
    public function run()
    {
        DB::table('posts')->delete();
        Post::create([
            'title'=>'First Post',
            'slug'=>'First-Post',
            'excerpt'=>'<b>First Post Body</b>',
            'content'=>'<b>First Post Content</b>',
            'published'=>true,
            'published_at'=>Carbon::now(),

        ]);Post::create([
            'title'=>'Second Post',
            'slug'=>'Second-Post',
            'excerpt'=>'<b>Second Post Body</b>',
            'content'=>'<b>Second Post Content</b>',
            'published'=>true,
            'published_at'=>Carbon::now(),

        ]);Post::create([
            'title'=>'Third Post',
            'slug'=>'Third-Post',
            'excerpt'=>'<b>Third Post Body</b>',
            'content'=>'<b>Third Post Content</b>',
            'published'=>true,
            'published_at'=>Carbon::now(),

        ]);
    }

}
{

}



