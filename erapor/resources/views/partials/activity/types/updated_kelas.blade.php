<div class="inbox-item-img"><img src="{{$feed->user->thumbnail}}" class="img-circle" alt=""></div>
<p class="inbox-item-author">{{$feed->user->name}}</p>
<p class="inbox-item-text">update a kelas at {{$feed->created_at->format('D M Y')}}</p>
<p class="inbox-item-date">{{$feed->created_at->diffForHumans()}}</p>