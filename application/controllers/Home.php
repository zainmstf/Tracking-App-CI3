<?php

class Home extends CI_Controller
{
    public function index()
    {
        $data['testi'] = $this->M_home->testi()->result();
        $this->load->view('template/header');
        $this->load->view('home', $data);
        $this->load->view('template/footer');
    }
    public function getDataFromAjx()
    {
        $data = $this->input->post('input_ajx');
        $ini = $this->M_home->search($data);
        echo json_encode($ini);
    }
}
