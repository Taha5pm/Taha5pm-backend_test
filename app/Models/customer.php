<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $primaryKey = 'customer_id';
    use HasFactory;
    protected $fillable = ['name','email','password'];
    public function orders()
    {
        return $this->hasMany(order::class);
    }
}
