
@if ( Storage::disk('profiles')->has($image) )
    <img src="{{ route('getUserImage',$image) }}" class="img-fluid img-thumbnail img-rounded">
@else
    <img src="{{ route('getUserImage','default.jpg') }}" class="img-fluid img-thumbnail img-rounded">
@endif