<?php

class Print_receipt extends CI_Controller
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
            'title' => "Halaman Type Item"
        );
        $this->load->view('template/admin_header', $data);
        $this->load->view('admin/print_receipt');
        $this->load->view('template/admin_footer');
    }
    public function getData()
    {
        $data = $this->M_master_data->getDataPengiriman();
        echo json_encode($data);
    }
    public function printResi($id)
    {
        $data['pengiriman'] = $this->M_master_data->getDataByIdPengiriman($id);
        $data['title'] =  "Order Date : " . date(' D d/M/Y ', time());
        $this->load->view('template/print_resi', $data);
    }
}
