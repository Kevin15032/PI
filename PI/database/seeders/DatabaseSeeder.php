<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(GestionProductosSeeder::class); // Gestion de productos
        $this->call(ProveedoresSeeder::class); // Proveedores
        $this->call(RolesTableSeeder::class); // Roles
        $this->call(editarSeeder::class); // Editar Seeder 
    }
}
?>
