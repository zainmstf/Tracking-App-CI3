<?php

class Incoming_report extends CI_Controller
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
        $this->load->view('admin/incoming');
        $this->load->view('template/admin_footer');
    }
    public function getData()
    {
        $data = $this->M_report->getDataPengirimanIn();
        echo json_encode($data);
    }

    public function allTime()
    {
        $data['title'] = "All Time";
        $data['type'] = "Incoming Report Orders";
        $data['dataFunc'] = "Incoming_report/getData";
        $data['sumTime'] = "Incoming_report/getDataTotalIncome";
        $this->load->view('template/laporan', $data);
    }
    public function getDataTotalIncome()
    {
        $data = $this->M_report->getSumIncome();
        echo json_encode($data);
    }

    public function thisMonth()
    {
        $data['title'] =  "This Month : " . date('M/Y ', time());
        $data['type'] = "Incoming Report Orders";
        $data['dataFunc'] = "Incoming_report/getDatathisMonth";
        $data['sumTime'] = "Incoming_report/getDataTotalIncomeThisMonth";
        $this->load->view('template/laporan', $data);
    }
    public function getDataThisMonth()
    {
        $data = $this->M_report->getDataPengirimanThisMonthIn();
        echo json_encode($data);
    }

    public function getDataTotalIncomeThisMonth()
    {
        $data = $this->M_report->getSumIncomeThisMonthIn();
        echo json_encode($data);
    }

    public function thisWeek()
    {
        $data['title'] =  "This Week : " . date('w , D d/M/Y ', time());
        $data['type'] = "Incoming Report Orders";
        $data['dataFunc'] = "Incoming_report/getDatathisWeek";
        $data['sumTime'] = "Incoming_report/getDataTotalIncomeThisWeek";
        $this->load->view('template/laporan', $data);
    }
    public function getDataThisWeek()
    {
        $data = $this->M_report->getDataPengirimanThisWeekIn();
        echo json_encode($data);
    }

    public function getDataTotalIncomeThisWeek()
    {
        $data = $this->M_report->getSumIncomeThisWeekIn();
        echo json_encode($data);
    }
    public function thisDay()
    {
        $data['title'] =  "This Day : " . date(' D d/M/Y ', time());
        $data['type'] = "Incoming Report Orders";
        $data['dataFunc'] = "Incoming_report/getDatathisDay";
        $data['sumTime'] = "Incoming_report/getDataTotalIncomeThisDay";
        $this->load->view('template/laporan', $data);
    }
    public function getDataThisDay()
    {
        $data = $this->M_report->getDataPengirimanThisDayIn();
        echo json_encode($data);
    }

    public function getDataTotalIncomeThisDay()
    {
        $data = $this->M_report->getSumIncomeThisDayIn();
        echo json_encode($data);
    }
}
