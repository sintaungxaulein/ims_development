<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseOrderImage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'photo_url',
        'purchase_order_id',
    ];
}
