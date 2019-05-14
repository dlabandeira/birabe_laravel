
@if ( Storage::disk('profiles')->has($image) )
    <img src="{{ route('getUserImage',$image) }}" class="img-rounded img-profile" title="{{Auth::user()->name}} {{Auth::user()->surname}}">
@else
    <img src="{{ route('getUserImage','default.jpg') }}" class="img-rounded img-profile" title="{{Auth::user()->name}} {{Auth::user()->surname}}">
@endif