<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->verifyToken();

		$this->load->model('RegistrasiModel');
	}

	public function index($idUser){
		$return = $this->RegistrasiModel->getAllData($idUser);
		if(!$return){
				$this->wrapper(false, null,'Registrasi not found',500);
		}
		$this->wrapper(true, $return,'success get registrasi',200);
	}

	public function getOne($idUser, $id){
		$return = $this->RegistrasiModel->getOneData($idUser, $id);
		if(!$return){
				$this->wrapper(false, null,'Registrasi not found',500);
		}
		$this->wrapper(true, $return,'success get registrasi',200);
	}

	// user
	public function getByUser(){
		$return = $this->RegistrasiModel->getAllData($this->id);
		if(!$return){
				$this->wrapper(false, null,'Registrasi not found',500);
		}
		$this->wrapper(true, $return,'success get registrasi',200);
	}

	public function getOneByUser($id){
		$return = $this->RegistrasiModel->getOneData($this->id, $id);
		if(!$return){
				$this->wrapper(false, null,'Registrasi not found',500);
		}
		$this->wrapper(true, $return,'success get registrasi',200);
	}

	public function create(){
    $data = $this->input->post();
		$result = $this->RegistrasiModel->addData($data);
    if(!$result){
        $this->wrapper(false, null,'failed',500);
    }
		$this->wrapper(true, null,'success',200);
  }

	public function edit(){
    $data = $this->input->post();
		$where = array('id' => $data['id']);
		$result = $this->RegistrasiModel->editData($where, $data);
    if(!$result){
        $this->wrapper(false, null,'failed',500);
    }
		$this->wrapper(true, null,'success',200);
  }

	public function delete(){
    $data = $this->input->post();
		$where = array('id' => $data['id']);
		$result = $this->RegistrasiModel->deleteData($where);
		if(!$result){
        $this->wrapper(false, null,'failed',500);
    }
		$this->wrapper(true, null,'success',200);
	}

}
?>
