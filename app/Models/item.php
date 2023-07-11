<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    use HasFactory;
    protected $primaryKey = 'item_id';
    protected $fillable = ['supplier_product_id','order_id','quantity','total_price'];

    public function orders()
    {
        return $this->belongsTo(order::class);
    }

    public function supplier_products()
    {
        return $this->belongsTo(supplier_product::class);
    }
}
