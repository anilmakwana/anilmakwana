
<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script> 

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

<script type="text/javascript" src="{{ asset('js/bootstrap/popper.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('js/fontawesome/fontawesome.js') }}"></script> 
<script type="text/javascript" src="{{ asset('js/fontawesome/solid.js') }}"></script> 
<script type="text/javascript" src="{{ asset('js/fontawesome/brands.js') }}"></script> 
<script type="text/javascript" src="{{ asset('js/fontawesome/regular.js') }}"></script> 
<script type="text/javascript" src="{{ asset('js/detect/detect.js')}}"></script> 
<script type="text/javascript" src="{{ asset('js/jquery-slimScroll/jquery.slimscroll.js') }}"></script> 
<script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('js/loader.js') }}"></script> 
<script type="text/javascript" src="{{ asset('js/toastr.min.js') }}"></script> 

<script type="text/javascript" src="{{ asset('js/common.js') }} "></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js">

</script>


<!--Pie Chart End--> 
<script type="text/javascript" src="{{ asset('js/custom.js')}}"></script> 
<script type="text/javascript" src="{{ asset('js/switchery.min.js')}}"></script> 
@include('flashmsg');
 
<script type="text/javascript">
function headertab(id,id1) {
	$(id).addClass('active').siblings('.page-title').removeClass('active');
	$('.header-tab-content').removeClass('active');
	$('#tab-'+id1).addClass('active');
};
$(document).ready(function() {
  $('#client').DataTable( {
        "scrollX": true
    } );
});

var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch')); 
elems.forEach(function(html) {
  var switchery = new Switchery(html, { size: 'small' });
});


	// alert('ghj');
	 $('#productValidation').validate({
       // errorClass: 'errors',
        rules: {
           product_name: { required: true },
           
        },
        messages:{
          product_name:{ required:'Product Name  is required'},
          // url:{ required:'URL field is required'},
        },
        highlight: function (element) {
                $(element).parent().addClass('text-danger')
            },
        unhighlight: function (element) {
                $(element).parent().removeClass('text-danger')
            }

   
    });

	 	 $('#catValidation').validate({
       // errorClass: 'errors',
        rules: {
           category: { required: true },
           
        },
        messages:{
          category:{ required:'Category is required'},
          // url:{ required:'URL field is required'},
        },
         highlight: function (element) {
                $(element).parent().addClass('text-danger')
            },
            unhighlight: function (element) {
                $(element).parent().removeClass('text-danger')
            }

   
    });


// $('.error').addClass('text-red');
</script>
</html>