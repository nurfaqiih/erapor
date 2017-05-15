$('#course').on('change', function (e) {
    console.log(e);

    var course_id = e.target.value;

    //ajax
    $.get('/api/section?course_id=' + course_id, function (data) {
        //success data
        $('#teacher').empty();
        $('#teacher').prop("disabled", false);
        $.each(data, function (index, teacherObj) {
            $('#teacher').append('<option value="' + teacherObj.id + '">' + teacherObj.name + '</option>');
        });
    });
});
