<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\PurchaseDetail;

class UpdatingProductController extends Controller
{
    public function updatingProduct(){

        $updates = DB::table('products')
        ->join('purchase_details', 'products.id', '=', 'purchase_details.product_id')
      
        ->select('products.*','purchase_details.*', 'products.productname', 'products.stocks', 'purchase_details.product_quantity')
        // ->where('products.productname', '=', 'purchases.product_name')

        ->get();


        return view('updating-product', compact('updates'));
    }



    public function editUpdatingProduct($id){

        // $data = Product::where('id', '=', $id)->first();
        $updates = DB::table('products')
        ->join('purchase_details', 'products.id', '=', 'purchase_details.product_id')
      
        ->select('products.*','purchase_details.*', 'products.productname', 'products.stocks', 'purchase_details.product_quantity')
        ->get();
        // dd('total');

        return view('edit-updating-product', compact('updates'));
    }




    public function updateStockProduct(Request $request){
        $request-> validate([
            'productname'=>'required',
            'stocks'=>'required',
            'product_quantity'=>'required'
    
        ]);


        $data = Product::find($request->id);

        // $data = DB::table('products')
        //     ->join('purchase_details', 'products.id', '=', 'purchase_details.product_id')
        //     ->where('products.stocks', '=', 'purchase_details.product_quantity')
        //     ->sum('purchase_details.product_quantity');
          
        
        // $data->products->stocks = number_format($data->stocks + $data->product_quantity);
    //    $data->save();

        return redirect()->back()->with('success','Product Updated Succesfuly');
    }

}
