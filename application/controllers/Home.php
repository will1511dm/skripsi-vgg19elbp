<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		#notifikasi

		$this->load->model('model_profil', 'profil');
		$this->load->model('model_login', 'login');
	}
	public function index()
	{

		if (!empty($this->session->userdata('logged_in'))) {
			$role['hak_akses'] = $this->session->userdata('logged_in');
			if ($role['hak_akses']->hak_akses == "Administrator") {
				
				redirect('admin/master_data/prediksi', 'refresh');
			}
		} else {
			// #kelola Database
			$d['get_profil'] = $this->profil->profil();
			// #detail
			$d['title'] = "Login System";
			$d['company'] = $d['get_profil'][0]['nama_perusahaan'];
			$d['singkatan'] = $d['get_profil'][0]['singkatan'];
			$d['desk_header'] = $d['get_profil'][0]['desk_header'];
			$d['meta'] = $d['get_profil'][0]['meta'];

			$this->load->view('home', $d);
		}
	}
	public function getLogin()
	{
		$username = "admin";
		$password = sha1('adadeh'); // Hindari menyimpan plaintext password, gunakan hash lebih aman seperti bcrypt.
	
		// Cek login hanya sekali
		$hasil = $this->login->cekLogin($username, $password);
	
		// Jika login berhasil
		if (!empty($hasil)) {
			// Redirect ke halaman home
			redirect('home');
		} else {
			// Login gagal, tetap di halaman login dengan data 'cek'
			$data['cek'] = '0';
			$this->load->view('home', $data);
		}
	}
	

	public function logout()
	{

		$this->session->unset_userdata('logged_in', FALSE);
			redirect('home', 'refresh');
	}
	public function kick()
	{
		$this->session->unset_userdata('logged_in');

		$this->session->set_flashdata('pesan', 'aksestidakdizinkan');
		redirect('home');
	}
}