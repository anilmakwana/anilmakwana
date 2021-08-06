<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Catagory\Models\category;
use App\Modules\Product\Models\product;

class product_catagory extends Model
{
     public function product_id()
    {
    	return $this->belongsTo(product::class,'product_id','id');
    }
     public function category_id()
    {
    	return $this->belongsTo(category::class,'catagory_id','id');
    }

  
}
