<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekammedis extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->verifyToken();

		$this->load->model('RekammedisModel');
	}

	public function index($idreg){
		$return = $this->RekammedisModel->getAllData($idreg);
		if(!$return){
				$this->wrapper(false, null,'data not found',500);
		}
		$this->wrapper(true, $return,'success get data',200);
	}

	public function getOne($id){
		$return = $this->RekammedisModel->getOneData($id);
		if(!$return){
				$this->wrapper(false, null,'data not found',500);
		}
		$this->wrapper(true, $return,'success get data',200);
	}

	public function getLastPeriksa(){
		$return = $this->RekammedisModel->getLastData($this->id);
		if(!$return){
				$this->wrapper(false, null,'data not found',500);
		}
		$this->wrapper(true, $return,'success get data',200);
	}

	public function create(){
    $data = $this->input->post();
		$data['bidan_id'] = $this->id;
		$result = $this->RekammedisModel->addData($data);
    if(!$result){
        $this->wrapper(false, null,'failed',500);
    }
		$this->wrapper(true, null,'success',200);
  }

	public function edit(){
    $data = $this->input->post();
		$where = array('id' => $data['id']);
		$result = $this->RekammedisModel->editData($where, $data);
    if(!$result){
        $this->wrapper(false, null,'failed',500);
    }
		$this->wrapper(true, null,'success',200);
  }

	public function delete(){
    $data = $this->input->post();
		$where = array('id' => $data['id']);
		$result = $this->RekammedisModel->deleteData($where);
		if(!$result){
        $this->wrapper(false, null,'failed',500);
    }
		$this->wrapper(true, null,'success',200);
	}

}
?>
