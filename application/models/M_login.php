<?php
class M_login extends CI_Model
{
    public function cek_login($username, $password)
    {
        return $this->db
            ->where('username', $username)
            ->where('password', $password)
            ->get('user');
    }
    public function getLoginData($user, $pass)
    {
        $u = $user;
        $p = MD5($pass);

        $query_cekLogin = $this->db->get_where('user', array('username' => $u, 'password' => $p));
        if (count($query_cekLogin->result()) > 0) {
            foreach ($query_cekLogin as $qck) {
                foreach ($query_cekLogin->result() as $ck) {
                    $sess_data['logged_in'] = TRUE;
                    $sess_data['username'] = $ck->username;
                    $sess_data['password'] = $ck->password;
                    $sess_data['level'] = $ck->level;
                    $sess_data['nama'] = $ck->nama;
                    $this->session->set_userdata($sess_data);
                }
            }

            redirect('admin/Dashboard');
        } else {
            $this->session->setflashdata('pesan', '<div class="alert alert-danger" role="alert">
            	Username atau Password Salah !
            </div>');
            redirect('admin/Auth');
        }
    }
}
