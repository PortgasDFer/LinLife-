<form method="POST" action="/promociones/{{$id}}">
	@method('DELETE')
	@csrf
	<a href="/promociones/{{$id}}"><button class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
</form> 