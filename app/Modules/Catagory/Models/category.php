<?php


namespace App\Modules\Catagory\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Product\Models\product;

class category extends Model
{
    public function catagory()
    {
    	return $this->hasMany(product_catagory::class,'catagory_id','id');
    }
    public static function getCatagoryDropdown()
    {
    	$x=category::where('status','Y')->where('trash','Y')->get();
    	return $x;
    } 
     public static function getCatagoryIdDropdown()
    {
    	$x=category::get();
    	foreach ($x as $key) {
    		$y[]=$key->id;
    	}
    	return $y;
    } 

  
}
