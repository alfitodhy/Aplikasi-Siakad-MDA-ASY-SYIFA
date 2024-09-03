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

        if ($this->session->userdata['level'] != 'wali kelas') {
            $this->session->set_flashdata('message', 'Anda Belum Login!');
            redirect('login');
        }
    }

    public function index()
    {
        $data = $this->User_model->get_detail_guru($this->session->userdata['id_user'], $this->session->userdata['level']);
        $kelas = $this->Kelas_model->get_like_walikelas($data['nama']);
        $tahun = $this->Tahun_model->get_active_stats();
        $data = array(
            'id_user'   => $data['id_user'],
            'nama'      => $data['nama'],
            'photo'     => $data['photo'] != null ? $data['photo'] : 'user-placeholder.jpg',
            'level'     => $data['level'],
            'menu'      => 'dashboard',
            'tahun'     => $tahun,
            'kelas'     => $kelas,
            'pengajar'  => $this->Pengajar_model->get_count_perpengajar($data['id_guru']),
            'siswa'     => $this->Siswa_model->get_count_perkelas($kelas['id_kelas'], $tahun),
            'breadcrumb' => [
                0 => (object)[
                    'name' => 'Dashboard',
                    'link' => NULL
                ]
            ]
        );

        $this->load->view('templates/header');
        $this->load->view('templates_guruwali/sidebar', $data);
        $this->load->view('guru_wali/dashboard', $data);
        $this->load->view('templates/footer');
    }
}
