<span class="fa fa-calendar-o pull-right"> 
    <span class="hidden-xs hidden-sm">{{\Carbon\Carbon::now(new DateTimeZone('Asia/Jakarta'))->format('D, d/M/Y')}} |</span>
    Tahun Ajar : {{Config::get('kalender.year')}} Semester : {{Config::get('kalender.semester')}}
</span>