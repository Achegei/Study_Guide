<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Role;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run(): void
    {
        DB::table('roles')->insertOrIgnore([
            ['id' => 1, 'name' => 'admin', 'display_name' => 'Super Admin'],
            ['id' => 2, 'name' => 'user', 'display_name' => 'User'],
        ]);
    }
}
