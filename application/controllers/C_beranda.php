<?php

class C_beranda extends CI_Controller
{
    public function index()
    {
        $data['testi'] = $this->M_beranda->testi()->result();
        $this->load->view('template/header');
        $this->load->view('V_beranda', $data);
        $this->load->view('template/footer');
    }
    public function getDataFromAjx()
    {
        $data = $this->input->post('input_ajx');
        $ini = $this->M_beranda->search($data);
        echo json_encode($ini);
    }
}
