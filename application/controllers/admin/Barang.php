<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('BarangModel');
        $this->load->model('KondisiModel');

        // if ($this->session->Barangdata('role') != 'admin') {
        //     redirect(base_url("auth/login"));
        // }
    }

    public function index(){
        $data = [
            'title' => 'Barang',
            'barang' => $this->BarangModel->get()->result(),
            'content' => 'admin/barang/table'
        ];

        $this->load->view('layout_admin/base', $data);
    }

    public function save(){
        
        $data = [
            'kode_barang' => $this->input->post('kode_barang'),
            'nama_barang' => $this->input->post('nama_barang')
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
            'content' => 'admin/barang/edit'
        ];

        $this->load->view('layout_admin/base', $data);
    }

    public function update($id){
        $data = [
            'kode_barang' => $this->input->post('kode_barang'),
            'nama_barang' => $this->input->post('nama_barang')
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
