<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            ['id' => 1, 'role' => 'superadmin'],
            ['id' => 101, 'role' => 'realisasi'],
            ['id' => 102, 'role' => 'sdm'],
            ['id' => 103, 'role' => 'biro_mkos'],
            ['id' => 104, 'role' => 'notulensi'],
            ['id' => 105, 'role' => 'unit'],
            ['id' => 106, 'role' => 'rapim'],
            ['id' => 107, 'role' => 'bpjs'],
            ['id' => 200, 'role' => 'view_only'],
            ['id' => 201, 'role' => 'view_kemenkeu'],
            ['id' => 202, 'role' => 'view_bpjs'],
        ];

        foreach ($roles as $r) {
            Role::updateOrCreate(
                ['id' => $r['id']],       // cek berdasarkan id
                ['role' => $r['role']]     // update role jika id sudah ada
            );
        }
    }
}
