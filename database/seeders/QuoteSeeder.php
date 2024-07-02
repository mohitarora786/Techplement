<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quote; // Import the Quote model
use Faker\Factory as Faker;

class QuoteSeeder extends Seeder
{
    public function run()
    {
        // Add predefined quotes
        Quote::create([
            'author' => 'Albert Einstein',
            'quote' => 'Life is like riding a bicycle. To keep your balance, you must keep moving.'
        ]);
        Quote::create([
            'author' => 'Isaac Newton',
            'quote' => 'If I have seen further it is by standing on the shoulders of Giants.'
        ]);

        // Add 100 fake quotes
        $faker = Faker::create();
        
        for ($i = 0; $i < 100; $i++) {
            Quote::create([
                'author' => $faker->name,
                'quote' => $faker->sentence
            ]);
        }
    }
}
