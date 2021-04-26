<?php

namespace Database\Factories;

use App\Models\VideoStream;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VideoStreamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = VideoStream::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'description' => $this->faker->text,
            'key' => Str::random(10),
            'finish' => false,
            'user_id' => 1,
        ];
    }
}
