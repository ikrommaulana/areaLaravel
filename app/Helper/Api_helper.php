<?php 

namespace App\Helper;

class Api_helper{

    public static function GetApi($url){
        $client = new \GuzzleHttp\Client();
        $request = $client->get($url);
        $response = $request->getBody();
        // $data = $response->getContents(); //response String
        return json_decode($response); //response JSON
    }


    public static function PostApi($url,$body) {
        $client = new \GuzzleHttp\Client();
        $response = $client->request("POST", $url, ['form_params'=>$body]);
        $response = $client->send($response);
        return $response;
    }

}