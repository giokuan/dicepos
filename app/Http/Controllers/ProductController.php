<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\PurchaseDetail;
use Illuminate\Support\Facades\DB;





class ProductController extends Controller
{
    public function addProduct(){

        return view('add-product');
    }


      
 
    public function editProduct($id){

        // $data_product = DB::table('products')
        // ->join('purchase_details', 'products.id', '=', 'purchase_details.product_id')
      
        // ->select('products.*','purchase_details.*', 'products.productname', 'products.stocks', 'purchase_details.product_quantity')
        // ->where('products.id', '=', 'purchases.product_id')
        // ->get();

        $data_product = Product::where('id', '=', $id)->first();
      
        return view('edit-product-stock', compact('data_product'));

    }



    public function allProduct(){
        // $products = Product::get();

        $products = DB::table('purchase_details')
        ->join('products', 'purchase_details.product_id', '=', 'products.id')
      
        ->select('products.*','purchase_details.*', 'products.productname', 'products.stocks', 'purchase_details.product_quantity')
        ->where('products.id', '=', 'purchase_details.product_id')
        ->get();
      
        return view('all-product', compact('products'));
    }


    
    public function deleteProduct($id){
        Product::where('id', '=', $id)->delete();
        return redirect()->back()->with('success','Product deleted Succesfuly');
    }



    public function saveProduct(Request $request){
        $request-> validate([
            'productname'=>'required',
            'description'=>'required',
            'stocks'=>'required',
            'cost'=>'required',
            'price'=>'required',
            'supplier'=>'required',
         
        ]);
    
        $productname = $request->productname;
        $description = $request->description;
        $stocks= $request->stocks;
        $cost = $request->cost;
        $price = $request->price;
        $supplier = $request->supplier;
        // $supplier_id = $request->supplier_id;
    

        $prod = new Product();
        $prod->productname = $productname;
        $prod->description = $description;
        $prod->stocks = $stocks;
        $prod->cost = $cost;
        $prod->price = $price;
        $prod->supplier = $supplier;
        // $prod->supplier_id = $supplier_id;

        $prod->save();

        return redirect()->back()->with('success','Product Added Successfuly'); 
       
    }


    public function updateProduct(Request $request){
        $request-> validate([
            'productname'=>'required',
            'stocks'=>'required',
            'cost'=>'required',
            'price'=>'required',
            'description'=>'required',
        
  
        ]);

        $data = Product::find($request->id);

        $data->productname = $request->productname;
        $data->stocks = $request->stocks;
        $data->cost = $request->cost;
        $data->price = $request->price;
        $data->description = $request->description;

        $data->save();
        return redirect()->back()->with('success','Product Updated Succesfuly');
       
        
    }


    public function ProductPurchaseDetail(){

        $updates = DB::table('products')
        ->join('purchase_details', 'products.id', '=', 'purchase_details.product_id')
      
        ->select('products.*','purchase_details.*', 'products.productname', 'products.stocks', 'purchase_details.product_quantity')
        ->where('products.id', '=', 'purchases.product_id')
        ->get();


        return view('edit-product-stock', compact('updates'));
    }
}
