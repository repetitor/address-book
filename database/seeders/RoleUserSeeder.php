<?php

namespace Database\Seeders;

use App\DTO\User\UserDtoFactory;
use App\Enums\RoleEnum;
use App\Services\UserService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userDto = (new UserDtoFactory())->fromArray([
            'name' => config('settings.admin.name'),
            'email' => config('settings.admin.email'),
            'password' => Hash::make(config('settings.admin.password')),
        ]);

        DB::transaction(function () use ($userDto) {
            $userAdmin = (new UserService())->store($userDto);
            DB::table('role_user')->insert([
                'role_id' => RoleEnum::ADMIN,
                'user_id' => $userAdmin->id,
            ]);
        });
    }
}
