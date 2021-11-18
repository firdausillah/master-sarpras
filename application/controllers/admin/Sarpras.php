<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sarpras extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('SarprasModel');
        $this->load->model('RuangModel');
        $this->load->model('GedungModel');
        $this->load->model('KondisiModel');

        // if ($this->session->sarprasdata('role') != 'admin') {
        //     redirect(base_url("auth/login"));
        // }
    }

    public function index(){
        $gedung = $this->GedungModel->get()->result();
        // print_r($gedung);
        // exit();
        foreach($gedung as $ged) :
            $query = $this->db->query("SELECT * FROM tb_ruang where id_gedung = ".$ged->id)->result();
            $r[] = ['id' => $ged->id, 'nama_gedung' => $ged->nama_gedung, 'jumlah_ruang' => count($query)];
        endforeach;
        // print_r($r);

        // exit();
        $data = [
            'title' => 'Sarpras',
            'gedung' => $r,
            'content' => 'admin/sarpras/table'
        ];

        $this->load->view('layout_admin/base', $data);
    }

    public function save(){
        
        if (! empty($_FILES['foto']['name'])) {
            $config = [
                'upload_path' => './uploads/img/sarpras/sarpras',
                'allowed_types' => 'gif|jpg|png',
                'max_size' => 2000,
                'file_name' => 'img_'. $this->input->post('kode_sarpras'),
                'overwrite' => true
            ];
            
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) $foto = $this->upload->data('file_name');
            else exit('Error : ' . $this->upload->display_errors());
        }

        $data = [
            'kode_sarpras' => $this->input->post('kode_sarpras'),
            'nama_sarpras' => $this->input->post('nama_sarpras'),
            'panjang' => $this->input->post('panjang'),
            'lebar' => $this->input->post('lebar'),
            'tinggi' => $this->input->post('tinggi'),
            'lantai' => $this->input->post('lantai'),
            'foto' => $foto,
            'id_kondisi' => $this->input->post('id_kondisi'),
        ];
        
        if ($this->SarprasModel->add($data)) {
            $this->session->set_flashdata('flash', 'Data berhasil dimasukan');
        } else {
            $this->session->set_flashdata('flash', 'Oops! Terjadi suatu kesalahan');
        }

        redirect(base_url('admin/sarpras'));
    }

    public function gedung($id){
        $gedung = $this->GedungModel->findBy(['id' => $id])->row();
        $data = [
            'title' => 'Ruang '. $gedung->nama_gedung,
            'id_gedung' => $id,
            'ruang' => $this->RuangModel->findBy(['id_gedung' => $id])->result(),
            'kondisi' => $this->KondisiModel->get()->result(),
            'content' => 'admin/sarpras/gedung'
        ];

        $this->load->view('layout_admin/base', $data);
    }

    public function update($id){
        if (!empty($_FILES['foto']['name'])) {
            $config = [
                'upload_path' => './uploads/img/sarpras/sarpras',
                'allowed_types' => 'gif|jpg|png',
                'max_size' => 2000,
                'file_name' => 'img_' . $this->input->post('kode_sarpras'),
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
            'kode_sarpras' => $this->input->post('kode_sarpras'),
            'nama_sarpras' => $this->input->post('nama_sarpras'),
            'panjang' => $this->input->post('panjang'),
            'lebar' => $this->input->post('lebar'),
            'tinggi' => $this->input->post('tinggi'),
            'lantai' => $this->input->post('lantai'),
            'foto' => $foto,
            'id_kondisi' => $this->input->post('id_kondisi'),
        ];

        if ($this->SarprasModel->update(['id' => $id], $data)) {
            $this->session->set_flashdata('flash', 'Data berhasil diupdate');
        } else {
            $this->session->set_flashdata('flash', 'Oops! Terjadi suatu kesalahan');
        }

        redirect(base_url('admin/sarpras'));
    }

    public function delete($id){
        $data = $this->SarprasModel->findBy(['id' => $id])->row();
        @unlink(FCPATH . 'uploads/img/sarpras/' . $data->foto);
        if ($this->SarprasModel->delete(['id' => $id])) {
            $this->session->set_flashdata('flash', 'Data berhasil dihapus');
        } else {
            $this->session->set_flashdata('flash', 'Oops! Terjadi suatu kesalahan');
        }
        redirect('admin/sarpras');
    }
}
