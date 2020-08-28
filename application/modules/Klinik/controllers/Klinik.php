<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klinik extends MY_Controller {

	public function __construct(){
		parent::__construct();
		// $this->verifyToken();
		$this->load->model('JadwalModel');
	}

	public function index(){
		$this->verifyToken();
		$return = $this->JadwalModel->getAllData();
		if(!$return){
				$this->wrapper(false,null,'jadwal klinik not found',500);
		}
		$this->wrapper(true,$return,'success get jadwal klinik',200);
	}

	public function lastSchedule(){
		$this->verifyToken();
		$return = $this->JadwalModel->getLastData();
		if(!$return){
				$this->wrapper(false, null,'jadwal klinik not found',500);
		}
		$this->wrapper(true, $return,'success get jadwal klinik',200);
	}

	public function create(){
    $this->verifyToken();

    $data = $this->input->post();
		$data['bidan_id'] = $this->id;
		$result = $this->JadwalModel->addData($data);
    if(!$result){
        $this->wrapper(false, null,'failed',500);
    }
		$this->wrapper(true, null,'success',200);
  }

	public function edit(){
    $this->verifyToken();

    $data = $this->input->post();
		$where = array('id' => $data['id']);
		$result = $this->JadwalModel->editData($where, $data);
    if(!$result){
        $this->wrapper(false, null,'failed',500);
    }
		$this->wrapper(true, null,'success',200);
  }

	public function delete(){
		$this->verifyToken();

    $data = $this->input->post();
		$where = array('id' => $data['id']);
		$result = $this->JadwalModel->deleteData($where);
		if(!$result){
        $this->wrapper(false, null,'failed',500);
    }
		$this->wrapper(true, null,'success',200);
	}

}
?>
