<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(10)->create();

        $testUser = User::factory()->create([
            'name' => 'Test User',
            'email' => 'i@test.com',
        ]);

        $users->push($testUser);

        $categories = Category::factory(4)->create();

        $questions = Question::factory(30)->create([
            'category_id' => fn() => $categories->random()->id,
            'user_id' => fn() => $users->random()->id,
        ]);

        $answers = Answer::factory(30)->create([
            'question_id' => fn() => $questions->random()->id,
            'user_id' => fn() => $users->random()->id,
        ]);

        Comment::factory(100)->create([
            'user_id' => fn() => $users->random()->id,
            'commentable_id' => fn() => $answers->random()->id,
            'commentable_type' => Answer::class,
        ]);

        Comment::factory(100)->create([
            'user_id' => fn() => $users->random()->id,
            'commentable_id' => fn() => $questions->random()->id,
            'commentable_type' => Question::class,
        ]);
    }
}