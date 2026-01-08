<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $guarded = [];

    // Each permission belongs to one user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
