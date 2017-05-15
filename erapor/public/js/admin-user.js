new  Vue ({
	el: '#admin_user',

	data: {
		show: false,
	},

	methods: {
		upload: function () {
			$('#upload').modal('show');
		}
	}
})