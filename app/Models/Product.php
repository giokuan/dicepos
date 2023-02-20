<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table ='products';
    protected $fillable = [

        'productname',
        'description',
        'stocks',
        'cost',
        'price',
        'supplier',
        // 'supplier_id'
   
       
   
    ];

    // public function supplier()
    // {

    //     return $this->belongsTo(Supplier::class, 'id');
    // }
    public function purchase_details(){
        return $this->hasMany(PurchaseDetail::class);
        
    }

    public function sale_details(){
        return $this->hasMany(SaleDetail::class);
        
    }
    
    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('id', 'like', '%'.$search.'%')
                ->orWhere('productname', 'like', '%'.$search.'%')
                ->orWhere('description', 'like', '%'.$search.'%')
                ->orWhere('supplier', 'like', '%'.$search.'%');
                // ->orWhere('section', 'like', $search);
    }
}
