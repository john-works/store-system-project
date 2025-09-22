<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
     protected $fillable=[
'supplier_name',
'received_date',
'invoice_number',
'invoice_date',
'invoice_description',
'received_amount',
'invoice_currency',
'invoice_date',
 ];
}
