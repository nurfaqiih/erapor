new	Vue ({
	el: '#wrapper',

	data: {
		show: false,
		deleted: false,
	},

	ready: function (){
		this.fetchTeachers();
		$('#table').dataTable();
	},

	methods: {
		upload: function(){
			$('#upload').modal('show');
		},

		fetchTeachers: function (){
			this.$http.get('api/fetchTeachers', function(teachers){
				this.$set('teachers', teachers);
			});
		},

		delete: function (e) {
			// body...
			e.preventDefault();
			this.show = !this.show;
			this.deleted = ! this.deleted;
		}
	}
})