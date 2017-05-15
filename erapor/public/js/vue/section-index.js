new Vue ({
	el: '#wrapper',

	data: {
		show: false
	},

	ready: function (){
		$('#table').dataTable();
	},

	methods: {
		upload: function(){
			$('#upload').modal('show');
		},

		alert: function(e){
			e.preventDefault();
			swal({   
				title: "Are you sure?",   
				text: "You will not be able to recover this imaginary file!",   
				type: "warning",   
				showCancelButton: true,   
				confirmButtonColor: "#DD6B55",   
				confirmButtonText: "Yes, delete it!",   
				cancelButtonText: "No, cancel plx!",   
				closeOnConfirm: false,   
				closeOnCancel: false }, 
				function(isConfirm){   
					if (isConfirm) {   
						swal("Deleted!", "Your imaginary file has been deleted.", "success");   
					} else {     
						swal("Cancelled", "Your imaginary file is safe :)", "error");   
					} 
			});
		}
		
	}
})