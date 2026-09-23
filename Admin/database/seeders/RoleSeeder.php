<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                "name" => 'Super Admin',
                "guard_name" => 'web',
                "permissions" => [1, 2, 3, 4, 5]
            ],
            [
                "name" => 'Administrator',
                "guard_name" => 'web',
                "permissions" => [1, 2, 3, 4, 5]
            ],
        ];

        foreach ($roles as $role) {
            $input = [
                'name' => $role['name'],
                'guard_name' => $role['guard_name'] ?? 'web'
            ];
            $new = Role::create($input);

            $new->syncPermissions($role['permissions']);
        }
    }
}
