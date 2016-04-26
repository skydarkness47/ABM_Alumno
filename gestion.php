<?php
require "alumno.php";
//var_dump($_POST);


$alumno = new alumno($_POST['nombre'],$_POST['apellido'],$_POST['legajo'],$_FILES["archivo"]["name"]);
if(isset($_POST['alta'])){



$alumno->Guardar();

}elseif(isset($_POST['baja']))
{

Alumno::borrar($alumno);

}elseif(isset($_POST['modificacion']))
{
	Alumno::modificar($alumno);
}elseif(isset($_POST['traer_alumno']))
{
	
}
//Alumno::CrearTablaAlumnos();



header("location:index.php");
?>