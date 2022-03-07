<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::create([
            'nombre' => 'Guitarra acustica',
            'descripcion' => 'Marca Gibson',
            'precio' => 800000,
            'imagen' => '20220306054856.jpg',
            'estado' => 1,
        ]);

        Producto::create([
            'nombre' => 'Violin',
            'descripcion' => 'Marca Gibson',
            'precio' => 900000,
            'imagen' => '20220306055459.jpg',
            'estado' => 1,
        ]);

        Producto::create([
            'nombre' => 'Guitarra electrica',
            'descripcion' => 'Marca Gibson',
            'precio' => 900000,
            'imagen' => '20220306055457.jpg',
            'estado' => 0,
        ]);
    }
}
