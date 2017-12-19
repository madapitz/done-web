<?php

 class Token{
 	private $tokenid;

 	public function Token($id){
 		$this->tokenid = $id;
 	}



public function ConsultarDatosUsuario(){
 	$url = 'https://intense-lake-39874.herokuapp.com/usuarios/me';
    //Iniciar cURL
    $ch = curl_init($url);
    $curl_headers = array();
		$curl_headers[] = 'X-AUTH: '.$this->tokenid;
		curl_setopt($ch, CURLOPT_HTTPHEADER, $curl_headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     $json = curl_exec($ch);

		$co =json_decode($json);
    curl_close($ch);

    $datos = array($co->_id,$co->email,$co->username,$co->nombre,$co->apellido,$co->fechaDeNacimiento);
    return $datos;
 	}



public function ConsultarTareas(){
  $url = 'https://intense-lake-39874.herokuapp.com/tareas';
    //Iniciar cURL
    $ch = curl_init($url);
    $curl_headers = array();
    $curl_headers[] = 'X-AUTH: '.$this->tokenid;
    curl_setopt($ch, CURLOPT_HTTPHEADER, $curl_headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

     $json = curl_exec($ch);
     $co =json_decode($json);
     $datos = array($co->tarea);


    if (sizeof($datos[0])==0){
      echo "* Aun no tiene tareas registradas :( ";
    } else{
   for ($i = 0; $i<sizeof($datos[0]); $i++){
      echo " * Tarea ".($i+1)."<br>";
      echo "Titulo: ". $datos[0][$i]->titulo. "<br>";
      echo "Descripcion: ". $datos[0][$i]->descripcion. "<br>";
      echo "<br><br>";
     }
    }
     curl_close($ch);
  }




 }
?>
