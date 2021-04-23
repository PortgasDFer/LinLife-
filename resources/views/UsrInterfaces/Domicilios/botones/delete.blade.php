<form method="POST" action="/domicilios/{{$id}}">
	@method('DELETE')
	@csrf
	<a href="/domicilios/{{$id}}"><button class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
</form> 