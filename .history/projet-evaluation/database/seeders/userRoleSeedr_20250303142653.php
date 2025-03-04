<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class userRoleSeedr extends Seeder
{
    <?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder
{
    public function run()
    {
        // First, make sure we have the roles
        $this->call(RoleSeeder::class);

        // Get all users
        $users = User::all();

        foreach ($users as $user) {
            $roleName = $user->role ?? 'candidat'; // Use existing role attribute or default to 'candidat'

            // Find the corresponding role in the roles table
            $role = Role::where('name', $roleName)->first();

            // If role exists, create the relationship
            if ($role) {
                // Prevent duplicates
                if (!DB::table('role_user')->where('user_id', $user->id)->where('role_id', $role->id)->exists()) {
                    DB::table('role_user')->insert([
                        'user_id' => $user->id,
                        'role_id' => $role->id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
