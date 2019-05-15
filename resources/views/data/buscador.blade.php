@extends('layouts.app')

@section('content')

<div class="row">

    <div class="col-md-12 ">
    	<h3>Resultados en Publicaciones</h3>
    	@if(count($results_posts))
    		
			@foreach($results_posts as $search)
				@include('data.search')
			@endforeach
		@else
			<p>No hay resultados en las publicaciones para la búsqueda indicada</p>
		@endif
		
		<h3>Resultados en Comentarios</h3>
		@if(count($results_comments))
			
			@foreach($results_comments as $search)
				@include('data.search')
			@endforeach
		@else
			<p>No hay resultados en los comentarios para la búsqueda indicada</p>
		@endif
    </div>
</div>

@endsection