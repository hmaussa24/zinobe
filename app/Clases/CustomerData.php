<?php

class CustomerData{
   private  $curl;

   function __construct() {
    $this->curl = curl_init();
   }

   function consultarSisben($documento){
    curl_setopt_array($this->curl, array(
        CURLOPT_URL => "https://api.misdatos.com.co/api/co/sisben/consultarPuntaje",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "documentType=CC&documentNumber=".$documento,
        CURLOPT_HTTPHEADER => array(
          "Authorization: 6gz9hpl6rnlgkkedz9jcs6is83u409mu",
          "Content-Type: application/x-www-form-urlencoded"
        ),
      ));

      //echo $documento;

      if( !$response = curl_exec($this->curl))
        {
            trigger_error(curl_error($this->curl));
        }else{
          curl_close($this->curl);
          return $response;
        }
        
   }

   function consultraConductor($documento){
    curl_setopt_array($this->curl, array(
        CURLOPT_URL => "https://api.misdatos.com.co/api/co/runt/consultarConductor",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "documentType=CC&documentNumber=".$documento,
        CURLOPT_HTTPHEADER => array(
          "Authorization: 6gz9hpl6rnlgkkedz9jcs6is83u409mu",
          "Content-Type: application/x-www-form-urlencoded"
        ),
      ));
      
      if( !$response = curl_exec($this->curl))
        {
            trigger_error(curl_error($this->curl));
        }else{
          curl_close($this->curl);
          return $response;
        }
   }
}