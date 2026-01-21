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
       ✅ Optimized: Single query instead of N+1
       ✅ Checks 'allowed' field
       ✅ Admins bypass all permission checks
    =============================== */
    public function hasPermission(string $resource, string|array $action): bool
    {
        // ✅ Admin users bypass ALL permission checks
        if ($this->role === 'admin') {
            return true;
        }

        // Convert $action to an array if it isn't already
        $actions = is_array($action) ? $action : [$action];

        // Single query: Check if user has ANY of the given actions for the resource
        return $this->permissions()
            ->where('resource', $resource)
            ->whereIn('action', $actions)
            ->where('allowed', true)  // ✅ Only check allowed=true permissions
            ->exists();
    }


    
}
