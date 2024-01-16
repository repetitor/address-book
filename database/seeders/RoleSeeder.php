<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'id' => RoleEnum::ADMIN,
                'slug' => strtolower(RoleEnum::ADMIN->name),
            ],
            [
                'id' => RoleEnum::AUTHOR,
                'slug' => strtolower(RoleEnum::AUTHOR->name),
            ],
        ]);
    }
}
