new Vue ({
	el: '#wrapper',

	data: {
		nilai: {},
		visible: false,
	},

	ready: function(){
		$('#table').dataTable();
	},

	methods: {
		lihatNilai: function (student_id, section_id) {
			
			this.nilai= {};
			this.visible = true;
			// show = true;
			$('#lihat-nilai').modal('show');
			
			// melakukan ajax request
			this.$http.get('api/lihat-nilai/'+student_id+'/'+section_id, function(nilai){
				this.nilai = nilai;
				this.visible = false;
			});
			
		}		
	}

})