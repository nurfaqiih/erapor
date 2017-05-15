new Vue	({
	el: '#wrapper',

	data: {
		loading: false,
		visible: false,
		naik: false,
	},

	ready: function () {
		$('#table').dataTable();	
	},

	methods: {
		rapor: function (rombel_id, student_id, semester){

			if (semester == 2) {
				this.naik = true;
			};
			this.loading = true;
			$('#rapor').modal('show');

			this.$http.get('/api/fetchStudent/'+student_id, function(student){
				this.$set('murid', student);
			});

			this.$http.get('/api/lihat-rapor/'+rombel_id+'/'+student_id+'/'+semester, function(rapor) {
				this.$set('rapors', rapor);
				this.loading = false;	
			});

			this.$http.get('/api/fetchRombel/'+rombel_id+'/'+student_id+'/'+semester, function(rombel){
				this.$set('rombel', rombel);
			});

			this.$http.get('/api/fetchSemester/'+rombel_id+'/'+student_id+'/'+semester, function(nilai){
				this.$set('kehadiran', nilai);
			});


			this.$set('printRombel', rombel_id);
			this.$set('printStudent', student_id);
			this.$set('printSemester', semester);
			this.visible = false;
		}
	},

})