<?php
class AntrianModel extends CI_Model{
	private $table='antrian';
	private $klinik='jadwal_klinik';
	public function __construct(){
		parent::__construct();
  }

	public function getLastData($id){
		$filter = [
			'user_id' => $id
		];
		return $this->db->select('atr.*, kln.create_date')
						->join($this->klinik .' kln', 'atr.jadwal_id = kln.id')
						->where($filter)
						->where('DATE_FORMAT(create_date, "%Y-%m-%d") = curdate()', null, false)
						->order_by('atr.no_urut','desc')
						->limit(1)
						->get($this->table. ' atr')
						->result();
	}

	public function checkOpenKlinik(){
		return $this->db->select('*')
						->where('DATE_FORMAT(create_date, "%Y-%m-%d") = curdate()', null, false)
						->order_by('create_date','desc')
						->limit(1)
						->get($this->klinik)
						->result_array();
	}

	public function getNoUrut(){
		return $this->db->select('atr.no_urut')
						->join($this->klinik .' kln', 'atr.jadwal_id = kln.id')
						->where('DATE_FORMAT(kln.create_date, "%Y-%m-%d") = curdate()', null, false)
						->order_by('atr.no_urut','desc')
						->limit(1)
						->get($this->table. ' atr')
						->result_array();
		// echo $this->db->last_query();exit;
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
