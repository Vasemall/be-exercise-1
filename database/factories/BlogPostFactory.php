<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogPost>
 */
class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
		...

'title' => $this->faker->sentence, //Generates a fake sentences
'body' => $this->faker->paragraph(30), //generates fake 30 paragraphs
'user_id' => User::factory() //Generates a User from factory and extracts id

...
            //
        ];
    }
}
