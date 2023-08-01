<?php

namespace Ejntaylor\Vellum\Database\Factories;

use Ejntaylor\Vellum\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;


class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'user_id' => 1,
            'category_id' => 1,
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'excerpt' => $this->faker->paragraph,
            'body' => $this->faker->paragraphs(5, true),
            'featured_image' => $this->faker->imageUrl(640, 480),
            'featured_image_caption' => $this->faker->sentence,
            'featured_image_alt' => $this->faker->sentence,
            'featured_image_credit' => $this->faker->name,
            'featured_image_credit_link' => $this->faker->url,
            'published_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
