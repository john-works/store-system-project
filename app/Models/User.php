<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
        'role',
        'department',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /* ===============================
       RELATIONSHIPS
    =============================== */
    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }

    /* ===============================
       PERMISSION CHECK
       Accepts a string or an array of actions
    =============================== */
    public function hasPermission(string $resource, string|array $action): bool
    {
        // Convert $action to an array if it isn't already
        $actions = is_array($action) ? $action : [$action];

        // Check if the user has any of the given actions for the resource
        foreach ($actions as $act) {
            if ($this->permissions()->where('resource', $resource)->where('action', $act)->exists()) {
                return true;
            }
        }

        return false;
    }


    
}
