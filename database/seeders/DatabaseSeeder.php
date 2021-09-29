<?php

namespace Database\Seeders;

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
        \App\Models\Product::factory()->create([
            'title' => 'Fusion UI Kit',
            'slug' => 'fusion-ui-kit',
            'price' => '1499',
            'image' => 'https://tailwindui.com/img/ecommerce-images/product-page-05-related-product-01.jpg'
        ]);
        \App\Models\Product::factory()->create([
            'title' => 'Marketing Icon Pack',
            'slug' => 'marketing-icon-pack',
            'price' => '1799',
            'image' => 'https://tailwindui.com/img/ecommerce-images/product-page-05-related-product-02.jpg'
        ]);
        \App\Models\Product::factory()->create([
            'title' => 'Scaffold Wireframe Kit',
            'slug' => 'scaffold-wireframe-kit',
            'price' => '2999',
            'image' => 'https://tailwindui.com/img/ecommerce-images/product-page-05-related-product-03.jpg'
        ]);
        \App\Models\Product::factory()->create([
            'title' => 'Bones Wireframe Kit',
            'slug' => 'bones-wireframe-kit',
            'price' => '2999',
            'image' => 'https://tailwindui.com/img/ecommerce-images/product-page-05-related-product-04.jpg'
        ]);
        \App\Models\Product::factory()->create([
            'title' => 'Soft UI Dashboard PRO',
            'slug' => 'soft-ui-dashboard-pro',
            'description' => 'The most complex and innovative Dashboard Made by Creative Tim. Check our latest Premium Bootstrap 5 Dashboard. Designed for those who like bold elements and beautiful websites. Made of hundred of elements, designed blocks, and fully coded pages, Soft UI Dashboard PRO is ready to help you create stunning websites and web apps. We created many examples for pages like Sign In, Profile, and so on. Just choose between a Basic Design, an illustration, or a cover and you are good to go!',
            'price' => '5999',
            'image' => 'https://s3.amazonaws.com/creativetim_bucket/products/487/original/opt_sdp_thumbnail.jpg?1622812208'
        ]);
        \App\Models\Product::factory()->create([
            'title' => 'Notus PRO React',
            'slug' => 'notus-pro-react',
            'description' => 'Start your development with a premium UI Kit and Admin components library for Tailwind CSS & React. Let Notus PRO React amaze you with its cool features and build tools that will get your project to a whole new level! Notus PRO React features multiple HTML and React elements, and it comes with dynamic components for React. It is based on Tailwind Starter Kit and Notus React by Creative Tim. This beautiful UI Kit & Admin is built with multiple components for different projects, such as Presentation websites, Blog websites, E-Commerce website platforms, and Admin Dashboard websites. It also features components for authentication and error handling. Besides these sections, it also comes with an extra components category that can be used for different purposes, such as blog sections, features sections, FAQ sections, Pricing, and many more. Check all the sections here. Speed up your web development with an awesome product made by Creative Tim. If you like bright and fresh colors, you will love this Tailwind CSS Template! It features a huge number of components that can help you create amazing websites.',
            'price' => '7999',
            'image' => 'https://s3.amazonaws.com/creativetim_bucket/products/452/original/opt_np_react_thumbnail.jpg?1619006214'
        ]);
        \App\Models\Product::factory()->create([
            'title' => 'Now UI Dashboard PRO',
            'slug' => 'now-ui-dashboard-pro',
            'description' => 'Now UI Dashboard PRO is a beautiful Bootstrap 4 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage and visualize data about your business, this dashboard is the thing for you. It combines colors that are easy on the eye, spacious cards, beautiful typography, and graphics.',
            'price' => '4999',
            'image' => 'https://s3.amazonaws.com/creativetim_bucket/products/72/original/opt_nudp_thumbnail.jpg?1517588807'
        ]);
        \App\Models\Product::factory()->create([
            'title' => 'Black Dashboard PRO React',
            'slug' => 'black-dashboard-pro-react',
            'description' => 'Black Dashboard PRO React is a beautiful Bootstrap 4 (reactstrap) Admin Dashboard that comes in 2 versions: Dark and Light Mode. If you are looking for a tool to manage and visualize data about your business, this dashboard is the thing for you. It combines colors that are easy on the eye, spacious cards, beautiful typography, and graphics.',
            'price' => '5999',
            'image' => 'https://s3.amazonaws.com/creativetim_bucket/products/138/original/opt_bdp_thumbnail.jpg?1547454513'
        ]);
        \App\Models\Role::create([
            'name' => 'user',
            'slug' => 'user'
        ]);
        \App\Models\Role::create([
            'name' => 'admin',
            'slug' => 'admin'
        ]);
    }
}
