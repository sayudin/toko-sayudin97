<?php

class Registrasi extends CI_Controller{

	public function index()
	{

			$this->form_validation->set_rules('nama','Nama','required', ['required' => 'Nama wajib di isi']);
			$this->form_validation->set_rules('username','Username','required',['required' => 'Username wajib di isi']);
			$this->form_validation->set_rules('password_1','password','required|matches[password_2]',['required' => 'password wajib di isi', 'matches' => 'pasword tidak cocok']);
			$this->form_validation->set_rules('password_2','password','required|matches[password_1]');




			if($this->form_validation->run() ==FALSE) {

			$this->load->view('tempelets/header');	
			$this->load->view('registrasi');
			$this->load->view('tempelets/footer');
		} else {

			$data = array(
					'id'				=> '',
					'nama'				=>		$this->input->post('nama'),
					'username'				=>		$this->input->post('username'),
					'password'				=>		$this->input->post('password_1'),
					'role_id'				=> 2,
			);

			$this->db->insert('tb_user',$data);
			redirect('auth/login');
	
		}
	}
}