<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;

class MigrateUserRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // First make sure roles exist
        $this->createRoles();

        // Get all users
        $users = User::all();

        foreach ($users as $user) {
            // Get the role name from the old column
            $oldRole = $user->role;

            // Get the corresponding role from the new roles table
            $role = Role::where('name', strtolower($oldRole))->first();

            // If the role exists, assign it to the user
            if ($role) {
                DB::table('role_user')->insert([
                    'user_id' => $user->id,
                    'role_id' => $role->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

    /**
     * Create default roles if they don't exist
     */
    private function createRoles()
    {
        $roles = [
            ['name' => 'admin', 'display_name' => 'Administrator'],
            ['name' => 'candidate', 'display_name' => 'Candidate'],
            ['name' => 'candidat', 'display_name' => 'Candidat'], // For backward compatibility
            ['name' => 'evaluator', 'display_name' => 'Evaluator'],
        ];

        foreach ($roles as $role) {
            if (!Role::where('name', $role['name'])->exists()) {
                Role::create($role);
            }
        }
    }

    /**
     * Reverse the migrations.
     * This can't be fully reversed automatically
     *
     * @return void
     */
    public function down()
    {
        // This migration can't be reversed automatically
        // You would need to manually handle this
    }
}
