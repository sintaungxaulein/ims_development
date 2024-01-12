<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseOrder extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'serial_no', 'suppliers_id',
         'shipping_methods_id', 'delivery_date',
         'payment_terms', 'due_date', 'users_id', 'total_amount'
    ];
}
