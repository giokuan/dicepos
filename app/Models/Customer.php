<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table ='customers';
    protected $fillable = [

        'customername',
        'contact',
        'address',

    ];

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('id', 'like', '%'.$search.'%')
                ->orWhere('customername', 'like', '%'.$search.'%')
                ->orWhere('contact', 'like', '%'.$search.'%')
                ->orWhere('address', 'like', '%'.$search.'%');
              
    }
}
