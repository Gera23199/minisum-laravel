<?php

namespace Database\Seeders;
use App\Models\Operacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OperacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Operacion::factory()->count(3000)->create();
    }
}
