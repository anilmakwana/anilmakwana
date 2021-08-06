<?php

namespace App\Modules\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Catagory\Models\category;
use App\Models\product_catagory;

class product extends Model
{
    public function product()
    {
    	return $this->hasMany(product_catagory::class,'product_id','id');
    }

    public static function getCatagory($id)
    {
    	$x=product_catagory::with(['category_id'])->where('product_id',$id)->get();
    	if (!$x->isEmpty()) {
       
        	 
           foreach ($x as $key => $value) {
           	    $y=$value->category_id;

           	 
           	    	$p[]=$y->category;
           	    }
           
        	
    	  return $p;
        // dd($p);
       
    	}
    	
    }

    public static function UpdCatagory($id)
    {
        $x=product_catagory::where('product_id',$id)->get();
        foreach ($x as $k) {
          $y[]=$k->catagory_id;
        }
        return $y;
    }
}
