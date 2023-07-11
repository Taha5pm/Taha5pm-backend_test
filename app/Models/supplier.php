<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class supplier extends Authenticatable
{

    use HasFactory;
    protected $primaryKey = 's_serial_number';
    protected $fillable = ['name','speciality','phonenumber','email','password','role'];

      public function supplier_products()
    {
        return $this->hasMany(supplier_product::class);
    }
}
