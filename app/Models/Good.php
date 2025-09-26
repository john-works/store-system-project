<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    protected $fillable=[
'supplier_id',
'request_date',
'request_by',
'invoice_number',
'invoice_value',
'request_item',
'item__description',
'quality',
'request_summary',

    ];

     public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
