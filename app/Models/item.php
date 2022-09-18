<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    use HasFactory;

    public function orders()
    {
        return $this->belongsTo(order::class,'order_id');
    }

    public function products()
    {
        return $this->belongsTo(product::class,'product_id');
    }
}
