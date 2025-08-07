<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'name' => 'user-list',
                'guard_name' => 'web'
            ],
            [
                'name' => 'user-create',
                'guard_name' => 'web'
            ],
            [
                'name' => 'user-edit',
                'guard_name' => 'web'
            ],
            [
                'name' => 'user-delete',
                'guard_name' => 'web'
            ],
            [
                'name' => 'activity-category-list',
                'guard_name' => 'web'
            ],
            [
                'name' => 'activity-category-create',
                'guard_name' => 'web'
            ],
            [
                'name' => 'activity-category-edit',
                'guard_name' => 'web'
            ],
            [
                'name' => 'activity-category-delete',
                'guard_name' => 'web'
            ],
            [
                'name' => 'activity-list',
                'guard_name' => 'web'
            ],
            [
                'name' => 'activity-create',
                'guard_name' => 'web'
            ],
            [
                'name' => 'activity-edit',
                'guard_name' => 'web'
            ],
            [
                'name' => 'activity-delete',
                'guard_name' => 'web'
            ],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
