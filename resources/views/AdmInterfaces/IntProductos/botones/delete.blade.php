<form method="POST" action="/productos/{{$code}}">
	@method('DELETE')
	@csrf
	<button class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
</form> 