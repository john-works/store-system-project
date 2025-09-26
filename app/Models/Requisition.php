<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requisition extends Model
{
    protected $fillable=[
'request_date',
'request_by',
'request_summary',
'item_name',
'current_step',
'status',
    ];
}
