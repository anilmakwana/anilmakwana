@extends('layout')
@section('container')
  

<div class=" hr-manager-admin">
        <div class="heading-and-filters">
            <div class="page-title">
                <h1>Product Detail</h1>
            </div>
        </div>
        <div class="p-20">
			<div class="text-right mb-10"><a href="{{route('create_product')}}" title="" class="btn btn-orange" ><i class="fa fa-plus"></i></a></div>
            <div class="card">
                <!--<div class="card-header">Client</div>-->
                <div class="card-body">                   	
                    <div class="table-responsive">
                        <table id="client" class="display nowrap table table-bordered table-striped w-100">
                            <thead>
                                <tr>
                                	<th>Id</th>
                                    <th>Product  Name</th>
									<th>Catagory </th>
									
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>

                            
                            <tbody>
                            @foreach($show as $result=>$value)
                            <tr>
                            	<td class="text-center">{{$value->id}}</td>
                            	<td class="text-center">{{$value->product_name}}</td>
                            	<td class="text-center">
                            		
                            		{{-- {{$value->id}} --}}
                              <?php   $x=\App\Modules\Product\Models\product::getCatagory($value->id);
                              if ($x != null) {
                               
                              
                              foreach ($x as $val   ) {
                                echo $val .'<br>';
                              }
                          }
                              ?>

                            		
                            	</td>
                            <td class="text-center">

                                {{-- <input type="checkbox" data-route="{{route('product_status')}}" class="js-switch status" data-status_id="{{$value->id}}"  data-status="{{$value->status}}" checked /> --}}
                             
                              <input type="checkbox" data-route="{{route('product_status')}}" class="js-switch status" data-status_id="{{$value->id}}"  data-status="{{$value->status}}" @if($value->status == 'Y') checked  @endif />

                            
                            </td>
                            	<td class="text-center"><button class="btn btn-danger del_data" data-route="{{route('product_del')}}"   data-del_id="{{$value->id}}" >Delete</button>
                                    <a href="{{route('edit_product',Crypt::encrypt($value->id))}}"  class="btn btn-warning "   >Update</a>

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


@endsection