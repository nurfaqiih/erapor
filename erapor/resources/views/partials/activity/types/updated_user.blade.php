<div class="inbox-item-img"><img src="{{$feed->user->thumbnail}}" class="img-circle" alt=""></div>
<p class="inbox-item-author">{{$feed->user->name}}</p>
@if($feed->subject->id == Auth::user()->id)
    <p class="inbox-item-text">Last Login at {{$feed->created_at->format('D M Y')}}</p>
@else
    <p class="inbox-item-text">Updated a User at {{$feed->created_at->format('D M Y')}}</p>
@endif
<p class="inbox-item-date">{{$feed->created_at->diffForHumans()}}</p>