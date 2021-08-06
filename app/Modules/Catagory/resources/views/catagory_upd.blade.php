@extends('layout')
@section('container')

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="custModalLabel">Edit Category</h5>
               
            </div>
            <div class="modal-body">
              <form action="{{route('upd_catagory')}}" redirect_url="{{route('categoryList')}}" class="FromSubmit" id="catValidation">
               <input type="text" name="id" value="{{$edit->id}}" hidden>
                <div class="row">
                  
                  <div class="col-12 ">
                    <div class="form-group">
                      <label for="">Category Name</label><br>
                      <input type="text" id="catagory" value="{{$edit->category}}"  name="category" class="form-control">
 
                    </div>
                  </div>
                   <div class="col-12 ">
                          <label for="">Status </label><br>
                          <div class="form-check form-check-inline">
                            @if($edit->status == 'Y')
                            

                            <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="Y"checked>
                            <label class="form-check-label" for="inlineRadio1">Active</label>
                          </div>
                          <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="N" >
                           <label class="form-check-label" for="inlineRadio2">InActive</label>
                           @else
                           <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="Y">
                           <label class="form-check-label" for="inlineRadio1">Active</label>
                         </div>
                         <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="N" checked>
                           <label class="form-check-label" for="inlineRadio2">InActive</label>


                           @endif
                         </div>

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



