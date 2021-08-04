<form method="POST" action="/productos/{{$code}}">
	@method('DELETE')
	@csrf
	<button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" title='Delete'><i class="fa fa-trash-o" aria-hidden="true"></i></button>
</form> 
