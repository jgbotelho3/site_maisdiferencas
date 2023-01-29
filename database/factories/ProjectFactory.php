<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $category_id = [8,9,27];
        return [
            'name' => $this->faker->name(),
            'category_id' => $this->faker->randomElement($category_id),
            'content' => $this->faker->text(),
            'image' => $this->faker->imageUrl(640,480)
        ];
    }
}
