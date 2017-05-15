new Vue ({
	el: '#wrapper',

	data: {
		visible: true
	},

	ready: function () {
		$('#table').dataTable();
	},

	methods: {
		upload: function(){
			$('#upload').modal('show');
		},

		toggle: function (e) {
			e.preventDefault();

			this.visible = ! this.visible;
		}
	},
})