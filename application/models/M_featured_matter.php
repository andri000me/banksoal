<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_featured_matter extends CI_Model
{	
	function __construct(){
		parent::__construct();
		
	}

	function get_all(){
		$this->db->select('*');
		$this->db->from('featured_matter');

		return $this->db->get();
	}

	function get_all_joinMtr(){
		$this->db->select('*');
		$this->db->from('featured_matter');
		$this->db->join('matter','matter.id_mtr=featured_matter.id_mtr');

		return $this->db->get();
	}

	function update_all($id,$data){
		$this->db->where('id_fm',$id);
		$this->db->update('featured_matter',$data);
	}

	function delete_all($id){
		$this->db->where('id_fm',$id);
		$this->db->delete('featured_matter');
	}

	function set_all($data){
		$this->db->insert('featured_matter',$data);
	}
}