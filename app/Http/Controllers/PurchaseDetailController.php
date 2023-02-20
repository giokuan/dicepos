<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseDetail;
use App\Models\Product;


class PurchaseDetailController extends Controller
{
    public function allPurchaseDetails(){
        $purchase_details = PurchaseDetail::get();
      
        return view('all-purchase-detail', compact('purchase_details'));
    }



    public function editProduct($id){
        $data_pur = PurchaseDetail::where('id', '=', $id)->first();
      
        return view('edit-product', compact('data_pur'));
    }


}
