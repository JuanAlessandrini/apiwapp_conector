<?php

namespace Juanalessandrini\Apiwapp\Conector;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Contracts\HttpClient\HttpClientInterface;


class ApiWappConector{

    private $api_url;
    private $token;
    private $version;
    private $client;
    

    public function __construct(EntityManagerInterface $em,HttpClientInterface $client)
    {
        $this->client = $client;
        $this->em = $em;
        if ($_ENV['APIWAPP_TOKEN'] == "yourToken"){
            throw new Exception("You must to fill the ApiWapp token into .env file. Go to vendor/juanalessandrini/apiwapp_conector to find it.", 1);
        }
        $this->token = $_ENV['APIWAPP_TOKEN'];
        $this->version = "v1/";
        $this->api_url = "https://www.apiwapp.com.ar/api/".$this->version;
        
    }
   

   
    public function getAccountBalance(){
        $response = $this->getContent('GET', 'account/get-balance' ,[], '');
        return $response;
    }

    public function sendMessage($template_uid, $params, $target){
        return $response = $this->getMethod('POST', 'send-message/template/'.$template_uid, $params, $target);
    }

    public function getMethod($method,$endpoint,$params, $target_phone) {
        
        $response = $this->client->request(
            $method,
            $this->api_url.$endpoint,[
                'headers' => [
                    'Accept' => 'application/json',
                    'X-AUTH-TOKEN' => $this->token,
                    'target-phone'=>$target_phone
                ],
                'body' => $params,
            ]
        );

        $statusCode = $response->getStatusCode();
        // $statusCode = 200
        
        // $content = $response->getContent();
        // $content = '{"id":521583, "name":"symfony-docs", ...}'
        $content = $response->toArray();
        // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]

        return $content;
        
    }

    public function getContent($method,$endpoint,$params) {
        
        $response = $this->client->request(
            $method,
            $this->api_url.$endpoint,[
                'headers' => [
                    'Accept' => 'application/json',
                    'X-AUTH-TOKEN' => $this->token,
                    'html'=>'true'
                ],
                'body' => $params,
            ]
        );

        $statusCode = $response->getStatusCode();
        // $statusCode = 200
        
        $content = $response->getContent();
        // $content = '{"id":521583, "name":"symfony-docs", ...}'
        // $content = $response->toArray();
        // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]

        return $content;
        
    }

}