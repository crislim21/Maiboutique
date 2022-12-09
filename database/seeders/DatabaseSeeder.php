<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(3)->create();

        Category::create([
            'name' => 'Classic style',
            'image' => '/category-images/classic.jpg',
            'slug' => 'classic'
        ]);

        Category::create([
            'name' => 'Business style',
            'image' => '/category-images/business.jpg',
            'slug' => 'business'
        ]);

        Category::create([
            'name' => 'Korea style',
            'image' => '/category-images/korea.png',
            'slug' => 'korea'
        ]);

        Category::create([
            'name' => 'Minimalist style',
            'image' => '/category-images/minimalist.jpg',
            'slug' => 'minimalist'
        ]);

        Category::create([
            'name' => 'Street wear style',
            'image' => '/category-images/streetwear.jpg',
            'slug' => 'streetwear'
        ]);

        Category::create([
            'name' => 'Trendy style',
            'image' => '/category-images/trendy.png',
            'slug' => 'trendy'
        ]);

        Post::factory(20)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::create([
        //     'name' => 'Cris lim',
        //     'email' => 'crislim21@gmail.com',
        //     'password' => bcrypt('12345'),
        //     'phonenumber' => '123456789',
        //     'address' => 'Jl Jelambar'

        // ]);


        // Post::create([
        //     'category_id' => '1',
        //     'user_id' => '1',
        //     'title' => 'Judul Post Pertama',
        //     'slug' => 'judul-pertama',
        //     'name' => 'Cris Limpar',
        //     'description' => 'Wadadaw',
        //     'price' => '10',
        //     'stock' => '100'

        // ]);
    }
}
