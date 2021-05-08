<!DOCTYPE html>
<html>
<head>
    <title>Tiene un mensaje nuevo</title>
</head>
<body>
   
<center>
<h2 style="padding: 23px;background: #19CFE8;border-bottom: 6px #072AD6 solid; color: white;">
    <a href="" style="color:white;">StrawHatSystems</a>
</h2>
</center>
  
<p>Hola <br>
	Tienes un mensaje nuevo:</p>
<p>
	<strong>De:</strong>  {{$mensaje['nombre']}}<br>
	<strong>Correo:</strong>  {{$mensaje['email']}}<br>
	<strong>Tema:</strong> {{$mensaje['tema']}}<br>
	<strong>Mensaje:</strong><br>
	 {{$mensaje['mensaje']}}
</p>
  
<strong>Gracias por su atención ;)</strong>
<img src="/recursos/linlife.png">
  
</body>
</html>