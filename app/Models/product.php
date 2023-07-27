<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $primaryKey = 'p_serial_number';
    protected $fillable = ['p_serial_number', 'name', 'description', 'model', 'quantity', 'price'];
}
