<div class="col-xs-12 left">
	<div class="menu-lateral ">
	<ul class="nav flex-column">
		<li class="nav-item">
			<a class="nav-link active text-center" href="#">@include('home.profile-image', array('image' =>  Auth::user()->image))</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#"><i class="fas fa-id-card"></i>Cosas</a>
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
		<li class="nav-item">
			<form>
					<input type="text" value="" placeholder="Buscar" />
				</form>
		</li>
	</ul>
</div>
</div>
