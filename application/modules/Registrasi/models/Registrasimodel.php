<?php
class RegistrasiModel extends CI_Model{
	private $table='registrasi';
	public function __construct(){
		parent::__construct();
  }

	public function getAllData($id){
		$this->db->select('*');
		if($id != "0"){
			$this->db->where('user_id', $id);
		}
		$this->db->order_by('id','desc');
		return $this->db->get($this->table)->result();
	}

	public function getOneData($idUser, $id){
		return $this->db->select('*')
						->where('user_id', $idUser)
						->where('id', $id)
						->get($this->table)
						->result();
	}

	public function addData($data){
      return $this->db->insert($this->table, $data);
  }

	public function editData($where, $data){
			$this->db->where($where);
      return $this->db->update($this->table, $data);
  }

	public function deleteData($where){
			$this->db->where($where);
	    return $this->db->delete($this->table);
	}

}
?>
