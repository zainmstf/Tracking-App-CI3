<?php

class Vendor extends CI_Controller
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
            'title' => "Halaman Type Item"
        );
        $this->load->view('template/admin_header', $data);
        $this->load->view('admin/vendor');
        $this->load->view('template/admin_footer');
    }
    public function getData()
    {
        $data = $this->M_master_data->getData('vendor');
        echo json_encode($data);
    }
    public function addData()
    {
        $id_vendor = $this->M_master_data->getData('vendor');
        $lastIdVendor = $id_vendor[array_key_last($id_vendor)]->id_vendor + 1;
        $vendor = [
            'id_vendor' => $lastIdVendor,
            'nama_vendor' => $this->input->post('vendor_name'),
            'alamat_vendor' => $this->input->post('vendor_address'),
            'telp_vendor' => $this->input->post('vendor_phone_number'),
            'email_vendor' => $this->input->post('vendor_email'),
        ];
        $data = $this->M_master_data->addNewData("vendor", $vendor);
        echo json_encode($data);
    }
    public function deleteData()
    {
        $id = $this->input->post('id');
        $data = $this->M_master_data->deleteData('vendor', 'id_vendor', $id);
        echo json_encode($data);
    }
    public function getDataId()
    {
        $id = $this->input->post('id');
        $data = $this->M_master_data->getDataById('vendor', 'id_vendor', $id);
        echo json_encode($data);
    }
    public function updateData()
    {
        $vendor = [
            'id_vendor' => $this->input->post('id'),
            'nama_vendor' => $this->input->post('vendor_name'),
            'alamat_vendor' => $this->input->post('vendor_address'),
            'telp_vendor' => $this->input->post('vendor_phone_number'),
            'email_vendor' => $this->input->post('vendor_email'),
        ];
        $data = $this->M_master_data->editData('vendor', 'id_vendor', $vendor['id_vendor'], $vendor);
        echo json_encode($data);
    }
}
