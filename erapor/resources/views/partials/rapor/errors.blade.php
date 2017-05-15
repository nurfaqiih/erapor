<span id="{{$var}}1" style="color: red;" v-show="errors.{{$var}}.max">*Nilai Maximal 100</span>
<span id="{{$var}}2" style="color: red;" v-show="errors.{{$var}}.required">*Tidak boleh kosong</span>
<span id="{{$var}}3" style="color: red;" v-show="errors.{{$var}}.numeric">*Input harus berupa angka (0 - 100)</span>