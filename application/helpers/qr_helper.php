<?php
class QR {
  //Reaizado a base del Model UTILIDADES del Comensal
	public static function codificar($restoId, $mesaNum, $codigoSeguridad)
  {
    $text=$restoId. "-" .$mesaNum. "-" .$codigoSeguridad ;
    $code=base64_encode(strrev(base64_encode( $text )));
    $code=strrev(str_replace("=", "", $code));
    $code=str_rot13($code);
    return $code;
  }

  public static function decodificar( $inforQr )
  {
    return base64_decode(strrev(base64_decode(strrev(str_rot13( $inforQr )))));
  }

  /*
  
  //$set_data = array(
  //      'username'  => $this->put('username'),
  //      'email'     => $this->put('email'),
  //      'zipcode'   => $this->put('zipcode'),
  //      'telephone' => $this->put('telephone'),
  //      'password'  => $this->put('password'),
  //);

  //$this->form_validation->set_data($set_data);


  public function formatoInfoQrValido( $informacion )
  {
    try
    {
      $data = explode('-', $informacion);
      if (count($data) != 3) { return false; }
      else
      {
        $values=array(
          'idResto' => $data[0],
          'numMesa' => $data[1],
          'codSeguridad' => $data[2]
        );
        $rules=array(
          'idResto' => array('required','int'),
          'numMesa' => array('required','int'),
          'codSeguridad' => array('required','regex:/^([a-zA-Z0-9]+)$/')
        );

        $errores = validate::test($values,$rules);

        return validate::success() ?  $values: false;
      }     
    } 
    catch (Exception $e)
    {
      return false;
    }
  }
  */
}