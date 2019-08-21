<?php 


class Cv_model extends CI_Model{

	public function getProfile(){
		return $this->db->get('profile')->result_array();
	}

	public function updateProfile($data){
		$this->db->update('profile',$data);
		return $this->db->affected_rows();
	}

	public function getKemampuan(){
		return $this->db->get('kemampuan')->result_array();		
	}

	public function insertKemampuan($data){
		$this->db->insert('kemampuan',$data);
		return $this->db->affected_rows();
	}

	public function updateKemampuan($id,$data){
		$this->db->where('id',$id);
		$this->db->update('kemampuan',$data);
		return $this->db->affected_rows();
	}

	public function deleteKemampuan($id){
		$this->db->where('id',$id);
		$this->db->delete('kemampuan');
		return $this->db->affected_rows();
	}

	public function getPendidikan(){
		return $this->db->get('pendidikan')->result_array();
	}

	public function insertPendidikan($data){
		$this->db->insert('pendidikan',$data);
		return $this->db->affected_rows();
	}
	
	public function updatePendidikan($id,$data){
		$this->db->where('id',$id);
		$this->db->update('pendidikan',$data);
		return $this->db->affected_rows();
	}

	public function getProject(){
		return $this->db->get('project')->result_array();
	}

	public function insertProject($data){
		$this->db->insert('project',$data);
		return $this->db->affected_rows();
	}

	public function getKontak(){
		return $this->db->get('kontak')->result_array();
	}

	public function insertKontak($data){
		$this->db->insert('kontak',$data);
		return $this->db->affected_rows();	
	}
}