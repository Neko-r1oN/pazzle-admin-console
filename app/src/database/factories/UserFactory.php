<?php

    namespace Database\Factories;


    use Illuminate\Database\Eloquent\Factories\Factory;

    /**
     * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
     */
    class UserFactory extends Factory
    {
        /**
         * Define the model's default state.
         *
         * @return array<string, mixed>
         */


        public function definition(): array
        {
            $scheduled_Date = $this->faker->dateTimeBetween("+1day", '+1year');
            return [
                'name' => $this->faker->unique()->name(),
                'level' => $this->faker->numberBetween(1, 100),
                'password' => $this->faker->password(),
                'exp' => $this->faker->randomNumber(5),
                'life' => $this->faker->randomNumber(1),
                'created_at' => $scheduled_Date->format('Y-m-d H:i:s'),
                'updated_at' => $scheduled_Date->modify('+1hour')->format('Y-m-d H:i:s')

            ];
        }
    }
