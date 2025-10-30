<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkflowStep extends Model
{
    //

    protected $fillable=[
'step_name',
'description',
'step_order',
    ];
}
