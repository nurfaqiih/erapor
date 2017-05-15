Vue.filter('type', function(rapors, type){
	return rapors.filter(function(rapor){
		return rapor.section.teacher.course.type == type;
	});
});

Vue.filter('limit', function (array, limit)
{
    return array.slice(0, limit);
});

new Vue({
	el: '#rapor',
	data: {
		kelas: '',
		student: '',
		semes: '',
		naik: false,
	},
	ready: function(){
		
		this.rapor(this.kelas,this.student,this.semes);

		setTimeout(function(){
  			window.print();
		}, 3000); 
	},

	methods: {
		rapor: function (rombel_id, student_id, semester){
			if (this.semes == 2) {
				this.naik = true;
			};
			this.$http.get('/api/lihat-rapor/'+rombel_id+'/'+student_id+'/'+semester, function(rapor) {
				this.$set('rapors', rapor);
			});

			this.$http.get('/api/fetchRombel/'+rombel_id+'/'+student_id+'/'+semester, function(rombel){
				this.$set('rombel', rombel);
			}); 

			this.$http.get('/api/fetchStudent/'+student_id, function(student){
				this.$set('murid', student);
			});

			this.$http.get('/api/fetchSemester/'+rombel_id+'/'+student_id+'/'+semester, function(nilai){
				this.$set('kehadiran', nilai);
			});
		},
	},
})