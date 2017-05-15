<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href={{asset('images/favicon.ico')}}>
    <title>Erapor</title>
	{!!Html::style(elixir('css/app.css'))!!}
</head>
<body id="rapor">
	{!!Form::hidden('kelas', $rombel, ['v-model' => 'kelas'])!!}
	{!!Form::hidden('student', $student, ['v-model' => 'student'])!!}
	{!!Form::hidden('semes', $semesters, ['v-model' => 'semes'])!!}
	
	<div v-show="{{Input::get('cover')}}">
		@include('partials.rapor.cover')
	</div>
	<div v-show="{{Input::get('biodata')}}">
		@include('partials.rapor.biodata-sekolah')
		@include('partials.rapor.petunjuk')
		@include('partials.rapor.biodata-peserta-didik')
	</div>
	<!-- <div class="container"> -->
		@include('partials.rapor.capaian-kompetensi')
		@include('partials.rapor.deskripsi-kompetensi')	
	<!-- </div> -->
	{!!Html::script(asset('js/vue.min.js'))!!}
	{!!Html::script(asset('js/vue-resource.min.js'))!!}
	{!!Html::script(elixir('js/app.js'))!!}
	{!!Html::script(asset('js/vue/rapor.js'))!!}

</body>
</html>