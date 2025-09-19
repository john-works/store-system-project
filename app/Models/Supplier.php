<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable=[


    'supplier_name',
    'email',
    'phone',
    'address',
    'tin',
    'type_of_good',
  'bank_account',
    ];
}
