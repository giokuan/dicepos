<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $fillable = [

        'supplier_id',
        'product_name',
        'product_quantity',
        'unit_cost',
        'product_description',
        'supplier',
   
    ];

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class);
    }


    public function purchase_details(){
        return $this->hasMany(PurchaseDetail::class);
        
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
