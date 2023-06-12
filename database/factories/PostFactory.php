<?php

namespace Database\Factories;
use App\Models\Media;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Post::class;

    public function definition()
    {
//        $keywords = $this->faker->words(3); // Generate an array of 3 random words

        return [
            'title' => $this->faker->title,
            'content' => $this->faker->sentence,
            'view' => $this->faker->numberBetween(0, 1000),
            'slug' => $this->faker->slug,
            'meta_title'=>$this->faker->title,
            'meta_desc'=>$this->faker->paragraph,
            'meta_keyword'=>$this->faker->sentence,
//            'meta_keyword'=> implode(', ', $keywords),

            'media_id' => Media::factory()->create()->id,
            'user_id' => User::factory()->create()->id,


        ];
    }
}
