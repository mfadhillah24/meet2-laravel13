<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Organisasi;
use App\Models\OrganisasiLeader;

class OrganisasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          Organisasi::factory()->count(100)
          ->has(OrganisasiLeader::factory(), 'OrganisasiLeader')
          ->create();
    }
}
