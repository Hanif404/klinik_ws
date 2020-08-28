<?php
class KonsultasiModel extends CI_Model{
	private $table1='registrasi';
	private $table2='konsultasi';
	private $table3='pengguna';

	public function __construct(){
		parent::__construct();
  }

	public function getCommentAll($id){
		return $this->db->select('ksl.*, pg.name')
						->join($this->table1 .' reg', 'ksl.reg_id = reg.id')
						->join($this->table3 .' pg', 'ksl.user_id = pg.id')
						->where('reg_id',$id)
						->where('is_konsultasi','1')
						->get($this->table2 .' ksl')
						->result();
	}

	public function getCommentUser($id){
		return $this->db->select('ksl.*, pg.name')
						->join($this->table3 .' pg', 'ksl.user_id = pg.id')
						->where('ksl.user_id != '.$id, null, false)
						->where('is_read','0')
						->get($this->table2 .' ksl')
						->result();
	}

	public function addDataComment($data){
      return $this->db->insert($this->table2, $data);
  }

	public function editDataComment($where, $data){
			$this->db->where($where);
			return $this->db->update($this->table2, $data);
	}

	public function editDataReadComment($data){
			$this->db->where('reg_id', $data['reg_id']);
			$this->db->where('user_id != '. $data['user_id'], null, false);
			$this->db->set('is_read', 1);
			return $this->db->update($this->table2);
	}

	public function deleteDataComment($where){
			$this->db->where($where);
	    return $this->db->delete($this->table2);
	}

}
?>
