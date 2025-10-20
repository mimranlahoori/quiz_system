<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Quiz;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // 🔹 Step 1: Create Categories (Parent + Child)
        $parentCategories = collect([
            ['slug' => 'general-knowledge', 'cate_name' => 'General Knowledge'],
            ['slug' => 'islamic', 'cate_name' => 'Islamic Studies'],
            ['slug' => 'science', 'cate_name' => 'Science'],
            ['slug' => 'history', 'cate_name' => 'History'],
        ]);

        foreach ($parentCategories as $parent) {
            $parentCat = Category::create($parent);

            // create 2 child categories
            for ($i = 1; $i <= 2; $i++) {
                Category::create([
                    'slug' => $parent['slug'] . '-sub-' . $i,
                    'cate_name' => $parent['cate_name'] . ' - Level ' . $i,
                    'cate_parent_id' => $parentCat->id,
                ]);
            }
        }

        // 🔹 Step 2: Create 3 Quizzes
        for ($q = 1; $q <= 3; $q++) {
            $quiz = Quiz::create([
                'title' => "Quiz No. {$q} - " . $faker->words(3, true),
                'total_questions' => 55,
                'max_skips' => 5,
            ]);

            // Attach multiple categories (2 random)
            $randomCategories = Category::inRandomOrder()->take(2)->pluck('id');
            $quiz->categories()->attach($randomCategories);

            // 🔹 Step 3: Create 55 Random Questions per Quiz
            for ($i = 1; $i <= 55; $i++) {
                $options = [
                    'a' => ucfirst($faker->word()),
                    'b' => ucfirst($faker->word()),
                    'c' => ucfirst($faker->word()),
                    'd' => ucfirst($faker->word()),
                ];

                // Random correct option from A-D
                $correct = array_rand($options);

                $quiz->questions()->create([
                    'question_text' => ucfirst($faker->sentence(8)),
                    'option_a' => $options['a'],
                    'option_b' => $options['b'],
                    'option_c' => $options['c'],
                    'option_d' => $options['d'],
                    'correct_option' => $correct,
                ]);
            }
        }

        $this->command->info('✅ Quizzes with multiple categories & random questions created successfully!');
    }

}
