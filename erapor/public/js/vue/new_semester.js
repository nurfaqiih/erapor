Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');

new Vue ({
	el:'#wrapper',

	data:{
		loading: false,
		disable: true,
		visible: false,
		newKalender: {
			year: '',
			semester: '',
			expire: '',
			open: '',
		},
		kelas:'',
		value: '',
		rombels: '',
		courses: '',
		walas: '',
		newStudent:{
			nis: '',
			name: '',
			gender: '',
			birth: '',
			birth_place: '',
			bp: '',
		},
		newKelas: {
			kode: '',
			kelas: '',
			teacher: '',
			student: ''
		},
		student: 1,
		students: {},
		newSection: {
			year: '',
  			kode: '',
  			rombel_id: '',
  			course_id:  '',
  			teacher_id: '',
		},
		rombel_id: '',
	},

	ready: function(){
		this.fetchKalender();
		this.fetchRombel();
		$('#list_student').select2();
	},

	methods:{
		fetchKalender: function(){
			this.$http.get('/api/kalender/edit', function(data){
				this.$set('kalender', data);
			});
		},

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
		},
		
		filter: function () {
			this.loading = true;
			this.$http.get('/api/rombel?kelas_id='+this.kelas, function(data){
				this.students = data;
				this.loading = false;
				this.disable = false;
			});
		},

		alert: function(){
			var that = this;
			swal({   
				title: "Are you sure?",   
				text: "Perubahan Kalender akan berpengaruh terhadap sistem!",   
				type: "warning",   
				showCancelButton: true,   
				confirmButtonColor: "#DD6B55",   
				confirmButtonText: "Change!",   
				closeOnConfirm: false }, 
				function(){   
					that.save();
					$('ul.setup-panel li:eq(1)').removeClass('disabled');
        			$('ul.setup-panel li a[href="#step-2"]').trigger('click');
        			$(this).remove();
					swal("Changed!", "Kalender Akademik berhasil dirubah.", "success");
				});
		},

		next3: function(){
			swal({   
				title: "Are you sure?",   
				text: "Perubahan Kalender akan berpengaruh terhadap sistem!",   
				type: "warning",   
				showCancelButton: true,   
				confirmButtonColor: "#DD6B55",   
				confirmButtonText: "Change!",   
				closeOnConfirm: false }, 
				function(){   
					$('ul.setup-panel li:eq(2)').removeClass('disabled');
        			$('ul.setup-panel li a[href="#step-3"]').trigger('click');
        			$(this).remove();
					swal("Changed!", "Kalender Akademik berhasil dirubah.", "success");
				});
		},

		next4: function(){
			swal({   
				title: "Are you sure?",   
				text: "Perubahan Kalender akan berpengaruh terhadap sistem!",   
				type: "warning",   
				showCancelButton: true,   
				confirmButtonColor: "#DD6B55",   
				confirmButtonText: "Change!",   
				closeOnConfirm: false }, 
				function(){   
					$('ul.setup-panel li:eq(3)').removeClass('disabled');
        			$('ul.setup-panel li a[href="#step-4"]').trigger('click');
        			$(this).remove();
					swal("Changed!", "Kalender Akademik berhasil dirubah.", "success");
				});
		},

		save: function(){
			this.loading = true;
			var kalender = this.newKalender;
			this.$http.post('/api/kalender/update', kalender, function(data){
				this.loading = false;
			});
		},

		newUser: function(){
			this.loading = true;
			var student = this.newStudent;
			this.$http.post('/api/new/student', student, function(data){
				this.loading = false;
				this.newStudent = {
					nis: '',
					name: '',
					gender: '',
					birth: '',
					birth_place: '',
					bp: '',
				};
			});
		},

		newRombel: function(){
			this.loading = true;
			var kelas = this.newKelas;
			kelas.kelas = this.kelas;
			this.$http.post('/api/new/kelas', kelas, function(){
				this.loading = false;
				this.newKelas = {
					kode: '',
					kelas: '',
					teacher: '',
					student: ''
				};
			});
		},

		newSeksi: function(){
			this.loading = true;
			var seksi = this.newSection;
			
			this.$http.post('/api/new/seksi',  seksi, function(){
				this.loading = false;
				this.newSection = {
					year: '',
  					kode: '',
  					rombel_id: '',
  					course_id:  '',
  					teacher_id: '',
				};
			});
		},

		finish: function (){
			var that = this;
			swal({   
				title: "Are you sure?",   
				text: "Perubahan Kalender akan berpengaruh terhadap sistem!",   
				type: "warning",   
				showCancelButton: true,   
				confirmButtonColor: "#DD6B55",   
				confirmButtonText: "Finish!",   
				closeOnConfirm: false }, 
				function(){   
					window.location = "/";
					swal("Changed!", "Kalender Akademik berhasil dirubah.", "success");
				});
		}
	}
})