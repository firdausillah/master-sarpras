<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('BarangModel');
        $this->load->model('KondisiModel');
        $this->load->model('SarprasModel');
        $this->load->model('Jenis_saranaModel');

        if ($this->session->userdata('role') != 'admin') {
            redirect(base_url("auth"));
        }
    }

    public function index(){

        // $barang = $this->BarangModel->get()->result();
        // print_r($barang); 
        // exit();

        $data = [
            'title' => 'Barang',
            'barang' => $this->BarangModel->get()->result(),
            'jenis_sarana' => $this->Jenis_saranaModel->get()->result(),
            'content' => 'admin/barang/table'
        ];

        $this->load->view('layout_admin/base', $data);
    }

    public function save(){
        // print_r($_POST); exit();
        
        $data = [
            'kode_barang' => $this->input->post('kode_barang'),
            'nama_barang' => $this->input->post('nama_barang'),
            'id_jenis_sarana' => $this->input->post('id_jenis_sarana')
        ];
        
        if ($this->BarangModel->add($data)) {
            $this->session->set_flashdata('flash', 'Data berhasil dimasukan');
        } else {
            $this->session->set_flashdata('flash', 'Oops! Terjadi suatu kesalahan');
        }

        redirect(base_url('admin/barang'));
    }

    public function edit($id){
        $data = [
            'title' => 'Edit Barang',
            'barang' => $this->BarangModel->findBy(['id' => $id])->row(),
            'jenis_sarana' => $this->Jenis_saranaModel->get()->result(),
            'content' => 'admin/barang/edit'
        ];

        $this->load->view('layout_admin/base', $data);
    }

    public function update($id){
        $data = [
            'kode_barang' => $this->input->post('kode_barang'),
            'nama_barang' => $this->input->post('nama_barang'),
            'id_jenis_sarana' => $this->input->post('id_jenis_sarana')
        ];

        if ($this->BarangModel->update(['id' => $id], $data)) {
            $this->session->set_flashdata('flash', 'Data berhasil diupdate');
        } else {
            $this->session->set_flashdata('flash', 'Oops! Terjadi suatu kesalahan');
        }

        redirect(base_url('admin/barang'));
    }

    public function delete($id){
        $data = $this->BarangModel->findBy(['id' => $id])->row();
        @unlink(FCPATH . 'uploads/img/sarpras/' . $data->foto);
        if ($this->BarangModel->delete(['id' => $id])) {
            $this->session->set_flashdata('flash', 'Data berhasil dihapus');
        } else {
            $this->session->set_flashdata('flash', 'Oops! Terjadi suatu kesalahan');
        }
        redirect('admin/barang');
    }
}
