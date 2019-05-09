<div class="col-xs-12 left">
	<div class="menu-lateral ">
	<ul class="nav flex-column">
		<li class="nav-item">
			<a class="nav-link active" href="#">@include('home.profile-image', array('image' =>  Auth::user()->image))</a>
		</li>
		<li class="nav-item">
			<a class="nav-link active" href="#">{{Auth::user()->name}} {{Auth::user()->surname}}</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#">Noticias</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#">Messenger</a>
		</li>
		<li class="nav-item">
			<a class="nav-link disabled" href="#">Chat</a>
		</li>
		<li class="nav-item">
			<a class="nav-link disabled" href="#">Administrar</a>
		</li>
		<li class="nav-item">
			<form>
					<input type="text" value="" placeholder="Buscar" />
				</form>
		</li>
	</ul>
</div>
</div>
