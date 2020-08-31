<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('Authmodel');
        $this->load->model('Authrules');
	}

	public function login()
	{
        $this->basicAuth();
        $request=$this->input->post();

        if($this->Authrules->valiateLogin($request)){
            $this->wrapper(false,$this->form_validation->error_array(),"failed login",409);
        }

        $username=$request['username'];
        $password=$request['password'];

        $data=$this->Authmodel->login($username,$password);
        if(sizeof($data)==0){
            $this->wrapper(false,null,"failed login",404);
        }

        $payload=[
            "user_id"=>$data[0]->id,
            "is_bidan"=>$data[0]->is_bidan,
        ];
        $token=$this->generateToken($payload);
				$return = array("token"=>$token, "id"=> $data[0]->id);
        $this->wrapper(true,$return,"success login",200);
  }

	public function getProfile(){
        $this->verifyToken();

        $data=$this->Authmodel->getDataUser($this->id);
        if(sizeof($data)==0){
            $this->wrapper(false,[],"failed get profile",404);
        }
        unset($data[0]->password);
        $this->wrapper(true,$data,"success get profile",200);
    }

    public function register(){
        $this->basicAuth();

        $request=$this->input->post();
        if($this->Authrules->register($request)){
            $this->wrapper(false,$this->form_validation->error_array(),'error register',409);
        }

        $data=[
            "email"=>$request['email'],
            "address"=>$request['address'],
            "name"=>$request['name'],
            "phone"=>$request['phone'],
            // "file_image"=>$request['file_image'],
						"is_bidan"=>$request['is_bidan'],
            "password"=>md5($request['password'])
        ];

        $id = $this->Authmodel->addDataUser($data);

				$obj = new \stdClass();
				$obj->id = $id;
				$this->wrapper(true, $obj,'Anda berhasil terdaftar',201);
  }

	public function uploadFoto($id){
		$this->basicAuth();
		$file_element_name = 'foto_profile';

			//upload file
	    $config['upload_path'] =  'assets/upload/';
	    $config['allowed_types'] = 'jpg|jpeg|png';
	    $config['max_filename'] = '255';
	    $config['encrypt_name'] = TRUE;
	    $config['max_size'] = '1024'; //1 MB

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload($file_element_name))
	    {
				$pesan = preg_replace('/<[^>]*>/', '', $this->upload->display_errors());
				$this->wrapper(false, $pesan ,'error upload',409);
	    } else {
				$upload = $this->upload->data();
				$data = [
						'file_image'=> $upload['file_name'],
				];
				$result = $this->Authmodel->updateFotoUser($id, $data);
				if(!$result){
            $this->wrapper(false,null,'Upload Gagal',500);
        }
				$this->wrapper(true,null,'Upload Berhasil',201);
	    }
	    @unlink($_FILES[$file_element_name]);
	}

	public function editUser(){
		$this->verifyToken();

		$request=$this->input->post();
		$tgllahir=date('Y-m-d', strtotime($request['tgl_lahir']));

		$data=[
		 "email"=>$request['email'],
 		 "address"=>$request['address'],
 		 "name"=>$request['name'],
 		 "phone"=>$request['phone'],
 		 "agama"=>$request['agama'],
 		 "goldar"=>$request['goldar'],
 		 "nama_suami"=>$request['nama_suami'],
 		 "pekerjaan_istri"=>$request['pekerjaan_istri'],
 		 "pekerjaan_suami"=>$request['pekerjaan_suami'],
 		 "pendidikan"=>$request['pendidikan'],
		 "tgl_lahir"=>$tgllahir
	 ];

	 $result=$this->Authmodel->updateDataUser($this->id, $data);
	 if(!$result){
			 $this->wrapper(false,null,'failed update',500);
	 }
	 $this->wrapper(true,null,'success update',200);
	}

	public function changePassword(){
			$this->verifyToken();

			$request=$this->input->post();
			if($this->Authrules->validateChangePassword($request)){
					$this->wrapper(false,$this->form_validation->error_array(),'error change password',409);
			}

			$encrypt = md5($request['password']);
			$data = [
				'password' => $encrypt
			];
			$result = $this->Authmodel->updatePassword($this->id, $data);
	 	 if(!$result){
	 			 $this->wrapper(false,null,'failed change password',500);
	 	 }
	 	 $this->wrapper(true,null,'success change password',200);
	}

	public function resetPassword(){
		$this->basicAuth();

			$request = $this->input->post();
			if($this->Authrules->validateResetPassword($request)){
					$this->wrapper(false,$this->form_validation->error_array(),'error reset password',409);
			}

			$data = [
				'password' => 'e10adc3949ba59abbe56e057f20f883e'
			];
			$result = $this->Authmodel->resetPassword($request['email'], $data);
	 	 if(!$result){
	 			 $this->wrapper(false,null,'failed change password',500);
	 	 }
	 	 $this->wrapper(true,null,'success change password',200);
	}
}
?>
