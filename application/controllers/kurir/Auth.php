<?php
class Auth extends CI_Controller
{
    public function index()
    {
        $this->load->view('kurir/login');
    }
    public function proses_login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/kurir_header');
            $this->load->view('kurir/login');
            $this->load->view('template/kurir_footer');
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                	Username atau Password tidak boleh kosong !
                </div>');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $username;
            $pass = MD5($password);

            $cek = $this->M_login->cek_login($user, $pass);
            if ($cek->num_rows() > 0) {
                foreach ($cek->result() as $ck) {
                    $sess_data['username'] = $ck->username;
                    $sess_data['email'] = $ck->email;
                    $sess_data['level'] = $ck->level;
                    $this->session->set_userdata($sess_data);
                }
                if ($sess_data['level'] == 'Kurir') {
                    redirect(base_url('kurir/Dashboard'));
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                	Anda bukan kurir !
                </div>');
                    redirect(base_url('kurir'));
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                	Maaf Username atau Password Salah !
                </div>');
                redirect(base_url('kurir'));
            }
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('admin'));
    }
}
