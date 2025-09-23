<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Moverment extends Model
{
    protected $fillable=[
//         'request_date',
// 'request_by',
// 'request_summary',
// 'current_step',
// 'status',
'item_description',
'asset_tag',
'serial_number',
'from_department',
'from_user',
'to_department',
'to_user',
    ];
}
