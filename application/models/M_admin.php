<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model
{	
	function __construct(){
		parent::__construct();
		
	}

	function get_all(){
		$this->db->select('*');
		$this->db->from('admin');

		return $this->db->get();
	}

	function get_all_ID($id){
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('id_adm',$id);

		return $this->db->get();
	}

	function get_all_Email($email){
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('email_adm',$email);

		return $this->db->get();
	}

	function update_all($id,$data){
		$this->db->where('id_adm',$id);
		$this->db->update('admin',$data);
	}

	function delete_all($id){
		$this->db->where('id_adm',$id);
		$this->db->delete('admin');
	}

	function set_all($data){
		$this->db->insert('admin',$data);
	}
}