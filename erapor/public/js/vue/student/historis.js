new Vue({
	el: '#historis',

	data: {
		student_id: '',
		loading: false,
		rapors: '',
	},

	ready: function () {
		this.year(this.student_id);
	},

	computed: {
		show: function(){
			if (this.rapors == '') {
				return false;
			} else{
				return	true;	
			}
		}
	},

	methods: {
		year: function(student_id){
			this.$http.get('/api/historis/year/'+student_id, function(data){
				this.$set('tahun', data);
			});
		},

		fetchRapor: function(rombel_id, student_id, semester){
			this.loading = true;
			this.show = true;

			if (semester == 2) {
				this.naik = true;
			};

			this.$http.get('/api/fetchStudent/'+student_id, function(student){
				this.$set('murid', student);
			});

			this.$http.get('/api/lihat-rapor/'+rombel_id+'/'+student_id+'/'+semester, function(rapor) {
				this.rapors = rapor;
				this.loading = false;
			});

			this.$http.get('/api/fetchRombel/'+rombel_id+'/'+student_id+'/'+semester, function(rombel){
				this.$set('rombel', rombel);
			});

			this.$http.get('/api/fetchSemester/'+rombel_id+'/'+student_id+'/'+semester, function(nilai){
				this.$set('kehadiran', nilai);
			});
		}
	}
})