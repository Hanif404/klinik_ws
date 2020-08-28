<?php
class RekammedisModel extends CI_Model{
	private $table='rekam_medis';
	private $table2='registrasi';
	private $table3='pengguna';
	public function __construct(){
		parent::__construct();
  }

	public function getAllData($id){
		return $this->db->select('rmds.*, pg.name')
		->join($this->table3. ' pg', 'rmds.bidan_id = pg.id')
						->where('reg_id', $id)
						->order_by('create_date','desc')
						->get($this->table. ' rmds')
						->result();
	}

	public function getOneData($id){
		return $this->db->select('*')
						->where('id', $id)
						->get($this->table)
						->result();
	}

	public function getLastData($id){
		return $this->db->select('rmds.jadwal_periksa')
						->join($this->table2. ' rg', 'rmds.reg_id = rg.id')
						->where('rg.user_id', $id)
						->where('rmds.jadwal_periksa = curdate()', null, false)
						->order_by('rmds.id','desc')
						->limit(1)
						->get($this->table. ' rmds')
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
