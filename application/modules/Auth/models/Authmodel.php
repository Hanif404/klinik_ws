<?php
class Authmodel extends CI_Model{

	private $table='pengguna';
	public function __construct(){
		parent::__construct();
    }

    public function loginRules(){
        return [
            [
                'field'=>'username',
                'lable'=>'Username',
                'rules'=>'required|min_length[3]|alpha_dash',
            ],
            [
                'field'=>'password',
                'lable'=>'Password',
                'rules'=>'required|min_length[6]|alpha_dash',
            ],
        ];
    }

	public function login($username,$password){
      $where=[
          'email'=>$username,
          'password'=>md5($password)
      ];
      return $this->db->select('*')
                      ->where($where)
                      ->get($this->table)
                      ->result();
  }

	public function resetPassword($id, $data){
		return $this->db->where('email', $id)
										->update($this->table, $data);
	}

	public function updatePassword($id, $data){
		return $this->db->where('id', $id)
										->update($this->table, $data);
	}

	public function updateDataUser($id, $data){
		return $this->db->where('id',$id)
										->update($this->table, $data);
	}

	public function updateFotoUser($id, $data){
		return $this->db->where('id',$id)
										->update($this->table, $data);
	}

	public function addDataUser($data){
		$this->db->insert($this->table,$data);
		return $this->db->insert_id();
	}

	public function getDataUser($id){
		return $this->db->select('*')
										->where('id',$id)
										->get($this->table)
										->result();
	}


}
?>
