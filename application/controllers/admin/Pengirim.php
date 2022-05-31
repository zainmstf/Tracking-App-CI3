<?php

class Pengirim extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if (!isset($this->session->userdata['username'])) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
           Anda belum login !
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
            'cities' => $this->M_location->getCities(),
            'title' => "Halaman Type Item"
        );
        $this->load->view('template/admin_header', $data);
        $this->load->view('admin/pengirim');
        $this->load->view('template/admin_footer');
    }
    public function getData()
    {
        $data = $this->M_master_data->getData('pengirim');
        echo json_encode($data);
    }
    public function addData()
    {
        $id_pengirim = $this->M_dashboard->getDt('pengirim');
        $lastIdPengirim = $id_pengirim[array_key_last($id_pengirim)]->id_pengirim + 1;
        $pengirim = [
            'id_pengirim' => $lastIdPengirim,
            'nama_pengirim' => $this->input->post('sender_name'),
            'asal' => $this->input->post('origin_city'),
            'alamat_pengirim' => $this->input->post('sender_address'),
            'telp_pengirim' => $this->input->post('sender_phone_number'),
            'kode_pos_pengirim' => $this->input->post('sender_post_code')
        ];
        $data = $this->M_master_data->addNewData("pengirim", $pengirim);
        echo json_encode($data);
    }
    public function deleteData()
    {
        $id = $this->input->post('id');
        $data = $this->M_master_data->deleteData('pengirim', 'id_pengirim', $id);
        echo json_encode($data);
    }
    public function getDataId()
    {
        $id = $this->input->post('id');
        $data = $this->M_master_data->getDataById('pengirim', 'id_pengirim', $id);
        echo json_encode($data);
    }
    public function updateData()
    {
        $pengirim = [
            'id_pengirim' => $this->input->post("id_pengirim"),
            'nama_pengirim' => $this->input->post("sender_name"),
            'asal' => $this->input->post('origin_city'),
            'alamat_pengirim' => $this->input->post('sender_address'),
            'telp_pengirim' => $this->input->post('sender_phone_number'),
            'kode_pos_pengirim' => $this->input->post('sender_post_code')
        ];
        $data = $this->M_master_data->editData('pengirim', 'id_pengirim', $pengirim['id_pengirim'], $pengirim);
        echo json_encode($data);
    }
}
