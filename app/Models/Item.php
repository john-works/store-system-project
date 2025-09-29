<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
   
{
    protected $fillable=[

        'supplier_id',
'item_name',
'unit_of_measure',
'serier_number',
'asset_tag',
'date_delivered',
'expiry_date',
'qty',
    ];


public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    
     public function requisition()
    {
        return $this->belongsTo(Requisition::class);
    }


     public function borrowing()
    {
        return $this->belongsTo(Borrowing::class);
    }
}
