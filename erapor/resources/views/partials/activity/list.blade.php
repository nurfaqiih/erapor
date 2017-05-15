@foreach($feeds as $feed)
    <div class="inbox-item">
        @include("partials.activity.types.{$feed->name}")
    </div>
@endforeach