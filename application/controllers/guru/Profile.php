<?php
class Profile extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!isset($this->session->userdata['username'])) {
            $this->session->set_flashdata('message', 'Anda Belum Login!');
            redirect('login');
        }

        if ($this->session->userdata['level'] != 'guru') {
            $this->session->set_flashdata('message', 'Anda Belum Login!');
            redirect('login');
        }
    }

    public function index()
    {
        $data = $this->User_model->get_detail_guru($this->session->userdata['id_user'], $this->session->userdata['level']);
        $data = array(
            'guru'      => $data,
            'id_user'   => $data['id_user'],
            'nama'      => $data['nama'],
            'photo'     => $data['photo'] != null ? $data['photo'] : 'user-placeholder.jpg',
            'level'     => $data['level'],
            'menu'      => 'dashboard',
            'breadcrumb' => [
                0 => (object)[
                    'name' => 'Dashboard',
                    'link' => 'guru'
                ],
                1 => (object)[
                    'name' => 'Profile',
                    'link' => NULL
                ]
            ]
        );

        $this->load->view('templates/header');
        $this->load->view('templates_guru/sidebar', $data);
        $this->load->view('guru/profile', $data);
        $this->load->view('templates/footer');
    }

    public function password()
    {
        $data = $this->User_model->get_detail_guru($this->session->userdata['id_user'], $this->session->userdata['level']);
        $data = array(
            'id_user'   => $data['id_user'],
            'nama'      => $data['nama'],
            'photo'     => $data['photo'] != null ? $data['photo'] : 'user-placeholder.jpg',
            'level'     => $data['level'],
            'menu'      => 'dashboard',
            'breadcrumb' => [
                0 => (object)[
                    'name' => 'Dashboard',
                    'link' => 'guru'
                ],
                1 => (object)[
                    'name' => 'Profile',
                    'link' => 'guru/profile'
                ],
                2 => (object)[
                    'name' => 'Password',
                    'link' => NULL
                ]
            ]
        );

        $this->_rules_password();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates_guru/sidebar', $data);
            $this->load->view('guru/profile_password', $data);
            $this->load->view('templates/footer');
        } else {
            $this->User_model->edit_password($this->session->userdata['id_user']);
            $this->session->set_flashdata('message', 'Password Berhasil Diupdate!');
            redirect('guru/profile');
        }
    }

    private function _rules_password()
    {
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[50]');
        $this->form_validation->set_rules('konfirmasi', 'Konfirmasi Password', "required|min_length[6]|matches[password]|max_length[50]");
    }
}
