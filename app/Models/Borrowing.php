<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; 

class Borrowing extends Model
{
    protected $fillable=[
'request_date',
'request_by',
'request_summary',
'item_id',
'asset_tag',
'serial_number',




    ];

     public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
