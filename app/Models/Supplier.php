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


         // Supplier has many contracts
    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }


     // items 
    public function items()
    {
        return $this->hasMany(Item::class);
    }


     // services 
    public function services()
    {
        return $this->hasMany(servise::class);
    }

     // goods 
    public function goods()
    {
        return $this->hasMany(Good::class);
    }
}
