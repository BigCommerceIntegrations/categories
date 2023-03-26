<?php

namespace BigCommerceIntegrations\Categories\Connectors;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class BCApi
{

  private $url;
  private $token;

  public function __construct()
  {
    $this->url = env('BC_URL');
    $this->token = env('BC_STORE_TOKEN');
  }

  public function call($url, $fields, $method){
    try{
        if($method == "GET") $response = Http::withHeaders($this->getRequiredHeaders())->get( $url );
        if($method == "POST") $response = Http::withHeaders($this->getRequiredHeaders())->post( $url, $fields );
        if($method == "PUT") $response = Http::withHeaders($this->getRequiredHeaders())->put( $url, $fields );
        if($method == "DELETE") $response = Http::withHeaders($this->getRequiredHeaders())->delete( $url );
        
        $response->asJson();

        return $response;
    }catch (\Exception $exception){
    }
}

  public function getRequiredHeaders(){
      return [
          'Accept' => 'application/json',
          'Content-Type' => 'application/json',
          'X-Auth-Token' => $this->token
      ];
  }

}
