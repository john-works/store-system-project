<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    protected $fillable=[
'supplier_id',
'request_date',
'request_by',
'verified_by',
'invoice_number',
'item__description',
'quality',

    ];

     public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
