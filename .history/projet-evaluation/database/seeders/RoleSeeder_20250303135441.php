<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'admin',
                'display_name' => 'Administrator',
                'description' => 'System Administrator'
            ],
            [
                'name' => 'candidate',
                'display_name' => 'Candidate',
                'description' => 'Regular candidate user'
            ],
            [
                'name' => 'evaluator',
                'display_name' => 'Evaluator',
                'description' => 'User who evaluates candidates'
            ]
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
