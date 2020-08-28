<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsultasi extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->verifyToken();

		$this->load->model('KonsultasiModel');
	}

	// Chatting
	public function getComment($id){
		$return = $this->KonsultasiModel->getCommentAll($id);
		if(!$return){
				$this->wrapper(false, null,'Comment not found',500);
		}
		$this->wrapper(true, $return,'success get Comment',200);
	}

	public function getCommentUser($id){
		$return = $this->KonsultasiModel->getCommentUser($id);
		if(!$return){
				$this->wrapper(false, null,'Comment not found',500);
		}
		$this->wrapper(true, $return,'success get Comment',200);
	}

	public function addComment(){
		$data = $this->input->post();
		$result = $this->KonsultasiModel->addDataComment($data);
    if(!$result){
        $this->wrapper(false, null,'failed',500);
    }
		$this->wrapper(true, null,'success',200);
	}

	public function editComment(){
		$data = $this->input->post();
		$where = array('id' => $data['id']);
		$result = $this->KonsultasiModel->editDataComment($where, $data);
		if(!$result){
				$this->wrapper(false, null,'failed',500);
		}
		$this->wrapper(true, null,'success',200);
	}

	public function editReadComment(){
		$data = $this->input->post();
		$result = $this->KonsultasiModel->editDataReadComment($data);
		if(!$result){
				$this->wrapper(false, null,'failed',500);
		}
		$this->wrapper(true, null,'success',200);
	}

	public function deleteComment(){
    $data = $this->input->post();
		$where = array('id' => $data['id']);
		$result = $this->KonsultasiModel->deleteDataComment($where);
		if(!$result){
        $this->wrapper(false, null,'failed',500);
    }
		$this->wrapper(true, null,'success',200);
	}

}
?>
