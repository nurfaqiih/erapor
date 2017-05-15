new Vue({
	el: '#course',

	data: {
		loading: false
	},

	ready: function () {
		$('#table').dataTable();
	},

	methods: {
		show: function (rombel_id, student_id, semester, section_id){
			$('#lihatNilai').modal('show');
			this.loading = true;
			this.$http.get('/api/lihat-rapor/'+rombel_id+'/'+student_id+'/'+semester+'?section_id='+section_id, function(data){
				this.$set('rapor', data);
				this.loading = false;
			});
		}
	}
})