<?php
 defined('BASEPATH') OR exit('No direct script access allowed');

 class User extends CI_Controller
 {
 	public function __construct()
 	{
 		parent::__construct();
 		$this->load->library('form_validation');
		$this->load->library('upload');

		$this->load->helper('captcha');
		$this->load->helper('string');
		$this->load->helper('url');

		$this->load->model('m_user');
		$this->load->model('m_matter');
		$this->load->model('m_question');
		$this->load->model('m_choice');
		$this->load->model('m_featured_matter');
 	}

 	public function index()
 	{
 		//need any page
 		$data['captcha']=$this->captcha();

 		$data['matter']['new']=$this->m_matter->get_all_lim_desc(4);
 		$data['matter']['featured']=$this->m_featured_matter->get_all_joinMtr();
 		$data['matter']['sd']=$this->m_matter->get_all_EduLv_lim(1,4);
 		$data['matter']['smp']=$this->m_matter->get_all_EduLv_lim(2,4);
 		$data['matter']['sma']=$this->m_matter->get_all_EduLv_lim(3,4);

 		$data['page']='home';
 		$this->load->view('user/page',$data);
 	}

 	public function register()
 	{
		if($this->input->post('daftar'))
		{
			$config=array
			(
				//Daftar
				array
				(
					'field'=>'email',
					'label'=>'Email',
					'rules'=>'required|trim|max_length[30]|min_length[5]',
					'errors'=>array
					(
						'required'=>'%s tidak boleh kosong!',
						'min_length'=>'%s minimal 5 karakter!',
						'max_length'=>'%s maksimal 30 karakter!'
					)
				),
				array
				(
					'field'=>'pass',
					'label'=>'Password',
					'rules'=>'required|trim|max_length[20]|min_length[8]',
					'errors'=>array
					(
						'required'=>'%s tidak boleh kosong!',
						'min_length'=>'%s minimal 8 karakter!',
						'max_length'=>'%s maksimal 20 karakter!'
					)
				),
				array
				(
					'field'=>'nama',
					'label'=>'Full Name',
					'rules'=>'required|trim|max_length[30]|min_length[3]',
					'errors'=>array
					(
						'required'=>'%s tidak boleh kosong!',
						'min_length'=>'%s minimal 3 karakter!',
						'max_length'=>'%s maksimal 30 karakter!'
					)
				),
				array
				(
					'field'=>'rpass',
					'label'=>'Konfirmasi Password',
					'rules'=>'required|trim|matches[pass]',
					'errors'=>array
					(
						'required'=>'%s tidak boleh kosong!',
						'matches'=>'%s berbeda!',
					)
				),
				array
				(
					'field'=>'captcha',
					'label'=>'Captcha',
					'rules'=>'required|trim',
					'errors'=>array
					(
						'required'=>'%s tidak boleh kosong!'
					)
				)
			);

			$this->form_validation->set_rules($config);

			if
			(
				strtoupper($this->session->userdata('captchaWord'))
				==
				strtoupper(html_escape($this->input->post('captcha')))
			)
			{
				$this->session->unset_userdata('captchaWord');

				if($this->form_validation->run()==TRUE)
				{
					$email=html_escape($this->input->post('email'));
					$akun=$this->m_user->get_all_Email($email);
					$row=$akun->row();

					if($akun->num_rows()==0)
					{
						$data=array
						(
							'fullname_usr'=>html_escape($this->input->post('nama')),
							'pass_usr'=>password_hash(html_escape($this->input->post('pass')),PASSWORD_DEFAULT),
							'email_usr'=>html_escape($this->input->post('email')),
							'verif_usr'=>random_string('alnum',8)
						);

						$this->m_user->set_all($data);
					}
					else if($akun->num_rows()==1&&$row->verif_usr!=1)
					{
						$id_user=$row->id_usr;

						$data=array
						(
							'fullname_usr'=>html_escape($this->input->post('nama')),
							'pass_usr'=>password_hash(html_escape($this->input->post('pass')),PASSWORD_DEFAULT),
							'verif_usr'=>random_string('alnum',8)
						);

						$this->m_user->update_all_ID($id_user,$data);
					}

					$this->session->set_flashdata('pesan','Pendaftaran berhasil!');
					redirect('');
				}else{
					echo validation_errors();
				}
			}else{
				echo "Captcha salah!";
			}
		}else{
			echo "Error 404!";
		}
	}

	public function login()
	{
		if($this->input->post('login'))
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
				$email=html_escape($this->input->post('email'));
				$quser=$this->m_user->get_all_Email($email);

				if($quser->num_rows()==1)
				{
					$row=$quser->row();
					$pass=html_escape($this->input->post('pass'));

					if(password_verify($pass,$row->pass_usr)){
						$this->session->set_userdata('login_usr',1);
						$this->session->set_userdata('id_usr',$row->id_usr);
						$this->session->set_userdata('email_usr',$row->email_usr);
						$this->session->set_userdata('fullname_usr',$row->fullname_usr);

						$this->session->set_flashdata('pesan','Selamat datang!');
						redirect('');
					}else{
						echo "Password salah!";
					}
				}else{
					echo "Email salah!";
				}
			}else{
				echo "Email atau password salah!";
				//echo validation_errors();
			}
		}else{
			echo "Error 404!";
		}
	}

	public function check_login()
	{
		if($this->session->userdata('login_usr')){
			return 1;
		}else{
			$this->session->set_flashdata('pesan','Anda belum login!');
			redirect('');
		}
	}

	public function logout()
	{
		$this->check_login();

		$login=array('login_usr','id_usr','fullname_usr','email_usr');
		$this->session->unset_userdata($login);

		redirect('');
	}

 	public function create()
 	{
 		if($this->input->post('simpan')){
			$config=array
			(
				//Daftar
				array
				(
					'field'=>'nama',
					'label'=>'Nama soal',
					'rules'=>'required|trim|max_length[50]|min_length[10]',
					'errors'=>array
					(
						'required'=>'%s tidak boleh kosong!',
						'min_length'=>'%s minimal 10 karakter!',
						'max_length'=>'%s maksimal 50 karakter!'
					)
				),
				array
				(
					'field'=>'jenjang',
					'label'=>'Jenjang pendidikan',
					'rules'=>'required|trim|max_length[2]',
					'errors'=>array
					(
						'required'=>'%s tidak boleh kosong!'
					)
				),
				array
				(
					'field'=>'kode',
					'label'=>'Kode soal',
					'rules'=>'required|trim|max_length[15]|min_length[2]',
					'errors'=>array
					(
						'required'=>'%s tidak boleh kosong!',
						'min_length'=>'%s minimal 2 karakter!',
						'max_length'=>'%s maksimal 15 karakter!'
					)
				),
				array
				(
					'field'=>'tahun',
					'label'=>'Tahun pembuatan soal',
					'rules'=>'required|numeric|trim|max_length[4]|min_length[4]',
					'errors'=>array
					(
						'required'=>'%s tidak boleh kosong!'
					)
				),
				array
				(
					'field'=>'waktu',
					'label'=>'Waktu pengerjaan',
					'rules'=>'required|numeric|trim',
					'errors'=>array
					(
						'required'=>'%s tidak boleh kosong!'
					)
				),
				array
				(
					'field'=>'penilaian',
					'label'=>'Aturan penilaian',
					'rules'=>'required|numeric|trim|max_length[2]',
					'errors'=>array
					(
						'required'=>'%s tidak boleh kosong!'
					)
				),
				array
				(
					'field'=>'email',
					'label'=>'Email',
					'rules'=>'required|trim|max_length[30]|min_length[5]',
					'errors'=>array
					(
						'required'=>'%s tidak boleh kosong!',
						'min_length'=>'%s minimal 5 karakter!',
						'max_length'=>'%s maksimal 30 karakter!'
					)
				),
				array
				(
					'field'=>'captcha',
					'label'=>'Captcha',
					'rules'=>'required|trim|alpha_numeric',
					'errors'=>array
					(
						'required'=>'%s tidak boleh kosong!'
					)
				)
			);

			$this->form_validation->set_rules($config);

			if
			(
				strtoupper($this->session->userdata('captchaWord'))
				==
				strtoupper(html_escape($this->input->post('captcha')))
			)
			{
				$this->session->unset_userdata('captchaWord');

				if($this->form_validation->run()==TRUE)
				{
					if($this->session->userdata('login')){
						$id_usr=$this->session->userdata('id_usr');
					}else{
						$email=html_escape($this->input->post('email'));
						$akun=$this->m_user->get_all_Email($email);

						if($akun->num_rows()==0)
						{
							//Save user
							$data_user=array
							(
								'pass_usr'=>password_hash(html_escape(random_string('alnum',6)),PASSWORD_DEFAULT),
								'email_usr'=>$email,
								'verif_usr'=>random_string('alnum',8)
							);

							/**
							 * Save to db
							 */
							$this->m_user->set_all($data_user);
							$akun=$this->m_user->get_all_Email($email);
						}

						$row=$akun->row();
						$id_usr=$row->id_usr;
					}

					$data=array
					(
						'name_mtr'=>html_escape($this->input->post('nama')),
						'edu_lv'=>html_escape($this->input->post('jenjang')),
						'mach_time'=>html_escape($this->input->post('waktu')),
						'created'=>html_escape($this->input->post('tahun')),
						'kd_matter'=>html_escape($this->input->post('kode')),
						'role_type'=>html_escape($this->input->post('penilaian')),
						'id_usr'=>$id_usr
					);

					if($this->session->userdata('login_usr')){}else{
						$this->session->set_userdata('id_usr',$id_usr);
					}

					$this->m_matter->set_all($data);
					$this->session->set_flashdata('pesan','Soal berhasil disimpan!');

					$id_mtr=$this->m_matter->get_all_IDUsr_lim($id_usr,1)->row()->id_mtr;
					redirect('matter-details/'.encrypt_url($id_mtr));
				}else{
					echo validation_errors();
				}
			}else{
				echo "Captcha salah!";
			}
 		}else{
	 		//need any page
	 		$data['captcha']=$this->captcha();

	 		$data['page']='create';
	 		$this->load->view('user/page',$data);
 		}
 	}

 	public function edit($id_mtr=NULL)
 	{
 		$matter=$this->m_matter->get_all_ID(decrypt_url($id_mtr));

 		if($matter->num_rows()==1){
 			//need any page
	 		$data['captcha']=$this->captcha();

	 		$data['matter']=$matter;

	 		$data['page']='edit';
	 		$this->load->view('user/page',$data);
 		}else{
 			echo "Error 404!";
 		}
 	}

 	public function matter_details($id_mtr=NULL)
 	{
 		$data['matter']=$this->m_matter->get_all_ID(decrypt_url($id_mtr));

	 	if($data['matter']->num_rows()==1){
	 		$data['question']=$this->m_question->get_all_IDMtr($data['matter']->row()->id_mtr);

	 		$data['page']='matter_details';
	 		$this->load->view('user/page',$data);
	 	}else{
	 		echo "Eror 404!";
	 	}
 	}

 	public function save_question()
 	{
 		if($this->input->post('id_qst')==NULL){
 			$this->add_question();
 		}else{
 			$this->edit_question();
 		}
 	}

 	public function add_question()
 	{
 		if($this->input->post('simpan')){
 			$config=array
 			(
 				array
				(
					'field'=>'pertanyaan',
					'label'=>'Pertanyaan',
					'rules'=>'required|trim|max_length[500]',
					'errors'=>array
					(
						'required'=>'%s tidak boleh kosong!',
						'max_length'=>'%s maksimal 500 karakter!'
					)
				),
				array
				(
					'field'=>'format_no',
					'label'=>'Format penomoran',
					'rules'=>'required|trim',
					'errors'=>array
					(
						'required'=>'%s tidak boleh kosong!'
					)
				),
				array
				(
					'field'=>'kunci',
					'label'=>'Kunci Jawaban',
					'rules'=>'required|trim',
					'errors'=>array
					(
						'required'=>'%s tidak boleh kosong!'
					)
				),
				array
				(
					'field'=>'pilihan[]',
					'label'=>'Pilihan',
					'rules'=>'required|trim|max_length[500]',
					'errors'=>array
					(
						'required'=>'%s tidak boleh kosong!',
						'max_length'=>'%s maksimal 500 karakter!'
					)
				),
				array
				(
					'field'=>'id_mtr',
					'rules'=>'required',
					'errors'=>array
					(
						'required'=>'Terjadi kesalahan pada sistem!'
					)
				)
 			);

 			$this->form_validation->set_rules($config);

 			if($this->form_validation->run()==TRUE)
 			{
 				$data=array
 				(
 					'num_type'=>html_escape($this->input->post('format_no')),
 					'text_qst'=>$this->input->post('pertanyaan'),
 					'id_mtr'=>decrypt_url(html_escape($this->input->post('id_mtr')))
 				);
 				$this->m_question->set_all($data);

 				$knc=html_escape($this->input->post('kunci'));
 				$i=0;
 				foreach ($this->input->post('pilihan') as $pil) {
 					$i++;
 					if($knc==$i){
 						$scr=1;
 					}else{
 						$scr=0;
 					}
 					$qst=$this->m_question->get_all_IDMtr_lim_desc($data['id_mtr'],1)->row();
 					$data_choice=array
 					(
 						'text_chc'=>$pil,
 						'id_qst'=>$qst->id_qst,
 						'score'=>$scr
 					);
 					$this->m_choice->set_all($data_choice);
 				}

 				$this->session->set_flashdata('pesan','Pertanyaan berhasil disimpan!');
 				$id_mtr=encrypt_url($data['id_mtr']);
				redirect('matter-details/'.$id_mtr);
 			}
 			else
 			{
 				echo validation_errors();
 			}
 		}else{
 			echo "Eror 404!";
 		}
 	}

 	public function edit_question()
 	{
		if($this->input->post('simpan')){
			$config=array
			(
				array
				(
					'field'=>'id_qst[]',
					'rules'=>'required',
					'errors'=>array
					(
						'required'=>'Terjadi kesalahan pada sistem!'
					)
				),
				array
				(
					'field'=>'pertanyaan',
					'label'=>'Pertanyaan',
					'rules'=>'required|trim|max_length[500]',
					'errors'=>array
					(
						'required'=>'%s tidak boleh kosong!',
						'max_length'=>'%s maksimal 500 karakter!'
					)
				),
				array
				(
					'field'=>'format_no',
					'label'=>'Format penomoran',
					'rules'=>'required|trim',
					'errors'=>array
					(
						'required'=>'%s tidak boleh kosong!'
					)
				),
				array
				(
					'field'=>'kunci',
					'label'=>'Kunci Jawaban',
					'rules'=>'required|trim',
					'errors'=>array
					(
						'required'=>'%s tidak boleh kosong!'
					)
				),
				array
				(
					'field'=>'pilihan[]',
					'label'=>'Pilihan',
					'rules'=>'required|trim|max_length[500]',
					'errors'=>array
					(
						'required'=>'%s tidak boleh kosong!',
						'max_length'=>'%s maksimal 500 karakter!'
					)
				)
			);

			$this->form_validation->set_rules($config);

			if($this->form_validation->run()==TRUE)
			{
				$id_qst=html_escape($this->input->post('id_qst'));
				$data=array
				(
					'num_type'=>html_escape($this->input->post('format_no')),
					'text_qst'=>$this->input->post('pertanyaan')
				);
				$this->m_question->update_all($id_qst,$data);

				$id_chc=$this->input->post('id_chc');
				$text=$this->input->post('pilihan');
				$knc=html_escape($this->input->post('kunci'));
				for($i=0;$i<count($id_chc);$i++){
					if($knc==$i+1){
 						$scr=1;
 					}else{
 						$scr=0;
 					}
					if($this->m_choice->get_all_ID(html_escape($id_chc[$i]))->num_rows()==1){
						$data_choice=array
 						(
 							'text_chc'=>$text[$i],
 							'score'=>$scr
 						);

 						$this->m_choice->update_all(html_escape($id_chc[$i]),$data_choice);
					}else{
						$data_choice=array
	 					(
	 						'text_chc'=>$text[$i],
	 						'id_qst'=>$id_qst,
	 						'score'=>$scr
	 					);
 						$this->m_choice->set_all($data_choice);
					}
				}

				while($this->m_choice->get_all_IDQst($id_qst)->num_rows()>count($id_chc)){
					$chc=$this->m_choice->get_all_IDQst_lim_desc($id_qst,1)->row();
					$this->m_choice->delete_all($chc->id_chc);
				}

				$this->session->set_flashdata('pesan','Pertanyaan berhasil disimpan!');
				redirect('matter-details/'.html_escape($this->input->post('id_mtr')));
			}
			else
			{
				echo validation_errors();
			}
		}else{
			echo "Eror 404!";
		}
 	}

 	public function delete_question($id_mtr=NULL,$id_qst=NULL)
 	{
 		$id_qst=decrypt_url($id_qst);

 		if($this->m_question->get_all_ID($id_qst)->num_rows()==1){
 			$this->m_question->delete_all($id_qst);

 			$this->session->set_flashdata('pesan','Pertanyaan berhasil dihapus!');
 			redirect('matter-details/'.$id_mtr);
 		}else{
 			echo "Eror 404!";
 		}
 	}

 	public function matter_description($id_mtr=NULL,$subpage=NULL)
 	{
 		$id_mtr=decrypt_url($id_mtr);
 		$data['matter']=$this->m_matter->get_all_ID($id_mtr);

 		if($data['matter']->num_rows()==1){
	 		//need any page
	 		$data['captcha']=$this->captcha();

	 		$data['question']=$this->m_question->get_all_IDMtr($id_mtr);

	 		$data['subpage']=$subpage;

	 		if($subpage==3)
	 		{
	 			if($this->input->post('lihathasil')){
		 			$config=array
					(
						array
						(
							'field'=>'id_mtr',
							'rules'=>'required',
							'errors'=>array
							(
								'required'=>'Terjadi kesalahan pada sistem!'
							)
						)
					);

					$this->form_validation->set_rules($config);

					if($this->form_validation->run()==TRUE)
					{
						$mtr=$this->m_matter->get_all_ID(decrypt_url($this->input->post('id_mtr')))->row();
			 			$question=$this->m_question->get_all_IDMtr($mtr->id_mtr);

						$jml=0;
						$score=0;
						if(count($this->input->post('pil'))>0){
				 			foreach ($this->input->post('pil') as $pil) {
				 				$chc=$this->m_choice->get_all_ID($pil)->row();
				 				$jml+=$chc->score;
				 			}

				 			if($mtr->role_type==1){
				 				$score=$jml*100/$question->num_rows();
				 			}else if($mtr->role_type==2){
				 				$score=(($jml*4)+(($question->num_rows()-$jml)*-1))*100/($question->num_rows()*4);
				 			}
				 		}

	 					$data['subpage']=4;
			 			$data['score']=number_format($score,2);
					}
					else
					{
						echo validation_errors();
					}
		 		}else{
		 			$data['matter']=$this->m_matter->get_all_ID($id_mtr);
			 		$data['question']=$this->m_question->get_all_IDMtr($id_mtr);
		 		}
	 		}

	 		$data['page']='matter_description';
			$this->load->view('user/page',$data);
	 	}else{
 			echo "Eror 404!";
 		}
 	}

 	public function see_all($mode=NULL,$id_usr=NULL)
 	{
 		$mode=decrypt_url($mode);
 		$id_usr=decrypt_url($id_usr);

 		if($this->input->post('cari')){
 			$data['matter']=$this->m_matter->get_all_like($this->input->post('kata_kunci'));
 			$data['mode']=-1;
 		}else{
 			if($mode==1||$mode==2||$mode==3||$mode==4||$mode==5||$mode==6){
 				$data['matter']=$this->m_matter->get_all_EduLv_lim($mode);
			}else if($mode==0){
				$data['matter']=$this->m_matter->get_all_IDUsr($id_usr);
				$data['user']=$this->m_user->get_all_ID($id_usr);
			}
			$data['mode']=$mode;
 		}

 		$data['page']='see_all';
	 	$this->load->view('user/page',$data);
 	}

 	public function delete_matter($id_mtr=NULL){
 		$id_mtr=decrypt_url($id_mtr);

 		$this->m_matter->delete_all($id_mtr);

 		$this->session->set_flashdata('pesan','Pendaftaran berhasil!');
		redirect('see_all/'.encrypt_url(0).'/'.encrypt_url($this->session->userdata('id_usr')));
 	}

 	/**
	 * Fungsi
	 */
	public function captcha()
	{
		$vals=array(
			'img_path' 		=> 'assets/img/captcha/',
			'img_url' 		=> base_url().'assets/img/captcha/',
			'word_length' 	=> 5,
			'img_width'     => 200,
        	'img_height'    => 40,
        	'expiration'    => 7200
		);
		$captcha=create_captcha($vals);

		$this->session->set_userdata('captchaWord',$captcha['word']);

		return $captcha;
	}

	/**
	 * JSON
	 */
	public function question_ID($id_qst=NULL){
		$qst=$this->m_question->get_all_ID(decrypt_url($id_qst))->row();

 		echo json_encode($qst);
	}

	public function n_question_IDMtr($id_mtr=NULL){
		$qst=$this->m_question->get_all_IDMtr(decrypt_url($id_mtr))->num_rows();

 		echo json_encode($qst);
	}

	public function choice_IDQst($id_qst=NULL){
		$chc=$this->m_choice->get_all_IDQst(decrypt_url($id_qst))->result();

 		echo json_encode($chc);
	}

	public function n_choice_IDQst($id_qst=NULL){
		$chc=$this->m_choice->get_all_IDQst(decrypt_url($id_qst))->num_rows();

 		echo json_encode($chc);
	}

	/**
	 * Try some code here!
	 */

 }
