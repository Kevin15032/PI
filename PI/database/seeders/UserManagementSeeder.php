<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserManagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('_user_management')->insert([
            [
                'nombre' => 'Vanessa Martínez',
                'correo' => 'vanessam@gmail.com',
                'rol' => 'Administrador',
            ],[
                'nombre' => 'Kevin Torres',
                'correo' => 'kevint@gmail.com',
                'rol' => 'Superadministrador',
            ],[
                'nombre' => 'Maria Cruz',
                'correo' => 'mariac@gmail.com',
                'rol' => 'Usuario',
            ]]);
    }
}
