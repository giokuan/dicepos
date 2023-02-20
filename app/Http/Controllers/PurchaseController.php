<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Product;
use App\Models\PurchaseDetail;
use Illuminate\Support\Facades\DB;


class PurchaseController extends Controller
{
    public function purchaseProduct(){
        $products = Product::get();
        return view('purchase-product', compact('products'));
    }

    public function allPurchaseProduct(){
        $purchases = Purchase::get();
        return view('all-purchase-product', compact('purchases'));
    }


    public function allProduct(){
        $products = Product::get();
        return view('purchase-product', compact('products'));
    }

   
    public function editPurchaseProduct($id){
        $products = Product::get();
        $data = Purchase::where('id', '=', $id)->first();
      
        return view('edit-purchase-product', compact('data', 'products'));
    }




    public function savePurchaseProduct(Request $request){
        $request-> validate([
            'productname'=>'required',
            'unit_cost'=>'required',
            'product_quantity'=>'required',
            'product_description'=>'required',
            'supplier'=>'required',
            'supplier_id'=>'required',
         
        ]);
    
        $product_name = $request->productname;
        $unit_cost= $request->unit_cost;
        $product_quantity= $request->product_quantity;
        $product_description = $request->product_description;
        $supplier = $request->supplier;
        $supplier_id = $request->supplier_id;


        $prod = new Purchase();
        $prod->product_name = $product_name;
        $prod->unit_cost = $unit_cost;
        $prod->product_quantity = $product_quantity;
        $prod->product_description = $product_description;
        $prod->supplier = $supplier;
        $prod->supplier_id = $supplier_id;
        $prod->save();


        $pur_detail = new PurchaseDetail();
        $pur_detail->purchase_id = $prod->id;
        $pur_detail->product_id = $prod->product_name;
        $pur_detail->product_name = $prod->product_name;
        $pur_detail->product_quantity = $prod->product_quantity;
        $pur_detail->unit_cost = $prod->unit_cost;
        $pur_detail->total_cost = number_format($prod->unit_cost * $prod->product_quantity);
        $pur_detail->save();


        // $data = Product::find($request->product_name);
        // $data->stocks = number_format($data->stocks + $prod->product_quantity);

      

        return redirect()->back()->with('success','Purchase Successfuly'); 
       
    }



    public function updatePurchaseProduct(Request $request){
        $request-> validate([
            'product_name'=>'required',
            'unit_cost'=>'required',
            'product_quantity'=>'required',
        ]);

        $data = Purchase::find($request->id);

        $data->product_name = $request->product_name;
        $data->unit_cost = $request->unit_cost;
        $data->product_quantity = $request->product_quantity;
        $data->save();

        return redirect()->back()->with('success','Purchases Updated Succesfuly');

    }

}


   //     $data2 = DB::table('products')
    //     ->where('id', '=', '$request->product_name')
    //     ->get();
    //    $data2->stocks = number_format($data2->stocks + $request->product_quantity);
    //    $data2->save();