<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disposal extends Model
{
    protected $fillable=[

'request_date',
'request_by',
'request_summary',
'item_id',
'asset_tag',
'serial_number',

    ];
}
