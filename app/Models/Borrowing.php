<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    protected $fillable=[
        'request_date',
'request_by',
'request_summary',
'item_name',
'asset_tag',
'comment',
'status',
''
    ];
}
