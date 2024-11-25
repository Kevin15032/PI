<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class editarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('empresas')->insert([
            'nombreEmpresa' => 'Empresa Hernández',
            'telefonoEmpresa' => '4455667722',
            'direccionEmpresa' => 'Calle revolución 123, Querétaro, Querétaro',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
    }
}
