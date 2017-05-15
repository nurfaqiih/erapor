new Vue({
	el: '#leger',

	data: {
		rombel: null,
		semester: null,
	},

	ready: function () {
		this.fetchLeger(this.rombel, this.semester);
	},

	methods: {
		fetchLeger: function(rombel, semester){
	
			this.$http.get('/api/leger/'+rombel+'/'+semester, function(leger){
				this.$set('leger', leger);
			});
		}
	}
})