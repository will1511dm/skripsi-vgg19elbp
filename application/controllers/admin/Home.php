<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		#notifikasi

		$this->load->model('model_profil', 'profil');
		$this->load->model('model_home', 'home');
		$this->load->model('model_dashboard', 'dashboard');
		$this->load->model('model_data', 'data');
	}
	public function index()
	{
		#kelola session login
		$session['hasil'] = $this->session->userdata('logged_in');
		$role = $session['hasil']->hak_akses;
		$nama_admin = $session['hasil']->nama_admin;
		$fp_admin = $session['hasil']->fp_admin;
		$d['jabatan'] = $session['hasil']->jabatan;
		$d['hak_akses'] = $role;
		$d['nama_admin'] = $nama_admin;
		$d['fp_admin'] = $fp_admin;

		#kelola profil
		$d['get_profil'] = $this->profil->profil();
		$d['company'] = $d['get_profil'][0]['nama_perusahaan'];
		$d['singkatan'] = $d['get_profil'][0]['singkatan'];
		$d['meta'] = $d['get_profil'][0]['meta'];
		$d['desk_header'] = $d['get_profil'][0]['desk_header'];

		

		#kelola nav
		$d['konten'] = "dashboard";
		$d['title'] = "Dashboard";
		$d['nav1'] = "Apps";
		$d['nav2'] = "Dashboard";
		$d['nav3'] = "";

		// // Membuat data dummy
		// $dummy_data = $this->generate_dummy_data();

		// // Menyimpan data ke dalam file CSV
		// $csv_file_path = 'assets/dummy_data_ujian.csv';
		// $file = fopen($csv_file_path, 'w');

		// // Menulis header
		// fputcsv($file, ['No', 'Nama Peserta', 'Kabupaten/Kota', 'Provinsi', 'Nilai Ujian']);

		// // Menulis data
		// foreach ($dummy_data as $row) {
		// 	fputcsv($file, $row);
		// }

		// fclose($file);

		// echo "Data telah disimpan dalam file CSV: $csv_file_path";

		#Keamanan Login Session dan hak ases akun
		if ($this->session->userdata('logged_in') and $role == 'Administrator') {
			$this->load->view('template/home', $d);
		} else {
			redirect('login/kick');
		}
	}

	// Fungsi untuk membuat data dummy
	function generate_dummy_data($num_records = 300)
	{
		$data = [];
		$kabupaten_kota = ['Sleman', 'Yogyakarta', 'Bantul', 'Kulon Progo'];
		$provinsi = 'DIY';

		for ($i = 1; $i <= $num_records; $i++) {
			$peserta = 'Peserta_' . $i;
			$kabupaten = $kabupaten_kota[array_rand($kabupaten_kota)];
			$nilai_ujian = rand(60, 100);

			$data[] = [$i, $peserta, $kabupaten, $provinsi, $nilai_ujian];
		}

		return $data;
	}
}
