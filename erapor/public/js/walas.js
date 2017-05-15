new Vue({

	el: '#body',

	data: {
		loading: false,
		kehadiran: {
			sakit: '',
			izin: '',
			alfa: '',
			pramuka: '',
			uks: '',
			desc: ''
		},

		errors: {
			sakit: '',
			izin: '',
			alfa: '',

		}
	},

	ready: function () {
		$('#table').dataTable();
	},

	methods: {
		upload: function(){
			$('#upload').modal('show');
		},

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
		},

		edit: function(rombel_id, student_id, semester){
			this.errors.sakit = '';
			this.errors.izin = '';
			this.errors.alfa = '';

			this.loading = true;
			$('#kehadiran').modal('show');
			this.$http.get('/api/kehadiran/'+rombel_id+'/'+student_id+'/'+semester, function(data){
				this.kehadiran = data;
			});

			this.$http.get('/api/fetchStudent/'+student_id, function(value){
				this.$set('student', value);
				this.loading= false;
			});
		},

		update: function(e){
			e.preventDefault();
			this.loading = true;
			var kehadiran = this.kehadiran;
			this.$http.post('/api/kehadiran/'+this.kehadiran.id, kehadiran, function(data){
				this.kehadiran = data;
				this.loading = false;
			});
		},

		validation: function(value, attr){
			if (attr == 'sakit') {
				return this.errors.sakit = {
					max: (value > 100),
					required: value == '',
					numeric: isNaN(value) 
				}
			} else if(attr == 'izin'){
				return this.errors.izin = {
					max: (value > 100),
					required: value == '',
					numeric: isNaN(value)
				}
			}else if(attr == 'alfa'){
				return this.errors.alfa = {
					max: (value > 100),
					required: value == '',
					numeric: isNaN(value)
				}
			};
		}
	}

});