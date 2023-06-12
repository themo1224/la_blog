<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */



    public function definition()
    {
        $type = ['jpg', 'jpeg','png', 'mp4' ];
        $random_type= $this->faker->randomElements($type);
        return [
            'title'=>$this->faker->title,
            'type'=>implode(',' , $random_type),
            'path'=>$this->faker->sentence,
            'size'=>$this->faker->numberBetween(1,60),
        ];
    }
}
