<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplier_product extends Model
{
    protected $primaryKey = 'supplier_product_id';
    use HasFactory;
    protected $fillable = ['supplier_product_id','s_serial_number','p_serial_number','quantity'];
    public function suppliers()
    {
        return $this->belongsTo(supplier::class);
    }

     public function products()
    {
        return $this->belongsTo(product::class);
    }
    public function items()
    {
        return $this->belongsTo(item::class);
    }
}
