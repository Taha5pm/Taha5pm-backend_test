<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    public function customers()
    {
        return $this->belongsTo(customer::class,'customer_id');
    }

    public function items()
    {
        return $this->hasMany(item::class);
    }
}
