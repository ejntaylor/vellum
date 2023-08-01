<?php

namespace Ejntaylor\Vellum\Database\Factories;

use Ejntaylor\Vellum\Models\Category;
use Ejntaylor\Vellum\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;


class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'body' => $this->faker->paragraphs(5, true),
        ];
    }
}
