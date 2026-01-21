<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class ResourceAuthorizationService
{
    /**
     * Apply authorization filters to a query based on user role and department
     * 
     * ✅ Admin: See all records from all departments
     * ✅ Manager: See all records from their department
     * ✅ Senior Officer: See only their own records
     * ✅ Officer: See only their own records
     */
    public static function filterByUserRole(Builder $query, User $user, string $userColumn = 'user_id', string $deptColumn = 'department'): Builder
    {
        if ($user->role === 'admin') {
            // Admin sees everything
            return $query;
        }

        if ($user->role === 'manager') {
            // Manager sees all requests from their department
            return $query->whereHas('user', function ($userQuery) use ($user, $deptColumn) {
                $userQuery->where($deptColumn, $user->department);
            });
        }

        // Senior Officer and Officer see only their own
        return $query->where($userColumn, $user->id);
    }
}
