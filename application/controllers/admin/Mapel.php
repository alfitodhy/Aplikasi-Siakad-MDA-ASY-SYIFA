<?php
class Mapel extends CI_Controller
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
            'menu'      => 'mata pelajaran',
            'breadcrumb' => [
                0 => (object)[
                    'name' => 'Dashboard',
                    'link' => 'admin'
                ],
                1 => (object)[
                    'name' => 'Mata Pelajaran',
                    'link' => NULL
                ]
            ]
        );

        $this->load->view('templates/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/mapel', $data);
        $this->load->view('templates/footer');
    }

    function get_result_mapel()
    {
        $list = $this->Mapel_model->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $item->nama_mapel;
            $row[] = $item->level;
            $row[] = anchor('admin/mapel/kd?id_mapel=' . $item->id_mapel, '<div class="btn btn-sm btn-info btn-xs mr-1 ml-1 mb-1"><i class="fa fa-edit"></i> <strong>KD</strong></div>') .
                anchor('admin/mapel/edit/' . $item->id_mapel, '<div class="btn btn-sm btn-primary btn-xs mr-1 ml-1 mb-1"><i class="fa fa-edit"></i></div>')
                . '<a href="javascript:;" onclick="confirmDelete(' . $item->id_mapel . ')" class="btn btn-sm btn-danger btn-xs mr-1 ml-1 mb-1"><i class="fa fa-trash"></i></a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Mapel_model->count_all(),
            "recordsFiltered" => $this->Mapel_model->count_filtered(),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function kd()
    {
        $id   = $this->input->get('id_mapel', TRUE);
        if (!$id) {
            redirect('admin/mapel');
        }

        $mapel = $this->Mapel_model->get_detail_data($id);
        if (!isset($mapel)) {
            redirect('error_404');
        }

        $data = $this->User_model->get_detail_admin($this->session->userdata['id_user'], $this->session->userdata['level']);
        $data = array(
            'id_user'   => $data['id_user'],
            'nama'      => $data['nama'],
            'photo'     => $data['photo'] != null ? $data['photo'] : 'user-placeholder.jpg',
            'level'     => $data['level'],
            'mapel'     => $mapel,
            'komp_dasar' => $this->Mapel_model->get_kd_permapel($id),
            'menu'      => 'mata pelajaran',
            'breadcrumb' => [
                0 => (object)[
                    'name' => 'Dashboard',
                    'link' => 'admin'
                ],
                1 => (object)[
                    'name' => 'Mata Pelajaran',
                    'link' => 'admin/mapel'
                ],
                2 => (object)[
                    'name' => 'Kompetensi Dasar',
                    'link' => NULL
                ]
            ]
        );

        $this->_rules_kd();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('admin/mapel_kd', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Mapel_model->input_kd_inmapel($id);
            $this->session->set_flashdata('message', 'Data Kompetensi Dasar Berhasil Ditambahkan!');
            redirect('admin/mapel/kd?id_mapel=' . $id);
        }
    }



    public function input()
    {
        $data = $this->User_model->get_detail_admin($this->session->userdata['id_user'], $this->session->userdata['level']);
        $data = array(
            'id_user'   => $data['id_user'],
            'nama'      => $data['nama'],
            'photo'         => $data['photo'] != null ? $data['photo'] : 'user-placeholder.jpg',
            'level'     => $data['level'],
            'menu'      => 'mata pelajaran',
            'breadcrumb' => [
                0 => (object)[
                    'name' => 'Dashboard',
                    'link' => 'admin'
                ],
                1 => (object)[
                    'name' => 'Mata Pelajaran',
                    'link' => 'admin/mapel'
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
            $this->load->view('admin/mapel_input', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Mapel_model->input_data();
            $this->session->set_flashdata('message', 'Data Mata Pelajaran Berhasil Ditambahkan!');
            redirect('admin/mapel');
        }
    }

    public function edit()
    {
        $id           = $this->uri->segment(4);
        if (!$id) {
            redirect('admin/mapel');
        }

        $mapel = $this->Mapel_model->get_detail_data($id);
        if (!isset($mapel)) {
            redirect('error_404');
        }

        $data = $this->User_model->get_detail_admin($this->session->userdata['id_user'], $this->session->userdata['level']);
        $data = array(
            'id_user'   => $data['id_user'],
            'nama'      => $data['nama'],
            'photo'         => $data['photo'] != null ? $data['photo'] : 'user-placeholder.jpg',
            'level'     => $data['level'],
            'mapel'     => $mapel,
            'levels'    => [1, 2, 3, 4, 5, 6],
            'menu'      => 'mata pelajaran',
            'breadcrumb' => [
                0 => (object)[
                    'name' => 'Dashboard',
                    'link' => 'admin'
                ],
                1 => (object)[
                    'name' => 'Mata Pelajaran',
                    'link' => 'admin/mapel'
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
            $this->load->view('admin/mapel_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Mapel_model->edit_data($id);
            $this->session->set_flashdata('message', 'Data Kelas Berhasil Diupdate!');
            redirect('admin/mapel');
        }
    }

    public function delete()
    {
        $id           = $this->uri->segment(4);
        $this->Mapel_model->delete_data($id);
        $this->session->set_flashdata('message', 'Data Mata Pelajaran Berhasil Dihapus!');
        redirect('admin/mapel');
    }

    public function delete_kd()
    {
        $kd      = $this->input->get('kd', TRUE);
        $id_mapel   = $this->input->get('id_mapel', TRUE);

        $this->Mapel_model->delete_kd($kd, $id_mapel);
        $this->session->set_flashdata('message', 'Data Kompetensi Dasar Berhasil Dihapus!');
        redirect('admin/mapel/kd?id_mapel=' . $id_mapel);
    }

    private function _rules()
    {
        $this->form_validation->set_rules('nama_mapel', 'Nama Mata Pelajaran', 'required|max_length[100]');
        $this->form_validation->set_rules('level', 'Level', 'required');
    }

    private function _rules_kd()
    {
        $this->form_validation->set_rules('kd[]', 'Kompetensi Dasar', 'required');
    }
}
