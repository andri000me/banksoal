<?php
 defined('BASEPATH') OR exit('No direct script access allowed');

 class Admin extends CI_Controller
 {
 	public function __construct()
 	{
 		parent::__construct();
 		$this->load->library('form_validation');

 		$this->load->helper('string');

 		$this->load->model('m_admin');
 		$this->load->model('m_user');
 		$this->load->model('m_matter');
 	}

 	public function index()
 	{
 		$this->check_login();

 		//need in head
 		$data['admin']=$this->m_admin->get_all_ID($this->session->userdata('id_adm'));

 		$data['matter']=$this->m_matter->get_all();
 		$data['user']=$this->m_user->get_all();

 		$data['page']='dashboard';
 		$this->load->view('admin/page',$data);
 	}

 	public function login(){
		if($this->input->post('sign'))
		{
			$config=array
			(
				//Login
				array
				(
					'field'=>'email',
					'label'=>'Email',
					'rules'=>'required|trim|max_length[30]|min_length[5]',
					'errors'=>array
					(
						'required'=>'%s tidak boleh kosong!'
					)
				),
				array
				(
					'field'=>'pass',
					'label'=>'Password',
					'rules'=>'required|trim|max_length[20]|min_length[8]',
					'errors'=>array
					(
						'required'=>'%s tidak boleh kosong!'
					)
				)
			);

			$this->form_validation->set_rules($config);

			if($this->form_validation->run()==TRUE)
			{
				$mail=html_escape($this->input->post('email'));
				$pass=$this->input->post('pass');

				$admin=$this->m_admin->get_all_Email($mail);

				if($admin->num_rows()==1){
					$adm=$admin->row();

					if(password_verify($pass,$adm->pass_adm)){
						$login=array
						(
							'login_adm'		=>1,
							'id_adm'		=>$adm->id_adm,
							'fullname_adm'	=>$adm->fullname_adm,
							'email_adm'		=>$adm->email_adm
						);

						$this->session->set_userdata($login);

						redirect('admin');
					}else{
						$this->session->set_flashdata('pesan','Data yang anda masukan salah!');
						redirect('admin-login');
					}
				}else{
					$this->session->set_flashdata('pesan','Login gagal!');
					redirect('admin-login');
				}
			}
			else
			{
				echo "Email atau password salah!";
				//echo validation_errors();
			}
		}else{
			$data['page']='login';
			$this->load->view('admin/login',$data);
		}
	}

	public function logout(){
		$this->check_login();

		$login=array('login_adm','id_adm','fullname_adm','email_adm');
		$this->session->unset_userdata($login);

		redirect('admin-login');
	}

	public function check_login(){
		if($this->session->userdata('login_adm')!=1){
			redirect('errors/page_missing');
		}
	}

	public function account(){
		$this->check_login();

		//need in head
 		$data['admin']=$this->m_admin->get_all_ID($this->session->userdata('id_adm'));

		$data['page']='account';
 		$this->load->view('admin/page',$data);
	}

	public function matter(){
		$this->check_login();

		//need in head
 		$data['admin']=$this->m_admin->get_all_ID($this->session->userdata('id_adm'));

 		$data['matter']=$this->m_matter->get_all();

		$data['page']='matter';
 		$this->load->view('admin/page',$data);
	}

	public function user(){
		$this->check_login();

		//need in head
 		$data['admin']=$this->m_admin->get_all_ID($this->session->userdata('id_adm'));

 		$data['user']=$this->m_user->get_all();

		$data['page']='user';
 		$this->load->view('admin/page',$data);
	}
 }
