<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Cetak extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('GelombangModel', 'mGelombang');
		$this->load->model('AuthModel', 'mAuth');
		$this->load->model('PersyaratanModel', 'mPersyaratan');
		$this->load->model('ProfileModel', 'mProfile');
		$this->load->model('Persyaratan_siswaModel');
		$this->load->model('SiswaModel', 'mSiswa');
	}

	public function laporan_ruang($id){

		print_r($id); exit();

		$data = [
			'siswa' => $this->mSiswa->joinJurusanKode($id)->row(),
			'profile' => $this->mProfile->findBy(['id' => 1])->row(),
			'persyaratan' => $this->mPersyaratan->get()->result(),
			'persyaratan_siswa' => $this->Persyaratan_siswaModel->leftJoinPersyaratan($this->session->userdata('id'))->result()
		];
		$this->load->view('cetak/bukti', $data);
	}

}
