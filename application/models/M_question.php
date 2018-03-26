<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_question extends CI_Model
{	
	function __construct(){
		parent::__construct();
		
	}

	function get_all(){
		$this->db->select('*');
		$this->db->from('question');

		return $this->db->get();
	}

	function get_all_ID($id){
		$this->db->select('*');
		$this->db->from('question');
		$this->db->where('id_qst',$id);

		return $this->db->get();
	}

	function get_all_IDMtr($id_mtr){
		$this->db->select('*');
		$this->db->from('question');
		$this->db->where('id_mtr',$id_mtr);

		return $this->db->get();
	}

	function get_all_IDMtr_lim_desc($id_mtr,$b=0,$a=0){
		$this->db->select('*');
		$this->db->from('question');
		$this->db->where('id_mtr',$id_mtr);
		$this->db->limit($b,$a);
		$this->db->order_by('id_qst','DESC');

		return $this->db->get();
	}

	function update_all($id,$data){
		$this->db->where('id_qst',$id);
		$this->db->update('question',$data);
	}

	function delete_all($id){
		$this->db->where('id_qst',$id);
		$this->db->delete('question');
	}

	function set_all($data){
		$this->db->insert('question',$data);
	}
}