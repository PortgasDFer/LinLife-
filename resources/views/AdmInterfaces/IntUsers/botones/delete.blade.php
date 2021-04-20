<form method="POST" action="/usuarios/{{$slug}}">
	@method('DELETE')
	@csrf
	<a href="/usuarios/{{$slug}}"><button class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
</form> 