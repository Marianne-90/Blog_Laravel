<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Curso;

class Curso_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $curso = new Curso();

        $curso->name = "Laravel";
        $curso->description = "El mejor famework del mundo";
        $curso->categoria = "Desarrollo web";

        $curso->save();
    }
}
