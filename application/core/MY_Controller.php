<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Firebase\JWT\JWT;

class MY_Controller extends MX_Controller {

    public $id=null;
    public $is_bidan=0;
    public $key="";
    public $basicAuth="";

	public function __construct(){
        parent::__construct();
        $this->key=$this->config->item('secret_key');
        $this->basicAuth=$this->config->item('basic_username').":".$this->config->item('basic_password');
        header("Content-type:application/json");
        header("Cache-Control: no-cache");
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding');
        //header('Access-Control-Max-Age: 1000');
        //header('Content-Length: 0');
        //$this->verifyToken();
    }

    public function errorNotFound() {
        echo json_encode(['error'=>'methodNotAllowed']);
    }

    public function httpStatus($code){
        $http = array(
            100 => 'HTTP/1.1 100 Continue',
            101 => 'HTTP/1.1 101 Switching Protocols',
            200 => 'HTTP/1.1 200 OK',
            201 => 'HTTP/1.1 201 Created',
            202 => 'HTTP/1.1 202 Accepted',
            203 => 'HTTP/1.1 203 Non-Authoritative Information',
            204 => 'HTTP/1.1 204 No Content',
            205 => 'HTTP/1.1 205 Reset Content',
            206 => 'HTTP/1.1 206 Partial Content',
            300 => 'HTTP/1.1 300 Multiple Choices',
            301 => 'HTTP/1.1 301 Moved Permanently',
            302 => 'HTTP/1.1 302 Found',
            303 => 'HTTP/1.1 303 See Other',
            304 => 'HTTP/1.1 304 Not Modified',
            305 => 'HTTP/1.1 305 Use Proxy',
            307 => 'HTTP/1.1 307 Temporary Redirect',
            400 => 'HTTP/1.1 400 Bad Request',
            401 => 'HTTP/1.1 401 Unauthorized',
            402 => 'HTTP/1.1 402 Payment Required',
            403 => 'HTTP/1.1 403 Forbidden',
            404 => 'HTTP/1.1 404 Not Found',
            405 => 'HTTP/1.1 405 Method Not Allowed',
            406 => 'HTTP/1.1 406 Not Acceptable',
            407 => 'HTTP/1.1 407 Proxy Authentication Required',
            408 => 'HTTP/1.1 408 Request Time-out',
            409 => 'HTTP/1.1 409 Conflict',
            410 => 'HTTP/1.1 410 Gone',
            411 => 'HTTP/1.1 411 Length Required',
            412 => 'HTTP/1.1 412 Precondition Failed',
            413 => 'HTTP/1.1 413 Request Entity Too Large',
            414 => 'HTTP/1.1 414 Request-URI Too Large',
            415 => 'HTTP/1.1 415 Unsupported Media Type',
            416 => 'HTTP/1.1 416 Requested Range Not Satisfiable',
            417 => 'HTTP/1.1 417 Expectation Failed',
            500 => 'HTTP/1.1 500 Internal Server Error',
            501 => 'HTTP/1.1 501 Not Implemented',
            502 => 'HTTP/1.1 502 Bad Gateway',
            503 => 'HTTP/1.1 503 Service Unavailable',
            504 => 'HTTP/1.1 504 Gateway Time-out',
            505 => 'HTTP/1.1 505 HTTP Version Not Supported',
        );
        return $http[$code];
    }

    public function wrapper($success,$data,$message,$code){
        $result=[
            "success"=>$success,
            "data"=>$data,
            "message"=>$message,
            "code"=>$code
        ];
        header($this->httpStatus($code));
        echo json_encode($result);
        exit();
    }

    public function basicAuth(){
        $header=$this->input->request_headers();
        if(empty($header['Authorization'])){
            $this->wrapper(false,null,"Forbidden",403);
        }
        $auth=explode(' ',$header['Authorization']);
        if($auth[0]!='Basic'){
            $this->wrapper(false,null,"unathorized",401);
        }

        if(trim($auth[1])!=trim(base64_encode($this->basicAuth))){
            $this->wrapper(false,null,"unathorized",401);
        }
    }

    public function generateToken($payload){

        $key = "klinik_key";
        $payload['exp'] = strtotime('+12 hour');

        return JWT::encode($payload,$key);

    }

    public function verifyToken(){
        $header=$this->input->request_headers();
        if(empty($header['Authorization'])){
            $this->wrapper(false,null,"unathorized",401);
        }
        $auth=explode(' ',$header['Authorization']);
        if($auth[0]!='Bearer'){
            $this->wrapper(false,null,"unathorized",401);
        }

        $key = "klinik_key";

        try{
            JWT::$leeway = 60; // $leeway in seconds
            $data = JWT::decode($auth[1], $key, array('HS256'));
        } catch (Exception $ex) {
            $this->wrapper(false,null,"Expired Token",401);
        }
        $now = strtotime(date('Y-m-d h:i:s'));
        if($data->exp < $now){
            $this->wrapper(false,null,"unathorized",401);
        }
        $this->id = $data->user_id;
        $this->is_bidan = $data->is_bidan;
    }
}
?>
