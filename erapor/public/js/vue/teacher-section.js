new Vue({
	el: '#teacher',

	data: {
		loading: true,
		coba: '',
		rapor: {
			NO  : '',
			NDs : '',
			NAt : '',
			NJ  : '',
			NH  : '',
			UTS : '',
			UAS : '',
			NPr : '',
			NPj : '',
			NPo : '',
			score_knowlede: '',
			letter_knowledge: '',
			desc_knowledge: '',
			score_skill: '',
			letter_skill: '',
			desc_skill: '',
			score_attitude: '',
			letter_attitude: '',
			desc_attitude: '',
 		},

 		errors: {
 			NO  : {},
 			NDs : {},
 			NAt : {},
			NJ  : {},
			NH  : {},
			UTS : {},
			UAS : {},
			NPr : {},
			NPj : {},
			NPo : {}
 		},

 		color: '',

	},

	ready: function () {
		$('#table').dataTable();	
	},

	methods: {
		upload: function(){
			$('#upload').modal('show');
		},
		validation: function(value, attribute){

			if (attribute == 'NO') {
				return this.errors.NO = {
									max: (value > 100),
									required: value == '',
									numeric: isNaN(value)
								}
			}
			else if (attribute == 'NDs') {
				return this.errors.NDs = {
									max: (value > 100),
									required: value == '',
									numeric: isNaN(value)
								}
			}						
			else if (attribute == 'NAt') {
				return this.errors.NAt = {
									max: (value > 100),
									required: value == '',
									numeric: isNaN(value)
								}
			}
			else if (attribute == 'NJ') {
				return this.errors.NJ = {
									max: (value > 100),
									required: value == '',
									numeric: isNaN(value)
								}
			}
			else if (attribute == 'NH') {
				return this.errors.NH = {
									max: (value > 100),
									required: value == '',
									numeric: isNaN(value)
								}
			}
			else if (attribute == 'UTS') {
				return this.errors.UTS = {
									max: (value > 100),
									required: value == '',
									numeric: isNaN(value)
								}
			}
			else if (attribute == 'UAS') {
				return this.errors.UAS = {
									max: (value > 100),
									required: value == '',
									numeric: isNaN(value)
								}
			}
			else if (attribute == 'NPr') {
				return this.errors.NPr = {
									max: (value > 100),
									required: value == '',
									numeric: isNaN(value)
								}
			}
			else if (attribute == 'NPj') {
				return this.errors.NPj = {
									max: (value > 100),
									required: value == '',
									numeric: isNaN(value)
								}
			}
			else if (attribute == 'NPo') {
				return this.errors.NPo = {
									max: (value > 100),
									required: value == '',
									numeric: isNaN(value)
								}
			};
		},

		entry: function(student_id, section_id){
			this.loading = true;
			//fetch rapor sesuai seksi dan student_id
			this.$http.get('/api/entry-nilai/'+section_id+'/'+student_id, function(rapor){
				this.rapor = rapor;
				this.loading =  false;
			});

			$('#entry').modal('show');
		},

		status: function(data){
			var rapor = data;
			if (rapor.score_knowledge == 0 && rapor.score_attitude == 0 && rapor.score_skill == 0) {
				return this.color = 'red';
			}
			else if(
				rapor.score_knowledge == 0 || 
                rapor.score_attitude == 0 || 
				rapor.score_skill == 0 ||
				rapor.desc_knowledge == null ||
				rapor.desc_skill == null ||
				rapor.desc_attitude == null
			){
				return this.color = 'blue';
			}else if(
				rapor.score_knowledge != 0 && 
				rapor.score_attitude != 0 && 
				rapor.score_skill != 0 &&
				rapor.desc_knowledge != null &&
				rapor.desc_skill != null &&
				rapor.desc_attitude != null
			){
				return this.color = 'green';
			}
		},

		update: function(e){
			e.preventDefault();

			
			this.loading = true;
			var rapor = {
				id: this.rapor.id,
				desc_knowledge: this.rapor.desc_knowledge,
				NH: this.rapor.NH,
				UTS: this.rapor.UTS,
				UAS: this.rapor.UAS,
			    desc_skill : this.rapor.desc_skill,
  			  	NPr : this.rapor.NPr,
  			    NPj : this.rapor.NPj,
 				NPo : this.rapor.NPo,
	  			desc_attitude : this.rapor.desc_attitude,
  				NO : this.rapor.NO,
  				NDs : this.rapor.NDs,
  				NAt : this.rapor.NAt,
  				NJ : this.rapor.NJ,

			};

			this.$http.post('/api/entry-nilai/'+this.rapor.id,  rapor, function(data){
				this.rapor = data;
				this.loading = false;
				this.status(data);
			});
		}
	}
})