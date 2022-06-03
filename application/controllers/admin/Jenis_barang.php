<?php

class Jenis_barang extends CI_Controller
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
            'title' => "Type Item Page"
        );
        $this->load->view('template/admin_header', $data);
        $this->load->view('admin/jenis_barang');
        $this->load->view('template/admin_footer');
    }
    public function getData()
    {
        $data = $this->M_master_data->getData('paket');
        echo json_encode($data);
    }
    public function addData()
    {
        $id_paket = $this->M_master_data->getData('paket');
        if (count($id_paket) > 0) {
            $lastIdPaket = $id_paket[array_key_last($id_paket)]->id_paket + 1;
        } else {
            $lastIdPaket = 1;
        }
        $paket = [
            'id_paket' => $lastIdPaket,
            'jenis_paket' => $this->input->post('type_item'),
        ];
        $data = $this->M_master_data->addNewData("paket", $paket);
        echo json_encode($data);
    }
    public function deleteData()
    {
        $id_paket = $this->input->post('id_paket');
        $data = $this->M_master_data->deleteData('paket', 'id_paket', $id_paket);
        echo json_encode($data);
    }
    public function getDataId()
    {
        $id = $this->input->post('id');
        $data = $this->M_master_data->getDataById('paket', 'id_paket', $id);
        echo json_encode($data);
    }
    public function updateData()
    {
        $paket = [
            'id_paket' => $this->input->post('id_paket'),
            'jenis_paket' => $this->input->post('item_name'),
        ];
        $data = $this->M_master_data->editData('paket', 'id_paket', $paket['id_paket'], $paket);
        echo json_encode($data);
    }
}
