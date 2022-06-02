<?php

class Change_status extends CI_Controller
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
            'paket' => $this->M_dashboard->getDt('paket'),
            'vendor' => $this->M_dashboard->getDt('vendor'),
            'title' => "Halaman Type Item"
        );
        $this->load->view('template/admin_header', $data);
        $this->load->view('admin/change_status');
        $this->load->view('template/admin_footer');
    }
    public function getData()
    {
        $data = $this->M_master_data->getDataPengiriman();
        echo json_encode($data);
    }
    public function getDataId()
    {
        $id = $this->input->post('id');
        $data = $this->M_master_data->getDataByIdPengiriman($id);
        echo json_encode($data);
    }
    public function updateData()
    {
        $status = $this->input->post('status');
        if ($status == 'Delivered') {
            $tgl_diterima = date('Y-m-d H:i:s');
        } else {
            $tgl_diterima = null;
        }
        if ($this->session->userdata['level'] == "kurir") {
            $kurir = $this->session->userdata['username'];
        } else {
            $kurir = 'Ttd ' . $this->session->userdata['username'];
        }
        $pengiriman = [
            'id_pengiriman' => $this->input->post('id_pengiriman'),
            'status' => $status,
            'tgl_diterima' => $tgl_diterima,
            'kurir' => $kurir,
        ];
        $data = $this->M_master_data->changeStatus($pengiriman);
        echo json_encode($data);
    }
}
