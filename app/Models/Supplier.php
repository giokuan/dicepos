<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table ='suppliers';
    protected $fillable = [

        'suppliername',
        'contact',
        'address',

    ];

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('id', 'like', '%'.$search.'%')
                ->orWhere('suppliername', 'like', '%'.$search.'%')
                ->orWhere('contact', 'like', '%'.$search.'%')
                ->orWhere('address', 'like', '%'.$search.'%');
              
    }

    public function purchases(){
        return $this->hasMany(Purchase::class);
        
    }

}
