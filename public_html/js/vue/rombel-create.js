new Vue({
	el: '#wrapper',

	data: {
		loading: false,
		disable: true,
		kelas: '',
		students: {}
	},

	ready: function(){
		$('#student').select2();
	},

	methods: {
		filter: function () {
			this.loading = true;
			this.$http.get('/api/rombel?kelas_id='+this.kelas, function(data){
				this.students = data;
				this.loading = false;
				this.disable = false;
			});
		}
	},
})