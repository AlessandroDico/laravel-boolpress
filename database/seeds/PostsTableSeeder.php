<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker) {
        // $posts = config('posts');
        //
        // foreach ($posts as $post) {
        //     $newPost = new Post();
        //     $newPost->title = $post['title'];
        //     $newPost->author = $post['author'];
        //     $newPost->category = $post['category'];
        //     $newPost->save();
        // }

        for ($i=0; $i < 50 ; $i++) {
            $newPost = new Post();
            $newPost->title = $faker->sentence();
            $newPost->subtitle = $faker->sentence(2);
            $newPost->author = $faker->name();
            $newPost->category = $faker->word();
            $newPost->topic = $faker->word();
            $newPost->language = $faker->countryCode();
            $newPost->text = $faker->text(8000);
            $newPost->save();
        }

    }
}
