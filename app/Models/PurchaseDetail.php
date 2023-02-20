<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    use HasFactory;

    protected $fillable = [

        'purchase_id',
        'product_id',
        'product_name',
        'product_quantity',
        'unit_cost',
        'total_cost',
    ];

    
    public function purchases()
    {
        return $this->belongsTo(Purchase::class);
    }


    public function products()
    {
        return $this->belongsTo(Products::class);
    }


    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('id', 'like', '%'.$search.'%')
                ->orWhere('product_name', 'like', '%'.$search.'%')
                ->orWhere('product_description', 'like', '%'.$search.'%')
                ->orWhere('supplier_id', 'like', '%'.$search.'%');
                // ->orWhere('section', 'like', $search);
    }

}
