<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Adminmodel');
		
	}

	public function index()
	{
		$param = array();
		$data['kuota'] = $this->Adminmodel->getEvent($param);

		$jmlpart = $this->Adminmodel->getCountPart();
		//$jumlkuota = $this->Adminmodel->

		$this->load->view('admin',$data);
	}
	
	public function Category()
	{
		$this->load->view('Category_View');
	}
	
	public function addCategori(){
		$data=$this->input->post();
		//print_r($data);
		$result= $this->Adminmodel->saveCategory($data);
		if ($result){
			$message['state']='1';
			$message['message']='Data Berhasil di Simpan';
			echo json_encode($message);
		} else {
			$message['state']='0';
			$message['message']='Data Tidak Berhasil di Simpan';
			echo json_encode($message);
		}
	}

	public function getCategory(){
		$param = array(); 
		$data =$this->Adminmodel->getCategory($param);
		$result = null;
		foreach($data as $i=>$row){
			$result[$i]=$row;
			$result[$i]['No']=($i+1);
			$result[$i]['Aksi']="<div class='text-center'><button type='button' class='btn btn-sm btn-primary btn-edit' data-edit='".json_encode($row)."' data-action='".base_url('Welcome/editCategory')."'><i class='fa fa-edit'></i></button>
								 <button type='button' class='btn btn-sm btn-delete btn-danger' data-delete='".json_encode($row)."' data-action='".base_url('Welcome/deleteCategory')."'><i class='fa fa-trash'></i></button></div>";
		}
		echo json_encode($result);
	}

	public function editCategory(){
		$data=$this->input->post();
		$where =array('id'=> $this->input->post('id'));
		unset($data['id']);
		$result= $this->Adminmodel->editCategory($data,$where);
		if ($result){
			$message['state']='1';
			$message['message']='Data Berhasil di Ubah';
			echo json_encode($message);
		} else {
			$message['state']='0';
			$message['message']='Data Tidak Berhasil di Ubah';
			echo json_encode($message);
		}

	}

	public function deleteCategory(){
		$where =array('id'=> $this->input->post('id'));
		$result= $this->Adminmodel->hapusCategory($where);
		if ($result){
			$message['state']='1';
			$message['message']='Data Berhasil di Hapus';
			echo json_encode($message);
		} else {
			$message['state']='0';
			$message['message']='Data Tidak Berhasil di Hapus';
			echo json_encode($message);
		}	
	}

	//Block Event
	public function Event()
	{
		$param = array(); 
		$data['category'] = $this->Adminmodel->getCategory($param);
		$this->load->view('Event_View',$data);

	}

	public function getEvent(){
		$param = array(); 
		$data =$this->Adminmodel->getEvent($param);
		$result = [];
		foreach($data as $i=>$row){
			$result[$i]=$row;
			$result[$i]['No']=($i+1);
			$result[$i]['StartDate'] = date('d M Y',strtotime($row['date_a']));
			$result[$i]['EndDate'] = date('d M Y',strtotime($row['date_b']));
			$result[$i]['Aksi']="<div class='text-center'><button type='button' class='btn btn-sm btn-primary btn-edit' data-edit='".json_encode($row)."' data-action='".base_url('Welcome/editEvent')."'><i class='fa fa-edit'></i></button>
								 <button type='button' class='btn btn-sm btn-delete btn-danger' data-delete='".json_encode($row)."' data-action='".base_url('Welcome/deleteEvent')."'><i class='fa fa-trash'></i></button></div>";
		}
		echo json_encode($result);
	}

	public function uploadFile($file){
		$this->load->library('upload');
		$config['upload_path']=FCPATH."assets/img";
		$config['allowed_types']='png|jpg';
		$config['max_size']=500000;
		//$config['file_name']=$name;
		//$config['overwrite']=TRUE;
		$this->upload->initialize($config);
		$result="";
		if($this->upload->do_upload($file)){
			$result=$this->upload->data('file_name');
		}else{
			//print_r($this->upload->display_errors());
		}
		return $result;
		
	}

	public function addEvent(){
		$data=$this->input->post();
		$tgl= $this->input->post('date_a');
		$tgl2= $this->input->post('date_b');
		$data['banner'] = $this->uploadFile('banner');
		$data['date_a'] = date('Y-m-d',strtotime($tgl));
		$data['date_b'] = date('Y-m-d',strtotime($tgl2));
		
		$result=[];
		$result= $this->Adminmodel->saveEvent($data);
		if ($result){
			$message['state']='1';
			$message['message']='Data Berhasil di Simpan';
			echo json_encode($message);
		} else {
			$message['state']='0';
			$message['message']='Data Tidak Berhasil di Simpan';
			echo json_encode($message);
		}
	}

	public function editEvent(){
		$data=$this->input->post();
		$where =array('id'=> $this->input->post('id'));
		$tgl= $this->input->post('date_a');
		$tgl2= $this->input->post('date_b');
		$data['banner'] = $this->uploadFile('banner');
		$data['date_a'] = date('Y-m-d',strtotime($tgl));
		$data['date_b'] = date('Y-m-d',strtotime($tgl2));
		unset($data['id']);
		$result= $this->Adminmodel->editEvent($data,$where);
		if ($result){
			$message['state']='1';
			$message['message']='Data Berhasil di Ubah';
			echo json_encode($message);
		} else {
			$message['state']='0';
			$message['message']='Data Tidak Berhasil di Ubah';
			echo json_encode($message);
		}
	}

	public function deleteEvent(){
		$where =array('id'=> $this->input->post('id'));
		$result= $this->Adminmodel->deleteEvent($where);
		if ($result){
			$message['state']='1';
			$message['message']='Data Berhasil di Hapus';
			echo json_encode($message);
		} else {
			$message['state']='0';
			$message['message']='Data Tidak Berhasil di Hapus';
			echo json_encode($message);
		}	
	}

	//block participant
	 public function participant() {

	 	$param = array();
	 	$data['Part'] = $this->Adminmodel->getEvent($param);
	 	$this->load->view('Participant_View',$data);
	 }

	 public function getPArticipant(){
		$param = array(); 
		$data =$this->Adminmodel->getParticipant($param);
		$result = [];
		foreach($data as $i=>$row){
			$result[$i]=$row;
			$result[$i]['No']=($i+1);
			$result[$i]['Aksi']="<div class='text-center'><button type='button' class='btn btn-sm btn-primary btn-edit' data-edit='".json_encode($row)."' data-action='".base_url('Welcome/editParticipant')."'><i class='fa fa-edit'></i></button>
								 <button type='button' class='btn btn-sm btn-delete btn-danger' data-delete='".json_encode($row)."' data-action='".base_url('Welcome/deleteParticipant')."'><i class='fa fa-trash'></i></button></div>";
		}
		echo json_encode($result);
	}

	 public function addParticipant(){
		$data=$this->input->post();
		$result=[];
		$result= $this->Adminmodel->saveParticipant($data);
		if ($result){
			$message['state']='1';
			$message['message']='Data Berhasil di Simpan';
			echo json_encode($message);
		} else {
			$message['state']='0';
			$message['message']='Data Tidak Berhasil di Simpan';
			echo json_encode($message);
		}
	}

	public function editParticipant(){
		$data=$this->input->post();
		$where =array('id'=> $this->input->post('id'));
		unset($data['id']);
		$result= $this->Adminmodel->editParticipant($data,$where);
		if ($result){
			$message['state']='1';
			$message['message']='Data Berhasil di Ubah';
			echo json_encode($message);
		} else {
			$message['state']='0';
			$message['message']='Data Tidak Berhasil di Ubah';
			echo json_encode($message);
		}
	}

	public function deleteParticipant(){
		$where =array('id'=> $this->input->post('id'));
		$result= $this->Adminmodel->deleteParticipant($where);
		if ($result){
			$message['state']='1';
			$message['message']='Data Berhasil di Hapus';
			echo json_encode($message);
		} else {
			$message['state']='0';
			$message['message']='Data Tidak Berhasil di Hapus';
			echo json_encode($message);
		}	
	}


}
