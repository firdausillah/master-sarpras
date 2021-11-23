<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ruang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('RuangModel');
        $this->load->model('GedungModel');
        $this->load->model('KondisiModel');

        if ($this->session->userdata('role') != 'admin') {
            redirect(base_url("auth"));
        }
    }

    public function index(){
        $data = [
            'title' => 'Ruang',
            'ruang' => $this->RuangModel->get()->result(),
            'gedung' => $this->GedungModel->get()->result(),
            'kondisi' => $this->KondisiModel->get()->result(),
            'content' => 'admin/ruang/table'
        ];

        $this->load->view('layout_admin/base', $data);
    }

    public function save(){
        $gedung = $this->GedungModel->findBy(['id' => $this->input->post('id_gedung')])->row();
        // print_r(uri_string()); exit();

        if (! empty($_FILES['foto']['name'])) {
            $config = [
                'upload_path' => './uploads/img/sarpras/ruang',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'max_size' => 2000,
                'file_name' => 'img_'. $gedung->kode_gedung . $this->input->post('kode_ruang'),
                'overwrite' => true
            ];
            
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) $foto = $this->upload->data('file_name');
            else exit('Error : ' . $this->upload->display_errors());
        }

        $data = [
            'id_gedung' => $this->input->post('id_gedung'),
            'kode_ruang' => $this->input->post('kode_ruang'),
            'nama_ruang' => $this->input->post('nama_ruang'),
            'panjang' => $this->input->post('panjang'),
            'lebar' => $this->input->post('lebar'),
            'tinggi' => $this->input->post('tinggi'),
            'foto' => $foto,
            'id_kondisi' => $this->input->post('id_kondisi'),
        ];
        
        if ($this->RuangModel->add($data)) {
            $this->session->set_flashdata('flash', 'Data berhasil dimasukan');
        } else {
            $this->session->set_flashdata('flash', 'Oops! Terjadi suatu kesalahan');
        }

        if($this->input->post('url') !== null){
            redirect(base_url($this->input->post('url')));
        } else {
            redirect(base_url('admin/ruang'));

        }
        // redirect()->to($_SERVER['HTTP_REFERER']);
    }

    public function edit($id){
        $data = [
            'title' => 'Edit Ruang',
            'ruang' => $this->RuangModel->findBy(['id' => $id])->row(),
            'gedung' => $this->GedungModel->get()->result(),
            'kondisi' => $this->KondisiModel->get()->result(),
            'content' => 'admin/ruang/edit'
        ];

        $this->load->view('layout_admin/base', $data);
    }

    public function update($id){
        $gedung = $this->GedungModel->findBy(['id' => $this->input->post('id_gedung')])->row();
        if (!empty($_FILES['foto']['name'])) {
            $config = [
                'upload_path' => './uploads/img/sarpras/ruang',
                'allowed_types' => 'gif|jpg|png',
                'max_size' => 2000,
                'file_name' => 'img_' . $gedung->kode_gedung . $this->input->post('kode_ruang'),
                'overwrite' => true
            ];

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) $foto = $this->upload->data('file_name');
            else exit('Error : ' . $this->upload->display_errors());
        }
        if (!empty($foto)) {
            $foto = $foto;
        } else {
            $foto = $this->input->post('gambar');
        }
        // print_r($foto); exit();

        $data = [
            'id_gedung' => $this->input->post('id_gedung'),
            'kode_ruang' => $this->input->post('kode_ruang'),
            'nama_ruang' => $this->input->post('nama_ruang'),
            'panjang' => $this->input->post('panjang'),
            'lebar' => $this->input->post('lebar'),
            'tinggi' => $this->input->post('tinggi'),
            'foto' => $foto,
            'id_kondisi' => $this->input->post('id_kondisi'),
        ];

        if ($this->RuangModel->update(['id' => $id], $data)) {
            $this->session->set_flashdata('flash', 'Data berhasil diupdate');
        } else {
            $this->session->set_flashdata('flash', 'Oops! Terjadi suatu kesalahan');
        }

        redirect(base_url('admin/ruang'));
    }

    public function delete($id){
        $data = $this->RuangModel->findBy(['tb_ruang.id' => $id])->row();
        @unlink(FCPATH . 'uploads/img/sarpras/' . $data->foto);
        if ($this->RuangModel->delete(['tb_ruang.id' => $id])) {
            $this->session->set_flashdata('flash', 'Data berhasil dihapus');
        } else {
            $this->session->set_flashdata('flash', 'Oops! Terjadi suatu kesalahan');
        }
        redirect('admin/ruang');
    }
}
