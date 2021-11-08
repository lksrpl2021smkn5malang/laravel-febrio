<?php

namespace App\Models;

class Post
{
    private static $blog_posts = [
        [
            "title" => "First Post Title",
            "slug" => "first-post",
            "author" => "Moch. Febrio DA",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, earum corrupti? Dolor ut tenetur molestias! Magnam repellendus eum dolorem est accusantium voluptas consequuntur cumque ratione rem officia enim nam neque excepturi id modi ex ducimus ad, iure ipsum ipsa dolore! Suscipit quidem consequatur laborum natus qui at labore delectus ad, ratione inventore, maiores, cum quia illo voluptate nemo amet? Aspernatur fuga, delectus adipisci similique est, in accusamus mollitia tenetur sed culpa maxime quibusdam autem repudiandae, ullam aliquam officia alias cumque."
        ],
        [
            "title" => "Second Post Title",
            "slug" => "second-post",
            "author" => "Dialessandro Athyabu",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. At quidem dignissimos molestiae doloremque tempore consequuntur temporibus, voluptatibus enim sapiente consequatur possimus in doloribus. Praesentium nihil iure labore harum perferendis ut odio nemo blanditiis iste culpa quo deserunt quidem consectetur nulla reiciendis reprehenderit, quae eos maxime earum quis distinctio dolor, cum similique? Quas dolorem molestias, alias nihil nisi fugiat animi. Ex officiis amet quod reiciendis asperiores possimus mollitia! Eveniet, veritatis consectetur. Saepe animi voluptas hic numquam magnam quos facere quo eveniet!"
        ],
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        // $post = self::$blog_posts;

        // $new_post = [];
        // foreach ($post as $p) {
        //     if ($p["slug"] === $slug) {
        //         $new_post = $p;
        //     }
        // }

        $post = static::all();
        return $post->firstWhere('slug', $slug);
    }
}
