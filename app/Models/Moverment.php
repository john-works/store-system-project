<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Moverment extends Model
{
    protected $fillable=[
'request_date',
'request_by',
'request_summary',
'item_id',
<<<<<<< HEAD
=======
// 'asset_tag',
// 'serial_number',
>>>>>>> 706ab9a (New changes)
'from_department',
'to_department',
'user_id',
'supplier_id',
    ];

      public function item()
    {
        return $this->belongsTo(Item::class);
    }

<<<<<<< HEAD
    public function user()
    {
        return $this->belongsTo(User::class);
    }

=======
>>>>>>> 706ab9a (New changes)
}
