<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->output->set_header('Cache-Control: no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
        $this->output->set_header('Pragma: no-cache');
    }

    public function index()
    {
        $data['login'] = 'this is login';
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('login/index');
            $this->load->view('templates/footer', $data);
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $username;
            $pass = MD5($password);

            $check = $this->Login_model->check_login($user, $pass);

            if ($check->num_rows() > 0) {
                foreach ($check->result() as $ck) {
                    if ($ck->status == 1) {
                        $sess_data['logged_in']     = TRUE;
                        $sess_data['id_user']       = $ck->id_user;
                        $sess_data['username']      = $ck->username;
                        $sess_data['password']      = $ck->$password;
                        $sess_data['level']         = $ck->level;

                        $this->session->set_userdata($sess_data);

                        if ($sess_data['level'] == 'admin') {
                            redirect('admin');
                        } elseif ($sess_data['level'] == 'guru') {
                            redirect('guru');
                        } elseif ($sess_data['level'] == 'wali kelas') {
                            redirect('walikelas');
                        } elseif ($sess_data['level'] == 'siswa') {
                            redirect('siswa');
                        } else {
                            $this->session->set_flashdata('message', 'Username atau Password Salah!');
                            redirect('login');
                        }
                    } else {
                        $this->session->set_flashdata('message', 'Username atau Password Salah!');
                        redirect('login');
                    }
                }
            } else {
                $this->session->set_flashdata('message', 'Username atau Password Salah!');
                redirect('login');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'Username / Email / NISN wajib di isi!']);
        $this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password wajib di isi!']);
    }
}
