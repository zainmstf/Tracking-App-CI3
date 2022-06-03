<?php

class Barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if (!isset($this->session->userdata['username']) || $this->session->userdata['level'] != 'Admin') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
           Anda belum login sebagai admin!
          </div>');
            redirect(base_url('admin/Auth'));
        }
    }

    public function index()
    {
        $data = $this->M_user->getData($this->session->userdata['username']);
        $data = array(
            'username' => $data->username,
            'level' => $data->level,
            'vendor' => $this->M_master_data->getData('vendor'),
            'title' => "Package Page"
        );
        $this->load->view('template/admin_header', $data);
        $this->load->view('admin/barang');
        $this->load->view('template/admin_footer');
    }
    public function getData()
    {
        $data = $this->M_master_data->getDataBarang();
        echo json_encode($data);
    }
    public function addData()
    {
        $id_barang = $this->M_master_data->getData('barang');
        $lastIdBarang = $id_barang[array_key_last($id_barang)]->id_barang + 1;
        $barang = [
            'id_barang' => $lastIdBarang,
            'id_vendor' => $this->input->post('vendor'),
            'nama_barang' => $this->input->post('item_name'),
            'berat' => $this->input->post('weight'),
            'volume' => $this->input->post('volume'),
        ];
        $data = $this->M_master_data->addNewData("barang", $barang);
        echo json_encode($data);
    }
    public function deleteData()
    {
        $id_barang = $this->input->post('id_barang');
        $data = $this->M_master_data->deleteData('barang', 'id_barang', $id_barang);
        echo json_encode($data);
    }
    public function getDataId()
    {
        $id = $this->input->post('id');
        $data = $this->M_master_data->getDataById('barang', 'id_barang', $id);
        echo json_encode($data);
    }
    public function updateData()
    {
        $barang = [
            'id_barang' => $this->input->post('id_barang'),
            'id_vendor' => $this->input->post('vendor'),
            'nama_barang' => $this->input->post('item_name'),
            'berat' => $this->input->post('weight'),
            'volume' => $this->input->post('volume'),
        ];
        $data = $this->M_master_data->editData('barang', 'id_barang', $barang['id_barang'], $barang);
        echo json_encode($data);
    }
}
