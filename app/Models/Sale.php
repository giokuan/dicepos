<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = [

        'customer_id',
        'product_name',
        'product_quantity',
        'unit_price',
        'product_description',
        'customer',
   
    ];

    public function sale_details(){
        return $this->hasMany(SaleDetail::class);
        
    }

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('id', 'like', '%'.$search.'%')
                ->orWhere('product_name', 'like', '%'.$search.'%')
                ->orWhere('product_description', 'like', '%'.$search.'%')
                ->orWhere('customer_id', 'like', '%'.$search.'%');
                // ->orWhere('section', 'like', $search);
    }
}
