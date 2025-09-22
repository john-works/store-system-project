<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable=[

'supplier_name',
'procurement_type',
'amount_cost',
'signing_date',
'start_date',
'end_date',
'procument_subject',
'termination_clauses',

    ];

}
