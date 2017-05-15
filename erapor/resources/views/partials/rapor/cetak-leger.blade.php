<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
<!--     <meta id="token" name="token" value="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href={{asset('images/favicon.ico')}}>
    <title>Erapor</title> -->

    <!-- Styles -->
    {!!Html::style(elixir('css/app.css'))!!}
    <!-- {!!Html::style('//fonts.googleapis.com/css?family=Roboto:400,300')!!}
    {!!Html::style(asset('css/print.css'))!!}
    {!!Html::style(asset('css/side-menu.css'))!!} -->

</head>
<body id="leger" 
    style="margin: 2em; font-size: xx-small;"
>
    
    {!!Form::hidden('rombel_id', $rombel_id, ['v-model' => 'rombel'])!!}
    {!!Form::hidden('semester', $semester, ['v-model' => 'semester'])!!}
    <div>
        <h4 class="text-center">Daftar Nilai Kelas (Leger)</h4>
            <div class="col-xs-2">
            <p>
                <br>Nama Sekolah </br>
                <br>Kelas</br>
                <br>Nama Wali Kelas</br>
            </p> 
            </div>
            <div class="col-xs-7">
                <p>
                    <br>: SMK YWKA MEDAN </br>
                    <br>: @{{murid.kelas}} </br>
                    <br>: @{{murid.name}}</br>    
                </p>
            </div>
            <div class="col-xs-1">
                <p>
                    <br>Tahun Ajar </br>
                    <br>Semester</br>    
                </p>
                
            </div>
            <div class="col-xs-2">
                <p>
                    <br>: 2015/2016 </br>
                    <br>: @{{semester}}</br>    
                </p>
            </div>    
        
        <table class="table table-bordered">
            <tr>
                <td rowspan="2"
                    style="width: 30px;" 
                >NO</td>
                <td rowspan="2"
                    style="width: 15%;" 
                >Nama Peserta Didik</td>
                <td colspan="18">Kelompok A (Wajib)</td>
                <td colspan="9">Kelompok B (Wajib)</td>
                <td colspan="12">Kelompok C (Peminatan)</td>
                <td rowspan="2">Jumlah</td>
                <td colspan="3">Kehadiran</td>
            </tr>
            <tr>        
                <td colspan="3">Agama</td>
                <td colspan="3">PKN</td>
                <td colspan="3">B.Ind</td>
                <td colspan="3">MAT</td>
                <td colspan="3">Sej</td>
                <td colspan="3">B.Ing</td>

                <td colspan="3">Seni</td>
                <td colspan="3">POJK</td>
                <td colspan="3">PK</td>

                <td colspan="3">Bio</td>
                <td colspan="3">Fis</td>
                <td colspan="3">Kim</td>
                
                <td>S</td>
                <td>I</td>
                <td>T</td>
            </tr>

            <tr>
                <td></td>
                <td v-repeat="44" class="@{{$index}}">@{{$index +1}}</td>
            </tr>

            <tbody v-repeat="nilai: leger"
                style="border: black;" 
                class="@{{$index}}" 
            >

                <tr>
                    <td rowspan="3">@{{$index + 1}}</td>
                    <td style="text-align: left;" rowspan="3" v-repeat="student: nilai | limit 1">@{{student.student.nis}} / @{{student.student.name}}</span></td>

                    <td v-repeat="student: nilai">
                        <td>@{{student.score_knowledge}}</td> <td> @{{student.score_skill}} </td> <td>@{{student.score_attitude}}</td></td>
                    <td v-repeat="student: nilai">@{{student.letter_skill}}</td>
                    <td v-repeat="student: nilai">@{{student.score_attitude}}</td>
                </tr>
            </tbody>
        </table>    
    </div>
    <div v-repeat="nilai: leger">
        <div v-repeat="angka: nilai | limit 1">@{{angka.student.name}}</div>
    </div>
    <pre>@{{leger | json}}</pre>

    <!-- Scripts -->
    
    <!-- {!!Html::script(asset('js/jquery.slimscroll.min.js'))!!} -->
    {!!Html::script(asset('js/vue.min.js'))!!}
    {!!Html::script(asset('js/vue-resource.min.js'))!!}
    {!!Html::script(elixir('js/app.js'))!!}
    {!!Html::script('js/vue/leger.js')!!}
</body>
</html>
