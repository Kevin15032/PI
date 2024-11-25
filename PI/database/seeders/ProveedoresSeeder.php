<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProveedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('proveedores')->insert([
            [
                'nombre' => 'Proveedor Uno',
                'email' => 'contacto@proveedoruno.com',
                'telefono' => '1234567890',
                'direccion' => 'Calle Principal #123',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nombre' => 'Proveedor Dos',
                'email' => 'ventas@proveedordos.com',
                'telefono' => '0987654321',
                'direccion' => 'Avenida Central #456',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nombre' => 'Proveedor Tres',
                'email' => 'info@proveedortres.com',
                'telefono' => '1122334455',
                'direccion' => 'Boulevard Secundario #789',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
