var Vue = require('vue');
// var validator = require('vue-validator');
// var resource = require('vue-resource');

// Vue.use(valida resource)

// Vue.filter('limit', function (array, limit)
// {
//     return array.slice(0, limit);
// });

// Vue.filter('type', function(rapors, type){
// 	return rapors.filter(function(rapor){
// 		return rapor.section.teacher.course.type == type;
// 	});
// });

new Vue({
	el: '#e-rapor',

	filters: {
		limit: require('./filters/limit'),
		type: require('./filters/type')
	}
})


// new Vue({
// 	el: '#teacher',

// 	data: {
// 		loading: true,
// 	},

// 	ready: function () {
// 		$('#table').dataTable();	
// 	},

// 	methods: {
// 		entry: function(student_id, section_id){
// 			this.loading = true;
// 			//fetch rapor sesuai seksi dan student_id
// 			// this.$http.get('/api/entry-nilai/'+section_id+'/'+student_id, function(rapor){
// 			// 	this.$set('rapor', rapor);
// 			// 	this.loading =  false;
// 			// });

// 			$('#entry').modal('show');
// 		}
// 	}
// })