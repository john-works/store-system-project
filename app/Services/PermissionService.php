<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Cache;

class PermissionService
{
    /**
     * Cache key prefix for user permissions
     */
    private const CACHE_PREFIX = 'user_permissions:';

    /**
     * Cache duration in seconds (1 hour)
     */
    private const CACHE_DURATION = 3600;

    /**
     * Check if a user has permission for a resource/action
     * ✅ Uses caching to reduce database queries
     * 
     * @param User $user
     * @param string $resource
     * @param string|array $action
     * @return bool
     */
    public function hasPermission(User $user, string $resource, string|array $action): bool
    {
        // Admin always has permission
        if ($user->role === 'admin') {
            return true;
        }

        // Get cached permissions
        $permissions = $this->getCachedPermissions($user);

        // Convert action to array
        $actions = is_array($action) ? $action : [$action];

        // Check if user has ANY of the given actions for the resource
        foreach ($actions as $act) {
            if ($this->hasPermissionInCache($permissions, $resource, $act)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Get cached permissions for a user
     * ✅ Loads all permissions once and caches them
     * 
     * @param User $user
     * @return array
     */
    private function getCachedPermissions(User $user): array
    {
        $cacheKey = self::CACHE_PREFIX . $user->id;

        return Cache::remember($cacheKey, self::CACHE_DURATION, function () use ($user) {
            return $user->permissions()
                ->where('allowed', true)
                ->get()
                ->groupBy('resource')
                ->map(function ($resourcePermissions) {
                    return $resourcePermissions->pluck('action')->toArray();
                })
                ->toArray();
        });
    }

    /**
     * Check if a permission exists in cached permissions
     * 
     * @param array $permissions
     * @param string $resource
     * @param string $action
     * @return bool
     */
    private function hasPermissionInCache(array $permissions, string $resource, string $action): bool
    {
        return isset($permissions[$resource]) && 
               in_array($action, $permissions[$resource]);
    }

    /**
     * Invalidate user's permission cache
     * ✅ Call this after updating permissions
     * 
     * @param int $userId
     * @return void
     */
    public function invalidateCache(int $userId): void
    {
        Cache::forget(self::CACHE_PREFIX . $userId);
    }

    /**
     * Invalidate all permission caches
     * ✅ Call this during permission sync or bulk updates
     * 
     * @return void
     */
    public function invalidateAllCaches(): void
    {
        Cache::tags(['permissions'])->flush();
    }
}
