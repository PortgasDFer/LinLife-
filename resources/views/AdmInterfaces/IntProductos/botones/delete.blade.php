<form method="POST" action="/productos/{{$code}}">
	@method('DELETE')
	@csrf
	<a href="/productos/{{$code}}"><button class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
</form> 