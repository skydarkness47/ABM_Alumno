<?php
   require "alumno.php";
Alumno::CrearTablaAlumnos();


?>

<html>
<head>
	<title></title>
</head>
<body>
<form action="gestion.php" method="POST" enctype="multipart/form-data">

<input type= "text" name="nombre" value="nombre"> NOMBRE	<br>
<input type= "text" name="apellido" value="apellido"> APELLIDO <br>
<input type= "text" name="legajo" value="legajo"> LEGAJO <br>

  <input type="file" name="archivo" class="MiBotonUTNLinea" title="archivo" id="autocomplete"  /> <br>
  <input type="submit"  name="alta" value="CREAR_ALUMNO">
  <input type="submit"  name="baja" value="BORRAR">
  <input type="submit"  name="modificacion" value="modificar">
   <input type="submit"  name="traer_alumno" value="traer">
   <?php 

     include("tablaalumnos.php");

     ?>
</form>


</body>
</html>