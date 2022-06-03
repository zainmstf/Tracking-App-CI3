<?php

class Outcoming_report extends CI_Controller
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
            'paket' => $this->M_dashboard->getDt('paket'),
            'vendor' => $this->M_dashboard->getDt('vendor'),
            'title' => "Halaman Type Item"
        );
        $this->load->view('template/admin_header', $data);
        $this->load->view('admin/outcoming');
        $this->load->view('template/admin_footer');
    }
    public function getData()
    {
        $data = $this->M_report->getDataPengirimanOut();
        echo json_encode($data);
    }

    public function allTime()
    {
        $data['title'] = "All Time";
        $data['type'] = "Outcoming Report Orders";
        $data['dataFunc'] = "Outcoming_report/getData";
        $data['sumTime'] = "Outcoming_report/getDataTotalIncome";
        $this->load->view('template/laporan', $data);
    }
    public function getDataTotalOutcome()
    {
        $data = $this->M_report->getSumOutcome();
        echo json_encode($data);
    }

    public function thisMonth()
    {
        $data['title'] =  "This Month : " . date('M/Y ', time());
        $data['type'] = "Incoming Report Orders";
        $data['dataFunc'] = "Outcoming_report/getDatathisMonth";
        $data['sumTime'] = "Outcoming_report/getDataTotalIncomeThisMonth";
        $this->load->view('template/laporan', $data);
    }
    public function getDataThisMonth()
    {
        $data = $this->M_report->getDataPengirimanThisMonthOut();
        echo json_encode($data);
    }

    public function getDataTotalIncomeThisMonth()
    {
        $data = $this->M_report->getSumIncomeThisMonthOut();
        echo json_encode($data);
    }

    public function thisWeek()
    {
        $data['title'] =  "This Week : " . date('w , D d/M/Y ', time());
        $data['type'] = "Incoming Report Orders";
        $data['dataFunc'] = "Outcoming_report/getDatathisWeek";
        $data['sumTime'] = "Outcoming_report/getDataTotalIncomeThisWeek";
        $this->load->view('template/laporan', $data);
    }
    public function getDataThisWeek()
    {
        $data = $this->M_report->getDataPengirimanThisWeekOut();
        echo json_encode($data);
    }

    public function getDataTotalIncomeThisWeek()
    {
        $data = $this->M_report->getSumIncomeThisWeekOut();
        echo json_encode($data);
    }
    public function thisDay()
    {
        $data['title'] =  "This Day : " . date(' D d/M/Y ', time());
        $data['type'] = "Incoming Report Orders";
        $data['dataFunc'] = "Outcoming_report/getDatathisDay";
        $data['sumTime'] = "Outcoming_report/getDataTotalIncomeThisDay";
        $this->load->view('template/laporan', $data);
    }
    public function getDataThisDay()
    {
        $data = $this->M_report->getDataPengirimanThisDayOut();
        echo json_encode($data);
    }

    public function getDataTotalIncomeThisDay()
    {
        $data = $this->M_report->getSumIncomeThisDayOut();
        echo json_encode($data);
    }
}
