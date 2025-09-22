<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    protected $fillable=[
'supplier_name',
'request_date',
'request_by',
'verified_by',
'invoice_number',
'item__description',
'quality',

    ];
}
