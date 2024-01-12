<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemPhoto extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'photo_url',
        'item_id',
    ];
}
