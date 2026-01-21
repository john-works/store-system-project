<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable=[
'user_id',
'supplier_id',
'procurement_type',
'amount_cost',
'signing_date',
'start_date',
'end_date',
'procument_subject',
'termination_clauses',
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
