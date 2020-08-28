<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends MY_Controller {
	
	public function __construct(){
        parent::__construct();
    }
    
    public function index(){
        echo json_encode(['success'=>true,'data'=>'service running properly']);
        exit();
    }

	public function routerNotFoundHandler()
	{
        header($this->httpStatus(405));
        echo json_encode(['error'=>'methodNotAllowed','method'=>uri_string()]);
        exit();
    }
	
}
?>