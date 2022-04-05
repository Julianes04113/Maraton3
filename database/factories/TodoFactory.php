<?php

namespace Database\Factories;

use App\Constants\TodoStatus;
use Illuminate\Database\Eloquent\Factories\Factory;


class TodoFactory extends Factory
{
    public function definition(): Array
    {
        return [
            'title' => $this->faker->words(3, true),
            'description' => $this->faker->paragraph(),
            'created_at'=>$this->faker->dateTimeBetween($startDate = '-5 days', $endDate = 'now',$timezone='America/Bogota'),
            'status'=>$this->faker->randomElement((new TodoStatus())->toArray()),
        ];
    }
}
