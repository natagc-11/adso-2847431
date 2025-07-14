<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = fake()->randomElement(['Female', 'Male']);
        $name = ($gender == 'Female') ? fake()->firstNameFemale() : fake()->firstNameMale();
        $id = fake()->numerify('75######');

        // Descargar imagen de avatar desde un servicio confiable
        try {
            copy('https://i.pravatar.cc/150?u=' . $id, public_path('images/' . $id . '.png'));
        } catch (\Exception $e) {
            // En caso de error, se puede asignar una imagen por defecto o dejarla vacía
            $id = 'default';
        }

        return [
            'document'          => $id,
            'fullname'          => $name . " " . fake()->lastName(),
            'gender'            => $gender,
            'birthdate'         => fake()->dateTimeBetween('1974-01-01', '2004-12-31'),
            'photo'             => $id . '.png',
            'email'             => fake()->unique()->safeEmail(),
            'phone'             => fake()->numerify('320#######'),
            'email_verified_at' => now(),
            'password'          => static::$password ??= Hash::make('12345'),
            'remember_token'    => Str::random(10),
        ];
    }


    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}