<?php
class Guru extends CI_Controller
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
            'menu'      => 'guru',
            'breadcrumb' => [
                0 => (object)[
                    'name' => 'Dashboard',
                    'link' => 'admin'
                ],
                1 => (object)[
                    'name' => 'Guru',
                    'link' => NULL
                ]
            ]
        );

        $this->load->view('templates/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/guru', $data);
        $this->load->view('templates/footer');
    }

    function get_result_guru()
    {
        $list = $this->Guru_model->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $photo = $item->photo != null ? $item->photo : 'user-placeholder.jpg';
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $item->nip;
            $row[] = $item->nama;
            $row[] = $item->jenis_kelamin;
            $row[] = $item->tanggal_lahir;
            $row[] = $item->no_hp;
            $row[] = $item->email;
            $row[] = '<img src="' . base_url('assets/photos/' . $photo) . ' " alt="photo ' . $item->nama . '" style="max-width:100px; max-height:150px; object-fit: scale-down; object-position: center; border-radius: 10px;">';
            $row[] = $item->alamat;
            $row[] = anchor('admin/guru/edit/' . $item->id_guru, '<div class="btn btn-sm btn-primary btn-xs mr-1 ml-1 mb-1"><i class="fa fa-edit"></i></div>')
                . '<a href="javascript:;" onclick="confirmDelete(' . $item->id_guru . ')" class="btn btn-sm btn-danger btn-delete-guru btn-xs mr-1 ml-1 mb-1"><i class="fa fa-trash"></i></a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Guru_model->count_all(),
            "recordsFiltered" => $this->Guru_model->count_filtered(),
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
            'menu'      => 'guru',
            'breadcrumb' => [
                0 => (object)[
                    'name' => 'Dashboard',
                    'link' => 'admin'
                ],
                1 => (object)[
                    'name' => 'Guru',
                    'link' => 'admin/guru'
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
            $this->load->view('admin/guru_input');
            $this->load->view('templates/footer');
        } else {
            $config['upload_path']          = './assets/photos/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 5000;
            $config['file_name']            = 'photo-guru-' . $this->input->post('tanggal_lahir', TRUE) . '-' . substr(md5(rand()), 0, 10);
            $this->upload->initialize($config);

            if (@$_FILES['photo']['name'] != null) {

                if ($this->upload->do_upload('photo')) {
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/photos/' . $gbr['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['width'] = 400;
                    $config['height'] = 600;
                    $config['quality'] = '50%';
                    $config['new_image'] = './assets/photos/' . $gbr['file_name'];
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();

                    $photo = $gbr['file_name'];
                    $this->Guru_model->input_data($photo);
                    $this->session->set_flashdata('message', 'Data Guru Berhasil Ditambahkan!');
                    redirect('admin/guru');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message_error', $error);
                    redirect('admin/guru/input');
                }
            } else {
                $photo = NULL;
                $this->Guru_model->input_data($photo);
                $this->session->set_flashdata('message', 'Data Guru Berhasil Ditambahkan!');
                redirect('admin/guru');
            }
        }
    }

    public function edit()
    {
        $id           = $this->uri->segment(4);
        if (!$id) {
            redirect('admin/guru');
        }

        $guru = $this->Guru_model->get_detail_data($id);
        if (!isset($guru)) {
            redirect('error_404');
        }

        $data = $this->User_model->get_detail_admin($this->session->userdata['id_user'], $this->session->userdata['level']);
        $data = array(
            'id_user'       => $data['id_user'],
            'nama'          => $data['nama'],
            'level'         => $data['level'],
            'photo'         => $data['photo'] != null ? $data['photo'] : 'user-placeholder.jpg',
            'guru'          => $guru,
            'jenis_kelamin' => ['Laki-laki', 'Perempuan'],
            'menu'          => 'guru',
            'breadcrumb'    => [
                0 => (object)[
                    'name' => 'Dashboard',
                    'link' => 'admin'
                ],
                1 => (object)[
                    'name' => 'Guru',
                    'link' => 'admin/guru'
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
            $this->load->view('admin/guru_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path']          = './assets/photos/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 5000;
            $config['file_name']            = 'photo-guru-' . $this->input->post('tanggal_lahir', TRUE) . '-' . substr(md5(rand()), 0, 10);
            $this->upload->initialize($config);

            if (@$_FILES['photo']['name'] != null) {

                if ($this->upload->do_upload('photo')) {
                    $item =  $this->Guru_model->get_detail_data($id);
                    if ($item['photo'] != null) {
                        $target_delete = './assets/photos/' . $item['photo'];
                        unlink($target_delete);
                    }

                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/photos/' . $gbr['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['width'] = 400;
                    $config['height'] = 600;
                    $config['quality'] = '50%';
                    $config['new_image'] = './assets/photos/' . $gbr['file_name'];
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();

                    $photo = $gbr['file_name'];
                    $this->Guru_model->edit_data($id, $photo, $data['guru']['nama']);
                    $this->session->set_flashdata('message', 'Data Guru Berhasil Diupdate!');
                    redirect('admin/guru');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message_error', $error);
                    redirect('admin/guru/input');
                }
            } else {
                $photo = NULL;
                $this->Guru_model->edit_data($id, $photo, $data['guru']['nama']);
                $this->session->set_flashdata('message', 'Data Guru Berhasil Diupdate!');
                redirect('admin/guru');
            }
        }
    }

    public function delete()
    {
        $id           = $this->uri->segment(4);
        $item         = $this->Guru_model->get_detail_data($id);
        if ($item['photo'] != null) {
            $target_delete = './assets/photos/' . $item['photo'];
            unlink($target_delete);
        }

        $this->User_model->delete_data($item['id_user']);
        $this->Kelas_model->delete_walikelas($item['nama']);
        $this->Guru_model->delete_data($id);
        $this->session->set_flashdata('message', 'Data Guru Berhasil Dihapus!');
        redirect('admin/guru');
    }

    function _rules()
    {
        $this->form_validation->set_rules('nip', 'NIP', 'required|max_length[20]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|max_length[100]');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('no_hp', 'No Handphone', 'required|numeric|min_length[10]|max_length[15]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[100]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|max_length[100]');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal lahir', 'required');
    }
}
