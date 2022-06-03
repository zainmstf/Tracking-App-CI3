<?php

class Penerima extends CI_Controller
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
            'cities' => $this->M_location->getCities(),
            'title' => "Receipent Page"
        );
        $this->load->view('template/admin_header', $data);
        $this->load->view('admin/penerima');
        $this->load->view('template/admin_footer');
    }
    public function getData()
    {
        $data = $this->M_master_data->getData('penerima');
        echo json_encode($data);
    }
    public function addData()
    {
        $id_penerima = $this->M_dashboard->getDt('penerima');
        if (count($id_penerima) > 0) {
            $lastIdPenerima = $id_penerima[array_key_last($id_penerima)]->id_penerima + 1;
        } else {
            $lastIdPenerima = 1;
        }
        $penerima = [
            'id_penerima' => $lastIdPenerima,
            'nama_penerima' => $this->input->post('receipent_name'),
            'tujuan' => $this->input->post('destination_city'),
            'alamat_penerima' => $this->input->post('receipent_address'),
            'telp_penerima' => $this->input->post('receipent_phone_number'),
            'kode_pos_penerima' => $this->input->post('receipent_post_code')
        ];
        $data = $this->M_master_data->addNewData("penerima", $penerima);
        echo json_encode($data);
    }
    public function deleteData()
    {
        $id = $this->input->post('id');
        $data = $this->M_master_data->deleteData('penerima', 'id_penerima', $id);
        echo json_encode($data);
    }
    public function getDataId()
    {
        $id = $this->input->post('id');
        $data = $this->M_master_data->getDataById('penerima', 'id_penerima', $id);
        echo json_encode($data);
    }
    public function updateData()
    {
        $penerima = [
            'id_penerima' => $this->input->post('id_penerima'),
            'nama_penerima' => $this->input->post('receipent_name'),
            'tujuan' => $this->input->post('destination_city'),
            'alamat_penerima' => $this->input->post('receipent_address'),
            'telp_penerima' => $this->input->post('receipent_phone_number'),
            'kode_pos_penerima' => $this->input->post('receipent_post_code')
        ];
        $data = $this->M_master_data->editData('penerima', 'id_penerima', $penerima['id_penerima'], $penerima);
        echo json_encode($data);
    }
}
