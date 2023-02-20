<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    use HasFactory;
    protected $fillable = [

        'sale_id',
        'product_id',
        'product_name',
        'product_quantity',
        'unit_price',
        'total_price',
    ];

    public function sales()
    {
        return $this->belongsTo(Sale::class);
    }


    public function products()
    {
        return $this->belongsTo(Product::class);
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
