<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_matter extends CI_Model
{	
	function __construct(){
		parent::__construct();
		
	}

	function get_all(){
		$this->db->select('*');
		$this->db->from('matter');

		return $this->db->get();
	}

	function get_all_like($word){
		$this->db->select('*');
		$this->db->from('matter');
		$this->db->like('name_mtr',$word);

		return $this->db->get();
	}

	function get_all_IDUsr($id_usr){
		$this->db->select('*');
		$this->db->from('matter');
		$this->db->where('id_usr',$id_usr);

		return $this->db->get();
	}

	function get_all_lim_desc($b=0,$a=0){
		$this->db->select('*');
		$this->db->from('matter');
		$this->db->order_by('id_mtr','DESC');
		$this->db->limit($b,$a);

		return $this->db->get();
	}

	function get_all_lim_rand($b=0,$a=0){
		$this->db->select('*');
		$this->db->from('matter');
		$this->db->order_by('id_mtr','RANDOM');
		$this->db->limit($b,$a);

		return $this->db->get();
	}

	function get_all_EduLv_lim($edu,$b=0,$a=0){
		$this->db->select('*');
		$this->db->from('matter');
		$this->db->where('edu_lv',$edu);
		$this->db->limit($b,$a);

		return $this->db->get();
	}

	function get_all_ID($id){
		$this->db->select('*');
		$this->db->from('matter');
		$this->db->where('id_mtr',$id);

		return $this->db->get();
	}

	function get_all_IDUsr_lim($id_usr,$b=0,$a=0){
		$this->db->select('*');
		$this->db->from('matter');
		$this->db->where('id_usr',$id_usr);
		$this->db->order_by('id_mtr','DESC');
		$this->db->limit($b,$a);

		return $this->db->get();
	}

	function update_all($id,$data){
		$this->db->where('id_mtr',$id);
		$this->db->update('matter',$data);
	}

	function delete_all($id){
		$this->db->where('id_mtr',$id);
		$this->db->delete('matter');
	}

	function set_all($data){
		$this->db->insert('matter',$data);
	}
}