<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        $empresaId = DB::table('empresas')->first()->id;
        $empleadoAdmin = DB::table('empleados')->where('puesto', 'Administrador')->first();
        $empleadoOperador = DB::table('empleados')->where('puesto', 'Operador de Grúa')->first();

        DB::table('usuarios')->insert([
            [
                'empresa_id' => $empresaId,
                'empleado_id' => $empleadoAdmin->id,
                'name' => 'Juan Carlos Pérez',
                'email' => 'admin@sigesga.com',
                'password' => Hash::make('password'),
                'password_reset_token' => null,
                'password_reset_expires_at' => null,
                'rol' => 'admin',
                'intentos_fallidos' => 0,
                'cuenta_bloqueada' => false,
                'bloqueada_en' => null,
                'desbloqueada_por' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'empresa_id' => $empresaId,
                'empleado_id' => null,
                'name' => 'Cotizador Sistema',
                'email' => 'cotizador@sigesga.com',
                'password' => Hash::make('password'),
                'password_reset_token' => null,
                'password_reset_expires_at' => null,
                'rol' => 'cotizador',
                'intentos_fallidos' => 0,
                'cuenta_bloqueada' => false,
                'bloqueada_en' => null,
                'desbloqueada_por' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'empresa_id' => $empresaId,
                'empleado_id' => $empleadoOperador->id,
                'name' => 'Roberto Méndez',
                'email' => 'operador@sigesga.com',
                'password' => Hash::make('password'),
                'password_reset_token' => null,
                'password_reset_expires_at' => null,
                'rol' => 'operador',
                'intentos_fallidos' => 0,
                'cuenta_bloqueada' => false,
                'bloqueada_en' => null,
                'desbloqueada_por' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
