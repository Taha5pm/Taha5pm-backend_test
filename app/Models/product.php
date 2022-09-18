<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

   public function suppliers()
    {
        return $this->belongsTo(supplier::class,'supplier_id');
    }


    public function items()
    {
        return $this->hasMany(item::class);
    }
}
