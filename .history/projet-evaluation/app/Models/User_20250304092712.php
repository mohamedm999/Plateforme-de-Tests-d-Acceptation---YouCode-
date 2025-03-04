<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'role',
        'is_active'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }


    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function hasRole($roleName)
    {
        // Use the new relationship-based approach
        return $this->roles->pluck('name')->contains($roleName);
    }


    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }


    /**
     * Assign a role to the user
     *
     * @param string|\App\Models\Role $role
     * @return mixed
     */
    public function assignRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('name', $role)->first();
        }

        if ($role) {
            return $this->roles()->syncWithoutDetaching($role);
        }

        return false;
    }

    public function hasAnyRole($roleNames)
    {
        if (is_string($roleNames)) {
            $roleNames = [$roleNames];
        }

        return $this->roles->pluck('name')->intersect($roleNames)->isNotEmpty();
    }
}
