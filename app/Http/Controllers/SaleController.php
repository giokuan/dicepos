<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Product;
use App\Models\SaleDetail;

class SaleController extends Controller
{
    public function sellProduct(){
        $products = Product::get();
        return view('sell-product', compact('products'));
    }


    public function allSellProduct(){
        $sales = Sale::get();
        return view('all-sells-product', compact('sales'));
    }
    

    public function saveSellProduct(Request $request){
        $request-> validate([
            'productname'=>'required',
            'unit_price'=>'required',
            'product_quantity'=>'required',
            'product_description'=>'required',
            'customer'=>'required',
            'customer_id'=>'required',
         
        ]);
    
        $product_name = $request->productname;
        $unit_price= $request->unit_price;
        $product_quantity= $request->product_quantity;
        $product_description = $request->product_description;
        $customer = $request->customer;
        $customer_id = $request->customer_id;


        $prod = new Sale();
        $prod->product_name = $product_name;
        $prod->unit_price = $unit_price;
        $prod->product_quantity = $product_quantity;
        $prod->product_description = $product_description;
        $prod->customer = $customer;
        $prod->customer_id = $customer_id;
        $prod->save();


        $sell_detail = new SaleDetail();
        $sell_detail->sale_id = $prod->id;
        $sell_detail->product_id = $prod->product_name;
        $sell_detail->product_name = $prod->product_name;
        $sell_detail->product_quantity = $prod->product_quantity;
        $sell_detail->unit_price = $prod->unit_price;
        $sell_detail->total_price = number_format($prod->unit_price * $prod->product_quantity);
        $sell_detail->save();


        // $data = Product::find($request->product_name);
        // $data->stocks = number_format($data->stocks + $prod->product_quantity);

      

        return redirect()->back()->with('success','Product Sale Successfuly'); 
       
    }

}
