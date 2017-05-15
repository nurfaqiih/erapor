<div class="inbox-item-img"><img src="{{$feed->user->thumbnail}}" class="img-circle" alt=""></div>
<p class="inbox-item-author">{{$feed->user->username}}</p>
<p class="inbox-item-text">create a rapor at {{$feed->created_at->format('D M Y')}}</p>
<p class="inbox-item-date">{{$feed->created_at->diffForHumans()}}</p>