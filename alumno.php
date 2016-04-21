<?php
require "index.php";


 class Alumno
  {


public $nombre;
public $apellido;
public $legajo;
public $foto;

	public function __construct($nombre,$apellido,$legajo,$foto)
		{

			$this->nombre = $nombre;
			$this->apellido=$apellido;
			$this->legajo=$legajo;
			$this->foto=$foto;
		
		}
		public  function Guardar()
		{

		$archivo=fopen("alumno.txt", "a");//escribe y mantiene la informacion existente		
	
		$renglon=$this->nombre."=>".$this->apellido."=>".$this->legajo."=>".$this->foto."\n";		 
		if(fwrite($archivo,$renglon))
		{
			move_uploaded_file($_FILES['archivo']['tmp_name'],"Fotitos/$this->foto");
			fclose($archivo);
			return true;
		}else  {
			fclose($archivo);
			return false;
		}			
	
		}

public static function modificar($alumno)
{
	$bool = false;

		 $ListaDeAlumnos= Alumno::TraerTodos();
		 $archivo=fopen("alumno.txt", "w");
		 foreach ($ListaDeAlumnos as $item) 
		 {

 			$item[2]=trim($item[2]);
 				if($alumno->legajo == $item[2])
 				{
					$renglon="";
 					$renglon=$alumno->nombre."=>".$alumno->apellido."=>".$alumno->legajo."=>".$alumno->foto."\n";
					
 					$bool = true;
 	             }else {

						$renglon=$item[0]."=>".$item[1]."=>".$item[2]."=>".$item[3]."\n";
	 	             }
	 	            
	 	             	
	 	        fwrite($archivo,$renglon);
          
          }

			
		fclose($archivo);
	

return $bool;
}


 

public static function borrar($alumno)
{
	$bool = false;

		 $ListaDeAlumnos= Alumno::TraerTodos();
		 $archivo=fopen("alumno.txt", "w");
		 foreach ($ListaDeAlumnos as $item) 
		 {

 			$item[2]=trim($item[2]);
 				if($alumno->legajo == $item[2])
 				{
 					$renglon="";
					
 					$bool = true;
 	             }else {
 	             	
						$renglon=$item[0]."=>".$item[1]."=>".$item[2]."=>".$item[3]."\n";
	 	             }
	 	            
	 	             	
	 	        fwrite($archivo,$renglon);
          
          }

			
		fclose($archivo);
	

return $bool;
	  return $bool;
	
	
}





public static function TraerTodos()
{
	$ListaDeAlumnos=  array();
		$archivo=fopen("alumno.txt","r");//escribe y mantiene la informacion existente

		while(!feof($archivo))
		{
			$renglon=fgets($archivo);
			//http://www.w3schools.com/php/func_filesystem_fgets.asp
			$alumnos=explode("=>", $renglon);
			//http://www.w3schools.com/php/func_string_explode.asp
			$alumnos[0]=trim($alumnos[0]);
			if($alumnos[0]!="")
				$ListaDeAlumnos[]=$alumnos;
		}

		fclose($archivo);
		return $ListaDeAlumnos;
	
}

public static function TraerUnAlumno($legajo)
{
	$bool = false;
	$alumno;
		$archivo=fopen("alumno.txt","r");//escribe y mantiene la informacion existente

		while(!feof($archivo))
		{
			$renglon=fgets($archivo);
			//http://www.w3schools.com/php/func_filesystem_fgets.asp
			$alumnos=explode("=>", $renglon);
			//http://www.w3schools.com/php/func_string_explode.asp
		if($alumnos[0]!="")
				if($legajo == $alumnos[2])
			{

				$bool=true;
				$alumno=$alumnos;	

			}
		}
		if($bool)
		{
			return $alumno;
		}else
		{
			return "NO EXISTE";
		}


		fclose($archivo);
		
	
}




public static function CrearTablaAlumnos()
	{
		if(file_exists("archivos/alumno.txt"))
			{
				$cadena=" <table border=1><th> NOMBRE </th><th> APELLIDO </th><th> FOTO </th><th> LEGAJO</th>";

				$archivo=fopen("alumno.txt", "r");

			    while(!feof($archivo))
			    {
				      $archAux=fgets($archivo);
				      //http://www.w3schools.com/php/func_filesystem_fgets.asp
				      $alumno=explode("=>", $archAux);
				      //http://www.w3schools.com/php/func_string_explode.asp
				      $alumno[0]=trim($alumno[0]);
				      if($alumno[0]!="")
				       $cadena =$cadena."<tr> <td> ".$alumno[0]."</td> <td>  ".$alumno[1] ."</td> <td> <img src=Fotitos/".$alumno[2]. "></td><td>".$alumno[3]."</td> </tr>" ; 
				}

		   		$cadena =$cadena." </table>";
		    	fclose($archivo);

				$archivo=fopen("archivos/tablaalumnos.php", "w");
				fwrite($archivo, $cadena);




			}	else
			{
				$cadena= "no hay alumnos";

				$archivo=fopen("tablaalumnos.php", "w");
				fwrite($archivo, $cadena);
			}

	}




}
	
			
		
	

?>