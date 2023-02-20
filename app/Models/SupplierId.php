<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierId extends Model
{
    use HasFactory;
    protected $fillable = ['supplier_id', 'supplier_name'];



    public function purchases(){
        return $this->hasMany(Purchase::class);
        
    }
}
