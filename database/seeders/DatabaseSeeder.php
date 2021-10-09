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
        $product1 = \App\Models\Product::factory()->create([
            'title' => 'Social Katch-Up',
            'slug' => 'social-katch-up',
            'price' => '999',
            'description' => 'Create your very own social media with this AMAZING UI Kit! Created by https://dribbble.com/sanshizm',
            'image' => 'https://portfolio-ecommerce-bucket.s3.us-east-2.amazonaws.com/product-images/8UQSr9nCzrc6aCxJYbVBm6L0wRiQLRH1z6Iq9e6r.png',
            'file' => 'product-files/GrQbbcWzF1kcK6evU2G39wkjBpBdqhUWuJIIGTZr.txt'
        ]);
        $product1->highlights()->saveMany([
            new \App\Models\Highlight(['content' => 'Profile, feeds, notifications, auth pages, and more!']),
            new \App\Models\Highlight(['content' => 'Clean looking UI kit!']),
            new \App\Models\Highlight(['content' => 'Ready for implementation!'])
        ]);
        $product1->faqs()->saveMany([
            new \App\Models\Faq([
                'question' => 'Does this contain any code?',
                'answer' => "No, this is only the user interface."
            ])
        ]);

        $product2 = \App\Models\Product::factory()->create([
            'title' => 'Online Courses UI Kit',
            'slug' => 'online-courses-ui-kit',
            'price' => '999',
            'description' => 'Create your very own e-learning platform with this AMAZING UI Kit! Created by https://dribbble.com/creativepox',
            'image' => 'https://portfolio-ecommerce-bucket.s3.us-east-2.amazonaws.com/product-images/U6lUBdRXXdvrc8Jra8oUsNuciUPZ7SUNnLZNahcw.png',
            'file' => 'product-files/6pivfTs5HJBxDLRdG8T4FaU9iLjmNSPUIeFS3x7i.txt'
        ]);
        $product2->highlights()->saveMany([
            new \App\Models\Highlight(['content' => 'Course layouts, reviews, about, and more!']),
            new \App\Models\Highlight(['content' => 'Clean looking UI kit!']),
            new \App\Models\Highlight(['content' => 'Ready for implementation!'])
        ]);
        $product2->faqs()->saveMany([
            new \App\Models\Faq([
                'question' => 'Does this contain any code?',
                'answer' => "No, this is only the user interface."
            ])
        ]);

        $product3 = \App\Models\Product::factory()->create([
            'title' => 'Login Screens UI Kit',
            'slug' => 'login-screens-ui-kit',
            'price' => '999',
            'description' => 'Looking for some UI for your authentication systems? Look no more! The Login Screens UI Kit comes loaded with different variations of auth user interfaces! Created by https://dribbble.com/omstudio',
            'image' => 'https://portfolio-ecommerce-bucket.s3.us-east-2.amazonaws.com/product-images/yjno4QxFZCFpnfF58yweb5kFp9wuMrPPtaXWNl2q.png',
            'file' => 'product-files/9HfVJIFRC9flNXDY3sRnwr2SV1lH7HxxKVWHGHXn.txt'
        ]);
        $product3->highlights()->saveMany([
            new \App\Models\Highlight(['content' => 'Email/phone/social logins, forgot password, and more!']),
            new \App\Models\Highlight(['content' => 'Clean looking UI kit!']),
            new \App\Models\Highlight(['content' => 'Ready for implementation!'])
        ]);
        $product3->faqs()->saveMany([
            new \App\Models\Faq([
                'question' => 'Does this contain any code?',
                'answer' => "No, this is only the user interface."
            ])
        ]);

        $product4 = \App\Models\Product::factory()->create([
            'title' => 'Productivity Dashboards',
            'slug' => 'productivity-dashboards',
            'price' => '1199',
            'description' => 'Four AMAZING, clean looking dashboards to increase productivity! Created by https://dribbble.com/amadacs',
            'image' => 'https://portfolio-ecommerce-bucket.s3.us-east-2.amazonaws.com/product-images/TzShrS6EBseGIuoyX8DUJDbWh0MKGbxVWgHxgmmt.png',
            'file' => 'product-files/44a4uu16LWhkeSagg5uhDHdgfj1PlLZbJctn0kNo.txt'
        ]);
        $product4->highlights()->saveMany([
            new \App\Models\Highlight(['content' => 'Four dashboards!']),
            new \App\Models\Highlight(['content' => 'Clean looking UI kit!']),
            new \App\Models\Highlight(['content' => 'Ready for implementation!'])
        ]);
        $product4->faqs()->saveMany([
            new \App\Models\Faq([
                'question' => 'Does this contain any code?',
                'answer' => "No, this is only the user interface."
            ])
        ]);

        $product5 = \App\Models\Product::factory()->create([
            'title' => 'Weather UI Kit',
            'slug' => 'weather-ui-kit',
            'price' => '1499',
            'description' => 'Create a weather app with this AMAZING looking UI! Created by https://dribbble.com/adam_sokolowski',
            'image' => 'https://portfolio-ecommerce-bucket.s3.us-east-2.amazonaws.com/product-images/Koz4B9DuT9lEpzPbmsV02Oq4E5XaW9qL93W4gHpp.png',
            'file' => 'product-files/pVshH1QjlMLKPJflEuoOZztpk51JlIA9KJpfXxeR.txt'
        ]);
        $product5->highlights()->saveMany([
            new \App\Models\Highlight(['content' => 'Variety of different UI!']),
            new \App\Models\Highlight(['content' => 'Clean looking UI kit!']),
            new \App\Models\Highlight(['content' => 'Ready for implementation!'])
        ]);
        $product5->faqs()->saveMany([
            new \App\Models\Faq([
                'question' => 'Does this contain any code?',
                'answer' => "No, this is only the user interface."
            ])
        ]);

        \App\Models\Role::create([
            'name' => 'user',
            'slug' => 'user'
        ]);
        $adminRole = \App\Models\Role::create([
            'name' => 'admin',
            'slug' => 'admin'
        ]);
        $admin = \App\Models\User::factory()->create([
            'name' => 'Site Admin',
            'email' => 'admin@admin.com',
            'stripe_id' => 'cus_KIyioQI6i39w5C'
        ]);
        $admin->roles()->attach($adminRole); 
    }
}
