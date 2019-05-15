<div class="col-xs-12 left">
	<div class="menu-lateral ">
		<ul class="nav flex-column">
			<li class="nav-item">
				<a class="nav-link active text-center" href="#">@include('home.profile-image', array('image' =>  Auth::user()->image))</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#"><i class="fas fa-id-card"></i>Inicio</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#"><i class="fas fa-comment-alt"></i>Noticias</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#"><i class="fas fa-at"></i>Messenger</a>
			</li>
			<li class="nav-item">
				<a class="nav-link disabled" href="#"><i class="fas fa-comments"></i>Chat</a>
			</li>
			<li class="nav-item">
				<a class="nav-link disabled" href="#"><i class="fas fa-highlighter"></i>Administrar</a>
			</li>
			
			<li class="nav-item">&nbsp;</li>
			
			<li class="nav-item">
				
			</li>
		</ul>

		<div class="search">
			<form name="form-search" id="form-search" method="post" action="{{route('buscador')}}" class="form-search">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input class="col-xs-11 " name="search-text" type="search" placeholder="Buscar en la web" aria-label="Search" value="{{old('search-text')}}">
				<button class="btn btn-submit col-xs-1" type="submit"><i class="fas fa-search"></i>
				</button>
			</form>
		</div>
  </div>
</div>