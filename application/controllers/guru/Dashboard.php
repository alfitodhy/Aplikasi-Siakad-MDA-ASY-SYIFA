<?php
class Dashboard extends CI_Controller
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
        $data       = $this->User_model->get_detail_guru($this->session->userdata['id_user'], $this->session->userdata['level']);
        $guru       = $this->Guru_model->get_detail_data(NULL, $data['id_user']);
        $tahun      = $this->Tahun_model->get_active_stats();
        $data = array(
            'id_user'   => $data['id_user'],
            'nama'      => $data['nama'],
            'photo'     => $data['photo'] != null ? $data['photo'] : 'user-placeholder.jpg',
            'level'     => $data['level'],
            'menu'      => 'dashboard',
            'tahun'     => $tahun,
            'pengajar'  => $this->Pengajar_model->get_count_pengampu($guru['id_guru'], $tahun),
            'siswa'     => $this->Pengajar_model->get_count_siswa($guru['id_guru'], $tahun),
            'breadcrumb' => [
                0 => (object)[
                    'name' => 'Dashboard',
                    'link' => NULL
                ]
            ]
        );

        $this->load->view('templates/header');
        $this->load->view('templates_guru/sidebar', $data);
        $this->load->view('guru/dashboard', $data);
        $this->load->view('templates/footer');
    }
}
