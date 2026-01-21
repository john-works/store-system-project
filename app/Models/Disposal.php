<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disposal extends Model
{
    protected $fillable=[
'user_id',
'request_date',
'request_by',
'request_summary',
'item_id',
'asset_tag',
'serial_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function item()
        {
            return $this->belongsTo(Item::class); // Or HasOne, HasMany, BelongsToMany, etc.
        }
}
