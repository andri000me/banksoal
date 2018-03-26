<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model
{	
	function __construct(){
		parent::__construct();
		
	}

	function get_all(){
		$this->db->select('*');
		$this->db->from('user');

		return $this->db->get();
	}

	function get_all_ID($id){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id_usr',$id);

		return $this->db->get();
	}

	function get_all_Email($email){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('email_usr',$email);

		return $this->db->get();
	}

	function update_all($id,$data){
		$this->db->where('id_usr',$id);
		$this->db->update('user',$data);
	}

	function delete_all($id){
		$this->db->where('id_usr',$id);
		$this->db->delete('user');
	}

	function set_all($data){
		$this->db->insert('user',$data);
	}
}