<?php

namespace App\Services ;

use GuzzleHttp\Client ; 
use Illuminate\Support\Facades\Http;

class ServicesDB 
{
    protected $url ;
    protected $http;

    public function __construct()
    {
        $this->url = 'http://swapi.dev/api' ;
        $this->http = new Client() ;
        
    }

    public function getData(String $uri )
    {
        $full_path = $this->url;
        $full_path .= $uri;
        $response = $this->http->get($full_path, [
            'timeout'         => 30,
            'connect_timeout' => true,
            'http_errors'     => true,
        ]); 
        return $response->getBody()->getContents() ;
    
    }

    public function parseData ()
    {

    }

    public function saveToBDD ()
    {

    }
    public function init ()
    {
      $data = $this->getData("/films");
      $this->parseData($data);
    }
}









