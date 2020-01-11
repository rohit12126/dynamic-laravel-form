function confirmBox(msg, url) {
		    swal({
		        title: msg,
		        type: "warning",
		        padding: 0,
		        showCloseButton: true,
		        showCancelButton: true,
		        focusConfirm: false,
		        background: '#f1f1f1',
		        buttonsStyling: false,
		        confirmButtonClass: 'btn btn-confirm',
		        cancelButtonClass: 'btn btn-cancle',
		        confirmButtonText: 'Ok',
		        cancelButtonText: 'Cancel',
		        animation: false
		    }, function() {
		        window.location.href = url;
		    });
}


function confirmFieldBox(msg, url) {
    swal({
        title: msg,
        type: "warning",
        padding: 0,
        showCloseButton: true,
        showCancelButton: true,
        focusConfirm: false,
        background: '#f1f1f1',
        buttonsStyling: false,
        confirmButtonClass: 'btn btn-confirm',
        cancelButtonClass: 'btn btn-cancle',
        confirmButtonText: 'Ok',
        cancelButtonText: 'Cancel',
        animation: false
    }, function() {
    	$("body").on("click",".remove",function(){ 
            $(this).parents(".custom-group").remove();
        });
        window.location.href = url;
    });
}

// jQuery.validator.setDefaults({
//   debug: true,
//   success: "valid"
// });
// $( "form" ).validate({
//   rules: {
//     field: {
//       required: true,
      
//     }
//   }
// });

$("body").on("click",".custom-remove",function(){ 
    $(this).parents(".custom-group").remove();
});
