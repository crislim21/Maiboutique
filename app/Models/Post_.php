<?php

namespace App\Models;



class Post
{
    private static $info_post = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "seller" => "Seller Pertama",
            "price" => "Rp. 10,000",
            "description" => "Lorem ipsum dolor sit amet,
                consectetur adipisicing elit. Pariatur ad a,
                tempore adipisci, et, molestias illum eum amet
                repudiandae animi ratione itaque! Temporibus,
                doloribus natus, perferendis aliquam deserunt
                hic tempora modi inventore vitae eveniet qui
                corporis ratione ipsam aspernatur cupiditate
                reprehenderit alias soluta laboriosam dolore,
                necessitatibus veniam repudiandae ea nulla!",
            "stock" => "100"
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "seller" => "Seller Kedua",
            "price" => "Rp. 20,000",
            "description" => "Lorem ipsum dolor sit amet,
                consectetur adipisicing elit. Pariatur ad a,
                tempore adipisci, et, molestias illum eum amet
                repudiandae animi ratione itaque! Temporibus,
                doloribus natus, perferendis aliquam deserunt
                hic tempora modi inventore vitae eveniet qui
                corporis ratione ipsam aspernatur cupiditate
                reprehenderit alias soluta laboriosam dolore,
                necessitatibus veniam repudiandae ea nulla!",
            "stock" => "200"
        ]
    ];

    public static function all() {
        return collect(self::$info_post);
    }
    public static function find($slug) {
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }
}
