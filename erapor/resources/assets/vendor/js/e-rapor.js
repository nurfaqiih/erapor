Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');

Vue.filter('limit', function (array, limit)
{
    return array.slice(0, limit);
});

Vue.filter('type', function(rapors, type){
	return rapors.filter(function(rapor){
		return rapor.section.teacher.course.type == type;
	});
});