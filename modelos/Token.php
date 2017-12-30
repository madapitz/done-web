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
      curl_close($ch);
      return $datos;
  }





  ///////////////////////////////////////////////
public function PostTareas($titulo, $descripcion/*, $fecha*/){

      $data = array(
        'titulo' => $titulo,
        'descripcion' => $descripcion,
        //'fechaParaSerCompletada' => $fecha
      );
      $json = json_encode($data);
      $url = 'https://intense-lake-39874.herokuapp.com/tareas';
      //el url del curl
      $ch = curl_init($url);
  $this->tokenid = substr($this->tokenid,0,-2);
  $tokenid = $this->tokenid;
  $st2 = "x-auth: ".$tokenid;
    curl_setopt_array($ch, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => $json,
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        $st2
      )
    ));
  $response = curl_exec($ch);
  $err = curl_error($ch);
  curl_close($ch);
    if ($err) {
       echo "cURL Error #:".$err;
    } else {
       echo $response;
    }
}
///////////////////////////////////////////





public function BorrarToken(){
  $url = 'https://intense-lake-39874.herokuapp.com/usuarios/me';
  //Iniciar cURL
  $ch = curl_init($url);
  $curl_headers = array();
  $curl_headers[] = 'X-AUTH: '.$this->tokenid;
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
  curl_setopt($ch, CURLOPT_HTTPHEADER, $curl_headers);
   $json = curl_exec($ch);
   $co =json_decode($json);
    curl_close($ch);
 }

}
?>
