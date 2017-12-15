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
        $datos = array($co->_id,$co->email,$co->username,$co->nombre,$co->apellido,$co->fechaDeNacimiento);
        return $datos;
 	}
 }
?>