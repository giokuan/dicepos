<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SaleDetail;

class SaleDetailController extends Controller
{
    public function allSaleDetail(){
        $sale_details = SaleDetail::get();
      
        return view('all-sells-detail', compact('sale_details'));
    }
}