new	Vue ({
	el: '#wrapper',

	data: {
		show: false
	},

	methods: {
		upload: function () {
			$('#upload').modal('show');
		}
	},
})