$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$('form.FromSubmit').submit(function (event) {

    var formId = $(this).attr('id');

    // console.log('dad');
    // return false;
    // alert($('#'+formId).valid());


  
        var formAction = $(this).attr('action');

        var buttonText = $('#'+formId+' button[type="submit"]').text();
        var $btn = $('#'+formId+' button[type="submit"]').attr('disabled','disabled').html("Loading...");
        
        var redirectURL = $(this).attr("redirect_url");
       
        $.ajax({
            type: "POST",
            url: formAction,
            data: new FormData(this),
            contentType: false,
            processData: false,
            enctype: 'multipart/form-data',
            success: function (response) {
              // console.log(response.msg);
                if (response.status == 1 && response.msg !="") {
                  // alert('fgh');
                  // flashMessage('success',response.msg);
                    $('#'+formId+' button[type="submit"]').text(buttonText);
                    $('#'+formId+' button[type="submit"]').removeAttr('disabled','disabled');
                   // flashMessage('success',response.msg);
                    window.location=redirectURL;
                }
            },
            error: function (jqXhr) {

                var errors = $.parseJSON(jqXhr.responseText);
                showErrorMessages(formId, errors);
                $('#'+formId+' button[type="submit"]').text(buttonText);
                $('#'+formId+' button[type="submit"]').removeAttr('disabled','disabled');
            }
        });

        return false;

  
   // alert('fg');
});
function showErrorMessages(formId, errorResponse) {
    var msgs = "";
    console.log(errorResponse);
    $.each(errorResponse.errors, function(key, value) {
       // console.log(value);
        msgs += value + " <br>";
    });
    flashMessage('danger', msgs,formId);
}
 function flashMessage($type,messages,formId) {
        /* https://github.com/ifightcrime/bootstrap-growl */
(function(e){e.bootstrapGrowl=function(t,n){var n=e.extend({},e.bootstrapGrowl.default_options,n),r=e("<div>");r.attr("class","bootstrap-growl alert"),n.type&&r.addClass("alert-"+n.type),n.allow_dismiss&&r.append('<a class="close" data-dismiss="alert" href="#">&times;</a>'),r.append(t),n.top_offset&&(n.offset={from:"top",amount:n.top_offset});var i=e(".bootstrap-growl",n.ele);offsetAmount=n.offset.amount,e.each(i,function(){offsetAmount=offsetAmount+e(this).outerHeight()+n.stackup_spacing}),css={position:"absolute",margin:0,"z-index":"9999",display:"none"},css[n.offset.from]=offsetAmount+"px",r.css(css),n.width!=="auto"&&r.css("width",n.width+"px"),e(n.ele).append(r);switch(n.align){case"center":r.css({left:"50%","margin-left":"-"+r.outerWidth()/2+"px"});break;case"left":r.css("left","20px");break;default:r.css("right","20px")}r.fadeIn(),n.delay>=0&&r.delay(n.delay).fadeOut("slow",function(){e(this).remove()})},e.bootstrapGrowl.default_options={ele:"body",type:null,offset:{from:"top",amount:20},align:"right",width:250,delay:4e3,allow_dismiss:!0,stackup_spacing:10}})(jQuery);

                $.bootstrapGrowl(messages, {
                      type: $type,
                      delay: 5000
                  });
 }

// $(document).on('click', '#del_all', function(event) {
//   event.preventDefault();
//   var del_id=[];
//   $('.check:checked').each(function(i) {
//     del_id[i]=$(this).val();
//   });
//    var op=$(this);
//   var route=$(this).data('route');
//   if (del_id.length != 0) {
//     $confirm=confirm('Are You Sure??');

//     if ($confirm) {

//   $.ajax({
//     url: route,
//      headers: {
//      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//        },
//     type: 'POST',
//     data: {del_id: del_id},
//     success:function(data){
//       if (data == 'no') {
//          flashMessage('danger', 'You Cant Delete This Item');

//         }else {
//        $('.check:checked').closest('tr').fadeOut('slow');        
//       }
//     }
//   });

// }

//   }else {
//     alert('Select Atlest One Item To Delete');
//   }
// });



// $(document).on('click', '#status_all', function(event) {
//   event.preventDefault();
//    var status_id=[];
//   $('.check:checked').each(function(i) {
//     status_id[i]=$(this).val();
//   });
//    var op=$(this);
//   var route=$(this).data('route');
//   if (status_id.length != 0) {

//     if(status_id.length  == 1){
//      $confirm=confirm('Are You Sure To Change Status Of This Item');
//     }else if(status_id.length  > 1){
//      $confirm=confirm('Are You Sure To Change Status All');
//    }
   
//       if ($confirm) {
//       $.ajax({
//          url: route,
//          headers: {
//          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//            },
//           type: 'POST',
//          data: {status_id: status_id},
//          success:function(data){
//           $('.table').DataTable().draw(false);
//           $('#checkAll').prop('checked',false);  
//           }
//        });
//        }


// }else {
//     alert('Select Item');
// }
 
// });

    





  $(document).on('click', '.del_data', function(event) {
    event.preventDefault();
    // alert('hgh');
    var del_id=$(this).data('del_id');
    var route=$(this).data('route');
    var ele=this;
    $confirm=confirm('Are You Sure To Delete ??');
   if ($confirm) {
    $.ajax({
      url: route,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 },
      type: 'POST',
     
      data: {del_id: del_id},
      success:function(data){
        if (data == 'no') {
        flashMessage('danger','You Cant Delete This Item ');

        }else{
        $(ele).closest('tr').fadeOut('slow');
        flashMessage('success','Data Deleted Successfully');
        }
      }
    });
    }
  });











 $(document).on('change', '.status', function(event) {
    event.preventDefault();
    var status=$(this).data('status');
    var status_id=$(this).data('status_id');
    var route=$(this).data('route');
    // var r= "{{route(route)}}";
    // alert(route);
    var op=$(this);
    $confirm=confirm('Are You Sure To Change Status');
    if ($confirm) {
    $.ajax({
      url:route ,
       headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 },
      type: 'POST',
     
      data: {status: status,
             status_id:status_id},
      success:function(data){
        flashMessage('success','Status Changed Successfully');
        if(status=='Y'){
            op.data('status','N');  
        }else if (status=='N') {  
            op.data('status','Y');
        }
      }
    });
    }      
  });


 
 


