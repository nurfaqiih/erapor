Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');

new Vue({
	el: '#wrapper',

	data: {
		loading: false,
		newKalender: {
			year: '',
			semester: '',
			expire: '',
			open: '',
		}
	},
	
	ready: function () {
		this.fetchKalender();
	},

	methods: {
		fetchKalender: function(){
			this.$http.get('/api/kalender/edit', function(data){
				this.$set('kalender', data);
			});
		},
		save: function(){
			this.loading = true;
			var kalender = this.newKalender;
			this.$http.post('/api/kalender/update', kalender, function(data){
				this.$set('kalender', data);
				this.loading = false;
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
					swal("Changed!", "Kalender Akademik berhasil dirubah.", "success");
				});
		},
		
	},
})