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
            'slug' => 'classic'
        ]);

        Category::create([
            'name' => 'Business style',
            'slug' => 'business'
        ]);

        Category::create([
            'name' => 'Korea style',
            'slug' => 'korea'
        ]);

        Category::create([
            'name' => 'Minimalist style',
            'slug' => 'minimalist'
        ]);

        Category::create([
            'name' => 'Street wear style',
            'slug' => 'streetwear'
        ]);

        Category::create([
            'name' => 'Trendy style',
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
