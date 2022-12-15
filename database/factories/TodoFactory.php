<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\models\Todo;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Todo::class;
    public function definition()
    { //faker sudah include tidak perlu mengimportnya lagi
        return [
            'todo'=>$this->faker->sentence(6)
        ];
    }
}
