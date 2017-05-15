<div class="page-title">
    {{-- <h3>{{$title}}</h3> --}}
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="{{route('operator.index')}}">Home</a></li>
            <li><a href="{{route('operator.index')}}">Dashboard</a></li>
            <li class="active">Operator</li>
            <li><a href="{{route($route)}}">{{$link}}</a></li>
            <li class="active">{{$id}}</li>
        </ol>
    </div>
    <span class="fa fa-calendar-o pull-right"> 
        {{\Carbon\Carbon::now(new DateTimeZone('Asia/Jakarta'))->format('D, d/M/Y')}}
    </span>
</div>