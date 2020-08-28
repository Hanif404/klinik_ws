<?php
class JadwalModel extends CI_Model{
	private $table='jadwal_klinik';
	public function __construct(){
		parent::__construct();
  }

	public function getAllData(){
		return $this->db->select('*')
						->get($this->table)
						->result();
	}

	public function getLastData(){
		return $this->db->select('*')
						->where('DATE_FORMAT(create_date, "%Y-%m-%d") = curdate()', null, false)
						->order_by('create_date','desc')
						->limit(1)
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
