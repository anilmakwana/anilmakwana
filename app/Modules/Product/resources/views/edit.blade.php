@extends('layout')
@section('container')

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="custModalLabel">Edit Product</h5>
                
            </div>
            <div class="modal-body">
              <form action="{{route('upd_product')}}" class="FromSubmit" redirect_url="{{route('productList')}}"  id="productValidation">
                
                <div class="row">
                  <div class="col-12 ">
                    <div class="form-group">
                      <label for="">Product Name</label>
                       <input type="text" id="catagory" value="{{$edit->product_name}}"  name="product_name" class="form-control">
                       <input type="text" id="id" value="{{$edit->id}}"  name="id" class="form-control" hidden>
                    </div>
                  </div>
                  <div class="col-12 ">

                   <label for="">Category Name</label>

                   @php 
                   $x=\App\Modules\Catagory\Models\category::getCatagoryDropdown(); 
                   @endphp
                   @foreach($x as $key)

                   {{-- {{dd(array_search(1,$y))}}  --}}

                   <div class="form-check">
                    <input class="form-check-input" name="check[]" type="checkbox" value="{{$key->id}}" id="defaultCheck2" @if(in_array($key->id, $check_cat)) checked @endif>
                    {{-- <label class="form-check-label" for="defaultCheck2"> --}}
                      {{$key->category}}
                    {{-- </label> --}}
                  </div>
                  @endforeach
                </div>

                  
                <div class="col-12 ">
                  <label for="">Status </label>
                  @if($edit->status == 'Y')


                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="Y"checked>
                   <label class="form-check-label" for="inlineRadio1">Active</label>
                 </div>
                 <div class="form-check form-check-inline">
                   <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="N" >
                   <label class="form-check-label" for="inlineRadio2">InActive</label>
                 </div>
                 @else

                 <div class="form-check form-check-inline">
                   <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="Y">
                   <label class="form-check-label" for="inlineRadio1">Active</label>
                 </div>
                 <div class="form-check form-check-inline">
                   <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="N" checked>
                   <label class="form-check-label" for="inlineRadio2">InActive</label>
                 </div>
                 @endif
               </div>
                </div>
        <div class="modal-footer">                
                <button type="submit" class="btn btn-orange">Save</button>
            </div>
          
              </form>
            </div>
           
        </div>
    </div>

@endsection