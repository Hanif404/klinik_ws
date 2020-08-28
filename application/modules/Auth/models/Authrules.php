<?php
class Authrules extends CI_Model{

	private $pengguna = 'pengguna';

	public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function valiateLogin($data){
        $rules=[
            [
                'field'=>'username',
                'lable'=>'Username',
                'rules'=>'required|min_length[3]',
            ],
            [
                'field'=>'password',
                'lable'=>'Password',
                'rules'=>'required|min_length[6]',
            ],
        ];
        $this->form_validation->set_data($data);
        $this->form_validation->set_rules($rules);

        return $this->form_validation->run()==FALSE;
    }

    public function register($data){
        $rules=[
            [
                'field'=>'name',
                'lable'=>'name',
                'rules'=>'required|min_length[1]',
            ],
						[
                'field'=>'address',
                'lable'=>'address',
                'rules'=>'required|min_length[1]',
            ],
            [
                'field'=>'password',
                'lable'=>'Password',
                'rules'=>'required|min_length[6]',
            ],
            [
                'field'=>'email',
                'label'=>'email',
                'rules'=>'required|min_length[1]|callback_username_check'
            ],
            [
                'field'=>'phone',
                'label'=>'phone',
                'rules'=>'required|min_length[1]'
            ]
        ];
        $this->form_validation->set_data($data);
        $this->form_validation->set_rules($rules);

        return $this->form_validation->run($this)==FALSE;
    }

		public function validateChangePassword($data){
        $rules=[
            [
                'field'=>'old_password',
                'label'=>'old_password',
                'rules'=>'required|min_length[6]|callback_password_check',
            ],
            [
                'field'=>'password',
                'label'=>'Password',
                'rules'=>'required|min_length[6]|callback_password_same_check',
            ]
        ];
        $this->form_validation->set_data($data);
        $this->form_validation->set_rules($rules);

        return $this->form_validation->run($this)==FALSE;
    }

		public function validateResetPassword($data){
        $rules=[
						[
								'field'=>'email',
								'label'=>'email',
								'rules'=>'required|min_length[1]|callback_username_reset'
						],
        ];
        $this->form_validation->set_data($data);
        $this->form_validation->set_rules($rules);

        return $this->form_validation->run($this)==FALSE;
    }

    public function username_check($str){
        $result = $this->db->select('*')
                          ->where('email',$str)
                          ->get($this->pengguna)
                          ->num_rows();
        if($result > 0){
            $this->form_validation->set_message( __FUNCTION__ , 'username sudah ada');
            return false;
        }
        return true;
    }

		public function username_reset($str){
        $result = $this->db->select('*')
                          ->where('email',$str)
                          ->get($this->pengguna)
                          ->num_rows();
        if($result > 0){
            return true;
        }
				$this->form_validation->set_message( __FUNCTION__ , 'email tidak terdaftar');
        return false;
    }

		public function password_check($str){
        $result = $this->db->select('*')
                          ->where('password',md5($str))
                          ->get($this->pengguna)
                          ->num_rows();
        if($result == 0){
            $this->form_validation->set_message( __FUNCTION__ , 'password lama tidak sama');
            return false;
        }
        return true;
    }

		public function password_same_check($str){
        $result = $this->db->select('*')
                          ->where('password',md5($str))
                          ->get($this->pengguna)
                          ->num_rows();
        if($result > 0){
            $this->form_validation->set_message( __FUNCTION__ , 'password tidak boleh sama dengan yang password lama');
            return false;
        }
        return true;
    }
}
?>
