<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Post;
use App\Category;
use App\Tag;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class, 20) -> make() -> each(function ($post) {

            $category = Category::inRandomOrder() -> limit(1) -> first();

            $post -> category() -> associate($category);

            $post -> save();
        });

        /* factory(Post::class, 20) -> create() -> each(function ($post) {

            $tags = Tag::inRandomOrder() -> limit(rand(0, 5)) -> get();

            $post -> tags() -> attach($tags);
            $post -> save();
        }); */

        /* DB::table('post_tag')->insert([
            ['post_id' => 1, 'tag_id' => 1]
        ]); */
    }
}
