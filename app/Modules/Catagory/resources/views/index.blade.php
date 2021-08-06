@extends('layout')
@section('container')
  

<div class=" hr-manager-admin">
        <div class="heading-and-filters">
            <div class="page-title">
                <h1>Category Detail</h1>
            </div>
        </div>
        <div class="p-20">
			<div class="text-right mb-10"><a href="{{route('create_catagory')}}" title="" class="btn btn-orange" ><i class="fa fa-plus"></i></a></div>
            <div class="card">
                <!--<div class="card-header">Client</div>-->
                <div class="card-body">                   	
                    <div class="table-responsive">
                        <table id="client" class="display nowrap table table-bordered table-striped w-100">
                            <thead>
                                <tr>
                                	<th>Id</th>
                                  
									<th>Catagory Name</th>
									
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                              
                            <tbody>
                         @foreach($result as $key)
                             <tr>                          
                             <td class="text-center">{{$key->id}}</td>
                             <td class="text-center">{{$key->category}}</td>
                             <td class="text-center">
                           
                               <input type="checkbox" data-route="{{route('catagory_status')}}" class="js-switch status" data-status_id="{{$key->id}}"  data-status="{{$key->status}}"  @if($key->status == 'Y') checked   @endif/>
                              
                           
                             </td>

                            <td class="text-center">
                                <button class="btn btn-danger del_data" id="del" data-route="{{route('del_catagory')}}" data-del_id="{{$key->id}}">Delete</button>&nbsp

                                <a  href="{{route('edit_category',Crypt::encrypt($key->id))}}" class="btn btn-warning update"  >Update</a>
                            </td>
                          
                            </tr> 
                          @endforeach
                            </tbody>
                              
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade " id="custModal" tabindex="-1" role="dialog" aria-labelledby="custModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="custModalLabel">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <div class="modal-body">
            	<form action="{{route('add_category')}}" method="post">
            		@csrf
            		<div class="row">
            			
            			<div class="col-12 ">
            				<div class="form-group">
            					<label for="">Category Name</label>
            					<input type="text" id="catagory"  name="catagory" class="form-control">
                               @error('catagory')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            				</div>
            			</div>
            			<div class="col-12 ">
            					<label for="">Status </label>
            				<div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="Active"checked>
                             <label class="form-check-label" for="inlineRadio1">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="InActive" >
                                 <label class="form-check-label" for="inlineRadio2">InActive</label>
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
</div>
<div class="updcatagory"></div>








@endsection

