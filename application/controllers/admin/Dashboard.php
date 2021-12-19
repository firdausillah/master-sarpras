<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('ProfileModel');
        $this->load->model('GedungModel');
        $this->load->model('RuangModel');
        $this->load->model('BarangModel');

        if ($this->session->userdata('status') != 'login') {
            redirect(base_url("auth"));
        }
    }

    public function index()
    {
        if ($this->session->userdata('role') == 'penanggungjawab') {
            $jumlah_ruang = $this->RuangModel->findBy(['id_user' => $this->session->userdata('id')])->num_rows();
        } else {
            $jumlah_ruang = $this->RuangModel->get()->num_rows();
        }

        // print_r($jumlah_ruang);
        // exit();
        $data = [
            'title' => 'Dashboard',
            'jumlah_gedung' => $this->GedungModel->get()->num_rows(),
            'jumlah_barang' => $this->BarangModel->get()->num_rows(),
            'jumlah_ruang' => $jumlah_ruang,
            'profile' => $this->ProfileModel->findBy(['id' => 1])->row(),
            'content' => 'admin/dashboard'
        ];

        $this->load->view('layout_admin/base', $data);
    }
}
