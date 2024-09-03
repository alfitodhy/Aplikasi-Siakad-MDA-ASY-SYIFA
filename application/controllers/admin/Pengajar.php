<?php

class Pengajar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->output->set_header('Cache-Control: no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
        $this->output->set_header('Pragma: no-cache');

        if (!isset($this->session->userdata['username']) && $this->session->userdata['level'] != 'admin') {
            $this->session->set_flashdata('message', 'Anda Belum Login!');
            redirect('login');
        }

        if ($this->session->userdata['level'] != 'admin') {
            $this->session->set_flashdata('message', 'Anda Belum Login!');
            redirect('login');
        }
    }

    public function index()
    {
        $data = $this->User_model->get_detail_admin($this->session->userdata['id_user'], $this->session->userdata['level']);
        $data = array(
            'id_user'   => $data['id_user'],
            'nama'      => $data['nama'],
            'photo'     => $data['photo'] != null ? $data['photo'] : 'user-placeholder.jpg',
            'level'     => $data['level'],
            'pengajar'  => $this->Pengajar_model->get_data(),
            'menu'      => 'pengajar',
            'breadcrumb' => [
                0 => (object)[
                    'name' => 'Dashboard',
                    'link' => 'admin'
                ],
                1 => (object)[
                    'name' => 'Guru Pengajar',
                    'link' => NULL
                ]
            ]
        );

        $this->load->view('templates/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/pengajar', $data);
        $this->load->view('templates/footer');
    }

    function get_result_pengajar()
    {
        $list = $this->Pengajar_model->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $item->nama;
            $row[] = $item->jabatan;
            $row[] = $item->nama_mapel;
            $row[] = $item->level;
            $row[] = $item->kelas;
            $row[] = $item->tahun;
            $row[] = $item->semester;
            $row[] = anchor('admin/pengajar/edit/' . $item->id_pengajar, '<div class="btn btn-sm btn-primary btn-xs mr-1 ml-1 mb-1"><i class="fa fa-edit"></i></div>')
                . '<a href="javascript:;" onclick="confirmDelete(' . $item->id_pengajar . ')" class="btn btn-sm btn-danger btn-xs mr-1 ml-1 mb-1"><i class="fa fa-trash"></i></a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Pengajar_model->count_all(),
            "recordsFiltered" => $this->Pengajar_model->count_filtered(),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function input()
    {

        $data = $this->User_model->get_detail_admin($this->session->userdata['id_user'], $this->session->userdata['level']);
        $data = array(
            'id_user'   => $data['id_user'],
            'nama'      => $data['nama'],
            'photo'     => $data['photo'] != null ? $data['photo'] : 'user-placeholder.jpg',
            'level'     => $data['level'],
            'guru'      => $this->Guru_model->get_data(),
            'mapel'     => $this->Mapel_model->get_data(),
            'kelas'     => $this->Kelas_model->get_data(),
            'tahun'     => $this->Tahun_model->get_active_stats(),
            'menu'      => 'pengajar',
            'breadcrumb' => [
                0 => (object)[
                    'name' => 'Dashboard',
                    'link' => 'admin'
                ],
                1 => (object)[
                    'name' => 'Guru Pengajar',
                    'link' => 'admin/pengajar'
                ],
                2 => (object)[
                    'name' => 'Input',
                    'link' => NULL
                ]
            ]
        );

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('admin/pengajar_input', $data);
            $this->load->view('templates/footer');
        } else {
            $id_tahun = $data['tahun']['id_tahun'];
            $this->Pengajar_model->input_data($id_tahun);
            $this->session->set_flashdata('message', 'Data Pengajar Berhasil Ditambahkan!');
            redirect('admin/pengajar');
        }
    }

    public function get_kelas()
    {
        $id_guru   = $this->input->post('id_guru', TRUE);
        $guru      = $this->Guru_model->get_detail_data($id_guru);
        $kelas     = $this->Kelas_model->get_kelas_with_name($guru['nama']);
        $kelas_other = $this->Kelas_model->get_data();
        // $mapel      = $this->Mapel_model->get_detail_data($id_guru);
        // $kelas      = $this->Kelas_model->get_like_data($mapel['level']);
        if ($kelas) {
            echo '<option value="">--Pilih Kelas--</option>';
            foreach ($kelas as $kl) {
                echo '<option value="' . $kl->id_kelas . '">' . $kl->kelas . '</option>';
            }
        } else {
            echo '<option value="">--Pilih Kelas--</option>';
            foreach ($kelas_other as $kl) {
                echo '<option value="' . $kl->id_kelas . '">' . $kl->kelas . '</option>';
            }
        }
    }

    public function edit()
    {
        $id           = $this->uri->segment(4);
        if (!$id) {
            redirect('admin/pengajar');
        }

        $tahun = $this->Tahun_model->get_detail_data($this->Pengajar_model->get_detail_data($id)['id_tahun']);
        if (!isset($tahun)) {
            redirect('error_404');
        }

        $data = $this->User_model->get_detail_admin($this->session->userdata['id_user'], $this->session->userdata['level']);
        $data = array(
            'id_user'   => $data['id_user'],
            'nama'      => $data['nama'],
            'photo'     => $data['photo'] != null ? $data['photo'] : 'user-placeholder.jpg',
            'level'     => $data['level'],
            'guru'      => $this->Guru_model->get_data(),
            'mapel'     => $this->Mapel_model->get_data(),
            'kelas'     => $this->Kelas_model->get_data(),
            'tahun'     => $tahun,
            'pengajar'  => $this->Pengajar_model->get_detail_data($id),
            'jabatan'   => ['Kepala MDA Asy - Syifa', 'Sekretaris', 'Bendahara', 'Guru'],
            'menu'      => 'pengajar',
            'breadcrumb' => [
                0 => (object)[
                    'name' => 'Dashboard',
                    'link' => 'admin'
                ],
                1 => (object)[
                    'name' => 'Guru Pengajar',
                    'link' => 'admin/pengajar'
                ],
                2 => (object)[
                    'name' => 'Edit',
                    'link' => NULL
                ]
            ]
        );

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('admin/pengajar_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Pengajar_model->edit_data($id);
            $this->session->set_flashdata('message', 'Data Pengajar Berhasil Diupdate!');
            redirect('admin/pengajar');
        }
    }

    public function delete()
    {
        $id           = $this->uri->segment(4);
        $this->Pengajar_model->delete_data($id);
        $this->session->set_flashdata('message', 'Data Pengajar Berhasil Dihapus!');
        redirect('admin/pengajar');
    }

    private function _rules()
    {
        $this->form_validation->set_rules('guru', 'Guru', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('mapel[]', 'Kompetensi Dasar', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
    }
}
