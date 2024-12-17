<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Master_data extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		#notifikasi

		$this->load->model('model_profil', 'profil');
		$this->load->model('model_data', 'data');
        		        // Memuat helper form, URL, dan helper file
				$this->load->helper(['form', 'url', 'file']);
				// Memuat library form validation
				$this->load->library('form_validation');
	
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

		#kelola database
		$d['get_data'] = $this->data->get_data();

		#kelola nav
		$d['konten'] = "dashboard";
		$d['title'] = "Dashboard";
		$d['nav1'] = "Apps";
		$d['nav2'] = "Dashboard";
		$d['nav3'] = "";


		#Keamanan Login Session dan hak ases akun
		if ($this->session->userdata('logged_in') and $role == 'Administrator') {
			$this->load->view('template/home', $d);
		} else {
			redirect('login/kick');
		}
	}

    

    public function prediksi()
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

        #kelola database
		

        #kelola nav
        $d['konten'] = "prediksi";
        $d['title'] = "Prediksi Jenis Mineral";
        $d['nav1'] = "Apps";
        $d['nav2'] = "Prediksi Jenis Mineral";
        $d['nav3'] = "";
       
        #Keamanan Login Session dan hak ases akun
        if ($this->session->userdata('logged_in') and $role == 'Administrator') {
            $this->load->view('template/home', $d);
        } else {
            redirect('login/kick');
        }
    }


    public function hasil_prediksi()
{
    # Kelola session login
    $session_data = $this->session->userdata('logged_in');
    if (!$session_data) {
        redirect('login/kick');
        return;
    }

    $role = $session_data->hak_akses;
    $d['hak_akses'] = $role;
    $d['nama_admin'] = $session_data->nama_admin;
    $d['fp_admin'] = $session_data->fp_admin;
    $d['jabatan'] = $session_data->jabatan;

    # Kelola profil
    $d['get_profil'] = $this->profil->profil();
    if (!empty($d['get_profil'])) {
        $d['company'] = $d['get_profil'][0]['nama_perusahaan'];
        $d['singkatan'] = $d['get_profil'][0]['singkatan'];
        $d['meta'] = $d['get_profil'][0]['meta'];
        $d['desk_header'] = $d['get_profil'][0]['desk_header'];
    }

    # Konfigurasi upload file
    $config['upload_path'] = FCPATH . 'uploads/prediksi/';
    $config['allowed_types'] = 'jpg|jpeg|png';
    $config['overwrite'] = TRUE; // Agar file dengan nama sama di-overwrite
    $this->load->library('upload', $config);

    $files = $_FILES['userfile'];
    $count = count($files['name']);

    for ($i = 0; $i < $count; $i++) {
        $_FILES['userfile']['name']     = $files['name'][$i];
        $_FILES['userfile']['type']     = $files['type'][$i];
        $_FILES['userfile']['tmp_name'] = $files['tmp_name'][$i];
        $_FILES['userfile']['error']    = $files['error'][$i];
        $_FILES['userfile']['size']     = $files['size'][$i];

        $new_name = '1' . '.jpg';  // Contoh nama file baru
        $config['file_name'] = $new_name;
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('userfile')) {
            $error = $this->upload->display_errors();
            echo "Upload Error: $error";
            exit;
        } else {
            $upload_data = $this->upload->data();

            # Resize gambar
            $config_resize['image_library'] = 'gd2';
            $config_resize['source_image'] = $upload_data['full_path'];
            $config_resize['maintain_ratio'] = TRUE;
            $config_resize['width'] = 224;  // Sesuaikan ukuran
            $config_resize['height'] = 224; // Sesuaikan ukuran

            $this->load->library('image_lib', $config_resize);
            if (!$this->image_lib->resize()) {
                echo $this->image_lib->display_errors();
                exit;
            }
            $this->image_lib->clear();
        }
    }

    $pythonInterpreter = 'C:\Users\iStrip\AppData\Local\Programs\Python\Python311\python.exe';
    $pythonScript1 = 'C:/xampp/htdocs/vgg/elbf_prediksi.py';
    $pythonScript2 = 'C:/xampp/htdocs/vgg/Prediksi.py';
    
    // Construct and execute command for the first script
    $command1 = escapeshellcmd("$pythonInterpreter") . ' ' . escapeshellarg($pythonScript1);
    $output1 = shell_exec($command1);
    

    
    // Construct and execute command for the second script
    $command2 = escapeshellcmd("$pythonInterpreter") . ' ' . escapeshellarg($pythonScript2);
    $output2 = shell_exec($command2);

    
    // Mengambil data prediksi dari database
    $d['get_data'] = $this->data->prediksi('');
    
    if (!empty($d['get_data'])) {
        $d['hasil'] = $d['get_data'][0]['hasil'];
    
        // Mengalikan confidence dengan 100 dan memformat ke 2 desimal
        $d['confidence'] = number_format($d['get_data'][0]['confidence'] * 100, 2);
    } else {
        echo "Data prediksi tidak ditemukan.";
    }
   

    # Kelola nav
    $d['konten'] = "hasil_prediksi";
    $d['title'] = "Hasil Prediksi Jenis Mineral";
    $d['nav1'] = "Apps";
    $d['nav2'] = "Hasil Prediksi Jenis Mineral";
   

    # Keamanan login session dan hak akses akun
    if ($this->session->userdata('logged_in') && $role == 'Administrator') {
        $this->load->view('template/home', $d);
    } else {
        redirect('login/kick');
    }
}

    public function about()
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

        #kelola database
		

        #kelola nav
        $d['konten'] = "about";
        $d['title'] = "Tentang Sistem Deteksi Mineral";
        $d['nav1'] = "Apps";
        $d['nav2'] = "About";
        $d['nav3'] = "";

        if ($this->session->userdata('logged_in') and $role == 'Administrator') {
            $this->load->view('template/home', $d);
        } else {
            redirect('login/kick');
        }
    }
    public function help()
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

        #kelola database
		

        #kelola nav
        $d['konten'] = "help";
        $d['title'] = "Panduan Penggunaan Aplikasi";
        $d['nav1'] = "Apps";
        $d['nav2'] = "Help";
        $d['nav3'] = "";

        if ($this->session->userdata('logged_in') and $role == 'Administrator') {
            $this->load->view('template/home', $d);
        } else {
            redirect('login/kick');
        }
    }
    public function history()
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

        #kelola database
        $d['get_data'] = $this->data->history('');

        #kelola nav
        $d['konten'] = "history";
        $d['title'] = "Data History";
        $d['nav1'] = "Apps";
        $d['nav2'] = "Data History";
        $d['nav3'] = "";
        #Keamanan Login Session dan hak ases akun
        if ($this->session->userdata('logged_in') and $role == 'Administrator') {
            $this->load->view('template/home', $d);
        } else {
            redirect('login/kick');
        }
    }
    public function jenis()
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

        #kelola database

                $d['get_data'] = $this->data->jenis('');

        #kelola nav
        $d['konten'] = "jenis";
        $d['title'] = "Jenis Mineral yang dapat di prediksi";
        $d['nav1'] = "Apps";
        $d['nav2'] = "jenis";
        $d['nav3'] = "";

        if ($this->session->userdata('logged_in') and $role == 'Administrator') {
            $this->load->view('template/home', $d);
        } else {
            redirect('login/kick');
        }
    }

}