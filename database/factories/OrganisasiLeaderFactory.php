<?php

namespace Database\Factories;

use App\Models\OrganisasiLeader;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<OrganisasiLeader>
 */
class OrganisasiLeaderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'leader_name' => fake()->name(),
        ];
    }
}
