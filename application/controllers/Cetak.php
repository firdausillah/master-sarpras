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

	public function bukti($kode_pendaftaran){

		// print_r($this->mSiswa->joinJurusanKode($kode_pendaftaran)->row()); exit();
		$data = [
			'siswa' => $this->mSiswa->joinJurusanKode($kode_pendaftaran)->row(),
			'profile' => $this->mProfile->findBy(['id' => 1])->row(),
			'persyaratan' => $this->mPersyaratan->get()->result(),
			'persyaratan_siswa' => $this->Persyaratan_siswaModel->leftJoinPersyaratan($this->session->userdata('id'))->result()
		];
		$this->load->view('cetak/bukti', $data);
	}

	public function exportexcel(){
		$data = [
			'siswa' => $this->mSiswa->getAll()->result()
		];
		// print_r($this->mSiswa->getAll()->result()); exit();


		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		$sheet->setCellValue('A1', 'NO');
		$sheet->setCellValue('B1', 'KODE PENDAFTARAN');
		$sheet->setCellValue('C1', 'NAMA SISWA');
		$sheet->setCellValue('D1', 'JENIS KELAMIN');
		$sheet->setCellValue('E1', 'NISN');
		$sheet->setCellValue('F1', 'NIK SISWA');
		$sheet->setCellValue('G1', 'NOMOR KK');
		$sheet->setCellValue('H1', 'TEMPAT LAHIR SISWA');
		$sheet->setCellValue('I1', 'TANGGAL LAHIR SISWA');
		$sheet->setCellValue('J1', 'NOMOR AKTE KELAHIRAN');
		$sheet->setCellValue('K1', 'AGAMA');
		$sheet->setCellValue('L1', 'KEWARGANEGARAAN');
		$sheet->setCellValue('M1', 'ALAMAT SISWA');
		$sheet->setCellValue('N1', 'NOMOR HP');
		$sheet->setCellValue('O1', 'RT');
		$sheet->setCellValue('P1', 'RW');
		$sheet->setCellValue('Q1', 'DUSUN');
		$sheet->setCellValue('R1', 'DESA');
		$sheet->setCellValue('S1', 'KECAMATAN');
		$sheet->setCellValue('T1', 'KABUPATEN');
		$sheet->setCellValue('U1', 'KODE POS');
		$sheet->setCellValue('V1', 'TEMPAT TINGGAL');
		$sheet->setCellValue('W1', 'MODA TRANSPORTASI');
		$sheet->setCellValue('X1', 'ANAK KE-');
		$sheet->setCellValue('Y1', 'MEMPUNYAI KIP');
		$sheet->setCellValue('Z1', 'NAMA AYAH');
		$sheet->setCellValue('AA1', 'NOMOR HP AYAH');
		$sheet->setCellValue('AB1', 'NIK AYAH');
		$sheet->setCellValue('AC1', 'TANGGAL LAHIR AYAH');
		$sheet->setCellValue('AD1', 'PENDIDIKAN AYAH');
		$sheet->setCellValue('AE1', 'PEKERJAAN AYAH');
		$sheet->setCellValue('AF1', 'PENGHASILAN AYAH');
		$sheet->setCellValue('AG1', 'NAMA IBU');
		$sheet->setCellValue('AH1', 'NOMOR HP IBU');
		$sheet->setCellValue('AI1', 'NIK IBU');
		$sheet->setCellValue('AJ1', 'TANGGAL LAHIR IBU');
		$sheet->setCellValue('AK1', 'PENDIDIKAN IBU');
		$sheet->setCellValue('AL1', 'PEKERJAAN IBU');
		$sheet->setCellValue('AM1', 'PENGHASILAN IBU');
		$sheet->setCellValue('AN1', 'NAMA WALI');
		$sheet->setCellValue('AO1', 'NOMOR HP WALI');
		$sheet->setCellValue('AP1', 'NIK WALI');
		$sheet->setCellValue('AQ1', 'TANGGAL LAHIR WALI');
		$sheet->setCellValue('AR1', 'PENDIDIKAN WALI');
		$sheet->setCellValue('AS1', 'PEKERJAAN WALI');
		$sheet->setCellValue('AT1', 'PENGHASILAN WALI');
		$sheet->setCellValue('AU1', 'TINGGI BADAN');
		$sheet->setCellValue('AV1', 'BERAT BADAN');
		$sheet->setCellValue('AW1', 'DAFTAR ULANG');
		$sheet->setCellValue('AX1', 'TANGGAL DAFTAR ULANG');
		$sheet->setCellValue('AY1', 'STATUS VERIFIKASI');
		$sheet->setCellValue('AZ1', 'TANGGAL DAFTAR');
		$sheet->setCellValue('BA1', 'JURUSAN');
		$sheet->setCellValue('BB1', 'PEMBAWA');
		$sheet->setCellValue('BC1', 'GELOMBANG PENDAFTARAN');
		$sheet->setCellValue('BD1', 'ASAL SEKOLAH');

		$baris = 2;
		$no = 1;

		foreach ($data['siswa'] as $siswa) {
			$sheet->setCellValue('A'.$baris, $no++);
			$sheet->setCellValue('B'.$baris, $siswa->kode_pendaftaran);
			$sheet->setCellValue('C'.$baris, $siswa->nama);
			$sheet->setCellValue('D'.$baris, $siswa->jk);
			$sheet->setCellValue('E'.$baris, $siswa->nisn);
			$sheet->setCellValue('F'.$baris, $siswa->nik_siswa);
			$sheet->setCellValue('G'.$baris, $siswa->no_kk);
			$sheet->setCellValue('H'.$baris, $siswa->tempatlahir_siswa);
			$sheet->setCellValue('I'.$baris, $siswa->tgllahir_siswa);
			$sheet->setCellValue('J'.$baris, $siswa->noakte_lahir);
			$sheet->setCellValue('K'.$baris, $siswa->agama);
			$sheet->setCellValue('L'.$baris, $siswa->kewarganegaraan);
			$sheet->setCellValue('M'.$baris, $siswa->alamat_siswa);
			$sheet->setCellValue('N'.$baris, $siswa->nohp);
			$sheet->setCellValue('O'.$baris, $siswa->rt);
			$sheet->setCellValue('P'.$baris, $siswa->rw);
			$sheet->setCellValue('Q'.$baris, $siswa->dusun);
			$sheet->setCellValue('R'.$baris, $siswa->desa);
			$sheet->setCellValue('S'.$baris, $siswa->kec);
			$sheet->setCellValue('T'.$baris, $siswa->kab);
			$sheet->setCellValue('U'.$baris, $siswa->kodepos);
			$sheet->setCellValue('V'.$baris, $siswa->tempattinggal);
			$sheet->setCellValue('W'.$baris, $siswa->transportasi);
			$sheet->setCellValue('X'.$baris, $siswa->anak_berapa);
			$sheet->setCellValue('Y'.$baris, $siswa->punya_kip);
			$sheet->setCellValue('Z'.$baris, $siswa->nama_ayah);
			$sheet->setCellValue('AA'.$baris, $siswa->nohp_ayah);
			$sheet->setCellValue('AB'.$baris, $siswa->nik_ayah);
			$sheet->setCellValue('AC'.$baris, $siswa->tgllahir_ayah);
			$sheet->setCellValue('AD'.$baris, $siswa->pendidikanayah);
			$sheet->setCellValue('AE'.$baris, $siswa->pekerjaanayah);
			$sheet->setCellValue('AF'.$baris, $siswa->penghasilanayah);
			$sheet->setCellValue('AG'.$baris, $siswa->nama_ibu);
			$sheet->setCellValue('AH'.$baris, $siswa->nohp_ibu);
			$sheet->setCellValue('AI'.$baris, $siswa->nik_ibu);
			$sheet->setCellValue('AJ'.$baris, $siswa->tgllahir_ibu);
			$sheet->setCellValue('AK'.$baris, $siswa->pendidikanibu);
			$sheet->setCellValue('AL'.$baris, $siswa->pekerjaanibu);
			$sheet->setCellValue('AM'.$baris, $siswa->penghasilanibu);
			$sheet->setCellValue('AN'.$baris, $siswa->nama_wali);
			$sheet->setCellValue('AO'.$baris, $siswa->nohp_wali);
			$sheet->setCellValue('AP'.$baris, $siswa->nik_wali);
			$sheet->setCellValue('AQ'.$baris, $siswa->tgllahir_wali);
			$sheet->setCellValue('AR'.$baris, $siswa->pendidikanwali);
			$sheet->setCellValue('AS'.$baris, $siswa->pekerjaanwali);
			$sheet->setCellValue('AT'.$baris, $siswa->penghasilanwali);
			$sheet->setCellValue('AU'.$baris, $siswa->tinggi_badan);
			$sheet->setCellValue('AV'.$baris, $siswa->berat_badan);
			$sheet->setCellValue('AW'.$baris, $siswa->daftar_ulang);
			$sheet->setCellValue('AX'.$baris, $siswa->tgl_daftar_ulang);
			$sheet->setCellValue('AY'.$baris, $siswa->status);
			$sheet->setCellValue('AZ'.$baris, $siswa->tgl_daftar);
			$sheet->setCellValue('BA'.$baris, $siswa->jurusan);
			$sheet->setCellValue('BB'.$baris, $siswa->nama_lengkap_pembawa);
			$sheet->setCellValue('BC'.$baris, $siswa->gelombang);
			$sheet->setCellValue('BD'.$baris, $siswa->nama_asal_sekolah);

			$baris++;
		}
		
		$writer = new Xlsx($spreadsheet);
		$filename = 'laporan-siswa';
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
		header('Cache-Control: max-age=0');
		
		$writer->save('php://output');
exit();
		redirect($_SERVER['HTTP_REFERER']);
		
	}
}
