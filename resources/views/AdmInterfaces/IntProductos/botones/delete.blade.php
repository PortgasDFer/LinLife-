<form method="POST" action="/productos/{{$code}}">
	@method('DELETE')
	@csrf
	<button type="submit" class="btn btn-danger btn-sm confirm_delete" data-toggle="tooltip" title='Delete'><i class="fa fa-trash-o" aria-hidden="true"></i></button>
</form> 

<script type="text/javascript">
      $('.confirm_delete').click(function(event) {
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: `¿Está seguro de que desea eliminar este Proyecto?.`,              
            text: "Si borra esto, desaparecerá para siempre.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            buttons: ['Cancelar', 'Confirmar']
        })
        .then((willDelete) => {
          if (willDelete) {
            form.submit();
          }
        });
    });
    </script>