<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gedung extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('GedungModel');
        $this->load->model('KondisiModel');

        if ($this->session->userdata('role') != 'admin') {
            redirect(base_url("auth"));
        }
    }

    public function index(){
        $data = [
            'title' => 'Gedung',
            'gedung' => $this->GedungModel->get()->result(),
            'kondisi' => $this->KondisiModel->get()->result(),
            'content' => 'admin/gedung/table'
        ];

        $this->load->view('layout_admin/base', $data);
    }

    public function save(){
        
        if (! empty($_FILES['foto']['name'])) {
            $config = [
                'upload_path' => './uploads/img/sarpras/gedung',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'max_size' => 2000,
                'file_name' => 'img_'. $this->input->post('kode_gedung'),
                'overwrite' => true
            ];
            
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) $foto = $this->upload->data('file_name');
            else exit('Error : ' . $this->upload->display_errors());
        }

        $data = [
            'kode_gedung' => $this->input->post('kode_gedung'),
            'nama_gedung' => $this->input->post('nama_gedung'),
            'panjang' => $this->input->post('panjang'),
            'lebar' => $this->input->post('lebar'),
            'tinggi' => $this->input->post('tinggi'),
            'lantai' => $this->input->post('lantai'),
            'foto' => $foto,
            'id_kondisi' => $this->input->post('id_kondisi'),
        ];
        
        if ($this->GedungModel->add($data)) {
            $this->session->set_flashdata('flash', 'Data berhasil dimasukan');
        } else {
            $this->session->set_flashdata('flash', 'Oops! Terjadi suatu kesalahan');
        }

        redirect(base_url('admin/gedung'));
    }

    public function edit($id){
        $data = [
            'title' => 'Edit Gedung',
            'gedung' => $this->GedungModel->findBy(['id' => $id])->row(),
            'kondisi' => $this->KondisiModel->get()->result(),
            'content' => 'admin/gedung/edit'
        ];

        $this->load->view('layout_admin/base', $data);
    }

    public function update($id){
        if (!empty($_FILES['foto']['name'])) {
            $config = [
                'upload_path' => './uploads/img/sarpras/gedung',
                'allowed_types' => 'gif|jpg|png',
                'max_size' => 2000,
                'file_name' => 'img_' . $this->input->post('kode_gedung'),
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
            'kode_gedung' => $this->input->post('kode_gedung'),
            'nama_gedung' => $this->input->post('nama_gedung'),
            'panjang' => $this->input->post('panjang'),
            'lebar' => $this->input->post('lebar'),
            'tinggi' => $this->input->post('tinggi'),
            'lantai' => $this->input->post('lantai'),
            'foto' => $foto,
            'id_kondisi' => $this->input->post('id_kondisi'),
        ];

        if ($this->GedungModel->update(['id' => $id], $data)) {
            $this->session->set_flashdata('flash', 'Data berhasil diupdate');
        } else {
            $this->session->set_flashdata('flash', 'Oops! Terjadi suatu kesalahan');
        }

        redirect(base_url('admin/gedung'));
    }

    public function delete($id){
        $data = $this->GedungModel->findBy(['id' => $id])->row();
        @unlink(FCPATH . 'uploads/img/sarpras/' . $data->foto);
        if ($this->GedungModel->delete(['id' => $id])) {
            $this->session->set_flashdata('flash', 'Data berhasil dihapus');
        } else {
            $this->session->set_flashdata('flash', 'Oops! Terjadi suatu kesalahan');
        }
        redirect('admin/gedung');
    }
}
