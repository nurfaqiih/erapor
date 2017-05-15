
new Vue ({
	el: '#wrapper',

	data: {
		value: '',
		loading: false,
		visible: false,
		disable: true,
		kelas: '',
		rombels: '',
		courses: '',
		walas: '',
	},
	ready: function () {
		this.fetchRombel();
	},

	methods: {
		fetchRombel: function(){
			this.$http.get('/api/section-create/fetchRombel', function(data){
				this.rombels = data;
			});
		},

		fetchCourse: function(kelas){
			this.loading = true;
			this.visible = true;
			this.$http.get('/api/section-create/fetchRombel?kelas='+kelas, function(data){
				this.walas =  data;
			});
			
			this.$http.get('/api/section-create/fetchCourse?kelas='+kelas, function(data){
				this.courses = data;
				this.loading = false;
				this.disable = false;
			});
		}
	}
})