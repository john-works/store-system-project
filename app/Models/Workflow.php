<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workflow extends Model
{
    protected $fillable=[
        
'user_id',
'is_completed',
'date_completed',
'approved_status',
'workflow_step_id',

    ];
}
