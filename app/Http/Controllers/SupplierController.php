<?php

namespace App\Http\Controllers;
use App\Models\Supplier;
use App\Models\SupplierName;
use App\Models\SupplierId;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function addSupplier(){

        return view('add-supplier');
    }


    public function allSupplier(){
        $suppliers = Supplier::get();
      
        return view('all-supplier', compact('suppliers'));
    }


    public function saveSupplier(Request $request){
        $request-> validate([
            'suppliername'=>'required',
            'contact'=>'required',
            'address'=>'required',
       
        ]);
    
        $suppliername = $request->suppliername;
        $contact = $request->contact;
        $address= $request->address;

        $supp = new Supplier();
        $supp->suppliername = $suppliername;
        $supp->contact = $contact;
        $supp->address = $address;
        $supp->save();


        $suppname = new SupplierName();
        $suppname->name = $suppliername;
        $suppname->save();

        $suppid = new SupplierId();
        $suppid->supplier_id =  $supp->id;
        $suppid->supplier_name = $supp->id;
        $suppid->save();

        return redirect()->back()->with('success','Supplier Added Successfuly'); 
       
    }
}
