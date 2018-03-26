<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_choice extends CI_Model
{	
	function __construct(){
		parent::__construct();
		
	}

	function get_all(){
		$this->db->select('*');
		$this->db->from('choice');

		return $this->db->get();
	}

	function get_all_ID($id){
		$this->db->select('*');
		$this->db->from('choice');
		$this->db->where('id_chc',$id);

		return $this->db->get();
	}

	function get_all_IDQst($id_qst){
		$this->db->select('*');
		$this->db->from('choice');
		$this->db->where('id_qst',$id_qst);

		return $this->db->get();
	}

	function get_all_IDQst_lim_desc($id_qst,$b=0,$a=0){
		$this->db->select('*');
		$this->db->from('choice');
		$this->db->where('id_qst',$id_qst);
		$this->db->limit($b,$a);
		$this->db->order_by('id_chc','DESC');

		return $this->db->get();
	}

	function update_all($id,$data){
		$this->db->where('id_chc',$id);
		$this->db->update('choice',$data);
	}

	function delete_all($id){
		$this->db->where('id_chc',$id);
		$this->db->delete('choice');
	}

	function set_all($data){
		$this->db->insert('choice',$data);
	}
}