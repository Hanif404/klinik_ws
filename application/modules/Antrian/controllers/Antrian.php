<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Antrian extends MY_Controller {

	public function __construct(){
		parent::__construct();
		// $this->verifyToken();
		$this->load->model('AntrianModel');
	}

	public function index(){
		$this->verifyToken();
		$return = $this->AntrianModel->getLastData($this->id);
		if(!$return){
				$this->wrapper(false,null,'antrian not found',500);
		}
		$this->wrapper(true,$return,'success get antrian',200);
	}

	public function create(){
    $this->verifyToken();

		$no_urut = $this->AntrianModel->getNoUrut();
		if(count($no_urut) > 0){
			$no_urut = $no_urut[0]['no_urut']+1;
		}else{
			$no_urut = 1;
		}
		$check = $this->AntrianModel->checkOpenKlinik();
		if(count($check) > 0){
			if($check[0]['is_close'] == '0'){
				$data = [
					'user_id' => $this->id,
					'no_urut' => $no_urut,
					'jadwal_id' => $check[0]['id']
				];
				$result = $this->AntrianModel->addData($data);
				if(!$result){
						$this->wrapper(false, null,'failed',500);
				}

				$obj = new \stdClass();
				$obj->no = $no_urut;
				$this->wrapper(true, $obj,'success',200);
			}else{
				$this->wrapper(false, null,'Klinik sudah tutup',404);
			}
		}else{
			$this->wrapper(false, null,'Klinik belum buka',404);
		}
  }

	public function edit(){
    $this->verifyToken();

    $data = $this->input->post();
		$where = array('id' => $data['id']);
		$result = $this->AntrianModel->editData($where, $data);
    if(!$result){
        $this->wrapper(false, null,'failed',500);
    }
		$this->wrapper(true, null,'success',200);
  }

	public function delete(){
		$this->verifyToken();

    $data = $this->input->post();
		$where = array('id' => $data['id']);
		$result = $this->AntrianModel->deleteData($where);
		if(!$result){
        $this->wrapper(false, null,'failed',500);
    }
		$this->wrapper(true, null,'success',200);
	}

}
?>
