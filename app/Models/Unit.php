<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
class Unit extends Model
{
    use HasFactory,  SoftDeletes;

    protected $fillable = [
        'name',
        'description',
    ];

    public function item(): HasOne
    {
        return $this->hasOne(Item::class);
    }
}
