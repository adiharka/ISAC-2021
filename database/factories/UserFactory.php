<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // return $this->afterMaking(function (User $user) {
            return [
            'teamname' => $this->faker->name(),
            'verified' => 1,
            'active' => 1,
            'email' => $this->faker->unique()->safeEmail(),
            // 'email_verified_at' => now(),
            'role' => 'olim',
            'password' => hash::make('a'), // password
            // 'remember_token' => Str::random(10),
        ];
        // })->afterCreating(function (User $user) {
        //     $user->email = $user->id;
        //     $user->save();
        // });
    }

    public function configure()
    {
        return $this->afterMaking(function (User $user) {
            //
        })->afterCreating(function (User $user) {
            $user->email = $user->id . '@gmail.com';
            $user->save();
        });
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
