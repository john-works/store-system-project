<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    protected $fillable=[
'supplier_name',
'request_date',
'request_by',
'verified_by',
'invoice_number',
'service_description',
'quality',

];
}
