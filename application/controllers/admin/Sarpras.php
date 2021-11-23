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
        $this->load->model('BarangModel');
        $this->load->model('KondisiModel');
        $this->load->model('StatusModel');

        if ($this->session->userdata('role') != 'admin') {
            redirect(base_url("auth"));
        }
    }

    public function index(){
        $gedung = $this->GedungModel->get()->result();
        // print_r($gedung);
        // exit();
        foreach($gedung as $ged) :
            $query = $this->db->query("SELECT * FROM tb_ruang where id_gedung = ".$ged->id)->result();
            $r[] = ['id' => $ged->id, 'nama_gedung' => $ged->nama_gedung, 'lantai' => $ged->lantai, 'kondisi' => $ged->kondisi, 'jumlah_ruang' => count($query)];
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

    public function gedung($id){
        $ruang = $this->RuangModel->findBy(['id_gedung' => $id])->result();
        // print_r($ruang);
        // exit();
        foreach($ruang as $ru) :
            $query = $this->db->query("SELECT * FROM tb_sarpras where id_ruang = ".$ru->id)->result();
            $r[] = ['id' => $ru->id, 'nama_ruang' => $ru->nama_ruang,  'kondisi' => $ru->kondisi, 'jumlah_barang' => count($query)];
        endforeach;
        // print_r($r);

        // exit();
        $gedung = $this->GedungModel->findBy(['id' => $id])->row();
        $data = [
            'title' => 'Ruang '. $gedung->nama_gedung,
            'id_gedung' => $id,
            'ruang' => $r,
            // 'ruang' => $this->RuangModel->findBy(['id_gedung' => $id])->result(),
            'kondisi' => $this->KondisiModel->get()->result(),
            'content' => 'admin/sarpras/gedung'
        ];

        $this->load->view('layout_admin/base', $data);
    }

    public function ruang($id){
        $ruang = $this->RuangModel->findBy(['tb_ruang.id' => $id])->row();
        $data = [
            'title' => 'Barang '. $ruang->nama_ruang,
            'id_ruang' => $id,
            'id_gedung' => $ruang->id_gedung,
            'barang_ruang' => $this->SarprasModel->findBy(['tb_sarpras.id_ruang' => $id])->result(),
            'barang' => $this->BarangModel->get()->result(),
            'kondisi' => $this->KondisiModel->get()->result(),
            'status' => $this->StatusModel->get()->result(),
            'content' => 'admin/sarpras/ruang'
        ];

        $this->load->view('layout_admin/base', $data);
    }

    public function save(){

        $kode_gedung = $this->GedungModel->findBy(['tb_gedung.id' => $this->input->post('id_gedung')])->row();
        $kode_ruang = $this->RuangModel->findBy(['tb_ruang.id' => $this->input->post('id_ruang')])->row();
        $kode_barang = $this->BarangModel->findBy(['id' => $this->input->post('id_barang')])->row();

        // nomor urut
        $nourut = $this->SarprasModel->cekUrut();
        $urut = sprintf("%04s", $nourut + 1);

        $kode = $kode_gedung->kode_gedung.$kode_ruang->kode_ruang.$kode_barang->kode_barang.$urut;
        // print_r($kode); exit();

        
        if (! empty($_FILES['foto']['name'])) {
            $config = [
                'upload_path' => './uploads/img/sarpras/barang',
                'allowed_types' => 'gif|jpg|png',
                'max_size' => 2000,
                'file_name' => 'img_'. $kode,
                'overwrite' => true
            ];
            
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) $foto = $this->upload->data('file_name');
            else exit('Error : ' . $this->upload->display_errors());
        }

        $data = [
            'id_ruang' => $this->input->post('id_ruang'),
            'id_barang' => $this->input->post('id_barang'),
            'id_status' => $this->input->post('id_status'),
            'id_kondisi' => $this->input->post('id_kondisi'),
            'kode_sarpras' => $kode,
            'jumlah' => $this->input->post('jumlah'),
            'tahun_masuk' => $this->input->post('tahun_masuk'),
            'foto' => $foto,
            'keterangan' => $this->input->post('keterangan')
        ];
        
        if ($this->SarprasModel->add($data)) {
            $this->session->set_flashdata('flash', 'Data berhasil dimasukan');
        } else {
            $this->session->set_flashdata('flash', 'Oops! Terjadi suatu kesalahan');
        }

        redirect(base_url($this->input->post('url')));
    }

    public function edit($id){

        // $barang = $this->SarprasModel->get()->result();
        $barang = $this->SarprasModel->findBy(['tb_sarpras.id' => $id])->row();

        // print_r($barang); exit();

        // $ruang = $this->RuangModel->findBy(['tb_ruang.id' => $id])->row();
        $data = [
            'title' => 'Barang ',
            'id_ruang' => $barang->id_ruang,
            'id_gedung' => $barang->id_gedung,
            'barang_ruang' => $this->SarprasModel->findBy(['tb_sarpras.id' => $id])->row(),
            'barang' => $this->BarangModel->get()->result(),
            'kondisi' => $this->KondisiModel->get()->result(),
            'status' => $this->StatusModel->get()->result(),
            'content' => 'admin/sarpras/edit'
        ];

        $this->load->view('layout_admin/base', $data);
    }

    public function update($id){

        $kode_gedung = $this->GedungModel->findBy(['tb_gedung.id' => $this->input->post('id_gedung')])->row();
        $kode_ruang = $this->RuangModel->findBy(['tb_ruang.id' => $this->input->post('id_ruang')])->row();
        $kode_barang = $this->BarangModel->findBy(['id' => $this->input->post('id_barang')])->row();

        // nomor urut
        $nourut = $this->SarprasModel->cekUrut();
        $urut = sprintf("%04s", $nourut + 1);

        $kode = $kode_gedung->kode_gedung.$kode_ruang->kode_ruang.$kode_barang->kode_barang.$urut;

        if (!empty($_FILES['foto']['name'])) {
            $config = [
                'upload_path' => './uploads/img/sarpras/barang',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'max_size' => 2000,
                'file_name' => 'img_' . $kode,
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
            'id_ruang' => $this->input->post('id_ruang'),
            'id_barang' => $this->input->post('id_barang'),
            'id_status' => $this->input->post('id_status'),
            'id_kondisi' => $this->input->post('id_kondisi'),
            'kode_sarpras' => $kode,
            'jumlah' => $this->input->post('jumlah'),
            'tahun_masuk' => $this->input->post('tahun_masuk'),
            'foto' => $foto,
            'keterangan' => $this->input->post('keterangan')
        ];

        if ($this->SarprasModel->update(['id' => $id], $data)) {
            $this->session->set_flashdata('flash', 'Data berhasil diupdate');
        } else {
            $this->session->set_flashdata('flash', 'Oops! Terjadi suatu kesalahan');
        }

        redirect(base_url($this->input->post('url')));
    }

    public function delete(){
        $id = $_GET['id'];
        $data = $this->SarprasModel->findBy(['tb_sarpras.id' => $id])->row();
        @unlink(FCPATH . 'uploads/img/sarpras/' . $data->foto);
        if ($this->SarprasModel->delete(['tb_sarpras.id' => $id])) {
            $this->session->set_flashdata('flash', 'Data berhasil dihapus');
        } else {
            $this->session->set_flashdata('flash', 'Oops! Terjadi suatu kesalahan');
        }
        redirect('admin/sarpras/ruang/'. $_GET['id_ruang']);
    }
}
