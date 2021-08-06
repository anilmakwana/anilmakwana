<?php

namespace App\Modules\Product\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Modules\Product\Models\product;
use App\Http\Requests\ProductValidationRequest;
use App\Models\product_catagory;
use Crypt;

class ProductController extends Controller
{
  public function create()
  {
     return view('Product::addproduct');
  }

    public function store(ProductValidationRequest $request)
    {
    	// dd($request->input('check'));
    	$res=new product;
    	$res->product_name=$request->input('product_name');
    	$res->status=$request->input('status');
    	$res->save();

    	$catagory=$request->input('check');
    	if ($catagory != null) {
    		
    		foreach ($catagory as $key) {
              $resu=new product_catagory;
              $resu->product_id=$res->id;
              $resu->catagory_id=$key;
              $resu->save();
          }

      }
      $errors= "";
      $msg ="saved success.";
      flashMessage('success',$msg);
      return response()->json(['success' => true,'msgs'=> $msg, 'status'=>1,'errors' => $errors]);
  }

  public function show()
  {
   $show=product::with(['product'])->where('trash','Y')->get();
   return view('Product::index',compact('show'));

}
public function destroy(Request $request)
{
    $id=$request->input('del_id');
    $res=product::find($id);
    $res->trash='T';
    $res->save();
}

public function edit(Request $request,$id)
{
    $upd_id=Crypt::decrypt($id);
    $edit=product::with(['product'])->find($upd_id);
    $check_cat = product_catagory::where('product_id',$upd_id)->pluck('catagory_id')->toArray();
        // dd($check_cat, $upd_id);
    return view('Product::edit',compact('edit','check_cat'));
}


    public function status(Request $request)
    {
         $status=$request->input('status');
        $status_id=$request->input('status_id');
        $res=product::find($status_id);
        if ($status=='Y') {
            $res->status='N';
            $res->save();
            // dd($res->save());
        }else{
            $res->status='Y';
            $res->save();
        }
        
    }


public function update(ProductValidationRequest $request)
{
    $id=$request->input('id');
    $res=product::find($id);
    $res->product_name=$request->input('product_name');
    $res->status=$request->input('status');
    $res->save();

    $catagory=$request->input('check');
    if ($catagory != null) {
            // dd($catagory);

        foreach ($catagory as $key) {
            $ids=product_catagory::where('product_id',$res->id)->where('catagory_id',$key)->first();
             $del=product_catagory::where('product_id',$res->id)->pluck('id')->toArray();

            // dd($ids);
            if ($ids != null){
  
              if (in_array($ids->id,$del)) {
                 foreach ($del as $k) {

                  if ($k != $ids->id) {
                   // dd(in_array($ids->id,$del));     
                     product_catagory::destroy($k);

                 }
             }
             // return redirect('/product');

         }

    }else{
        $resu=new product_catagory;
        $resu->product_id=$res->id;
        $resu->catagory_id=$key;
        $resu->save();
        $errors= "";
        $msg ="saved success.";
       
       flashMessage('success',$msg);

        return response()->json(['success' => true,'msgs'=> $msg, 'status'=>1,'errors' => $errors]);
        // dd('jj');

    }  


}

         $errors= "";
        $msg ="saved success.";
       flashMessage('success',$msg);
        return response()->json(['success' => true,'msgs'=> $msg, 'status'=>1,'errors' => $errors]);
}
}

}

