<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    protected $fillable=[
'user_id',
'supplier_id',
'request_date',
'request_by',
'invoice_number',
'invoice_value',
'request_item',
'item__description',
'request_summary',
];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function workflows()
    {
        return $this->morphMany(\App\Models\Workflow::class, 'workflowable');
    }
}
