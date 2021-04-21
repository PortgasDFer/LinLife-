function cargar_datos(cp){
  console.log(cp);
  $.get('https://api-sepomex.hckdrk.mx/query/info_cp/'+cp+'?token=099e8302-1414-4f99-9f28-62c14163138c', function (data){
      console.log(data);
      var string = JSON.stringify(data)
      var datos = JSON.parse(string);
      document.registro.localidad.value=datos[0].response.municipio;
      document.getElementById("estado").value=datos[0].response.estado;
      $('#colonia').empty();
      $('#colonia').append('<option value="" class="form-control" disable="true" selected="true">Seleccione una colonia</option>');
      $.each(datos,function(fetch, colonia){
        $('#colonia').append('<option class="form-control" value="'+colonia.response.asentamiento+'" disable="true" selected="true">'+colonia.response.asentamiento+'</option>');
      })
  })
}
const d = document;
$selectEstados = d.getElementById("entidad");
function cargarEstados(){
  console.log($selectEstados);
  fetch("https://api-sepomex.hckdrk.mx/query/get_estados?token=099e8302-1414-4f99-9f28-62c14163138c")
  .then(res=>res.ok ? res.json():Promise.reject(res))
  .then(json=>{
    let $options = `<option value="" name="entidad" class="form-control">Elige un Estado</option>`;
    json.response.estado.forEach(el=>$options+=`<option name="entidad" class="form-control" value="${el}">${el}</option>`);
    $selectEstados.innerHTML=$options;
    console.log($options);
  })
  .catch(err=>{
      console.log(err);
      let message = err.statusText||"Ocurrió un error";
  });
}

d.addEventListener("DOMContentLoaded",e=>cargarEstados());