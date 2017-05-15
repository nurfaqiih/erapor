new Vue({
	el: '#wrapper',

	data: {
		show: false
	},

	ready: function(){
		$('#table').dataTable();
	},

	methods: {
		upload: function(){
			$('#upload').modal('show');
		},

		delete: function (e) {
			e.preventDefault();
			this.show = !this.show;
		}
	}
})