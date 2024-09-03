<?php

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->output->set_header('Cache-Control: no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
        $this->output->set_header('Pragma: no-cache');

        if (!isset($this->session->userdata['username']) || $this->session->userdata['level'] != 'admin') {
            $this->session->set_flashdata('message', 'Anda Belum Login!');
            redirect('login');
        }

        // if ($this->session->userdata['level'] != 'admin') {
        //     $this->session->set_flashdata('message', 'Anda Belum Login!');
        //     redirect('login');
        // }
    }

    public function index()
    {
        $data = $this->User_model->get_detail_admin($this->session->userdata['id_user'], $this->session->userdata['level']);
        $data = array(
            'id_user'       => $data['id_user'],
            'nama'          => $data['nama'],
            'photo'         => $data['photo'] != null ? $data['photo'] : 'user-placeholder.jpg',
            'level'         => $data['level'],
            'count_admin'   => $this->User_model->count_user('admin'),
            'count_guru'    => $this->User_model->count_user('guru', 'wali kelas'),
            'count_wali'    => $this->User_model->count_user('wali kelas'),
            'count_siswa'   => $this->User_model->count_user('siswa'),
            'menu'          => 'user',
            'breadcrumb'    => [
                0 => (object)[
                    'name' => 'Dashboard',
                    'link' => 'admin'
                ],
                1 => (object)[
                    'name' => 'Users',
                    'link' => NULL
                ]
            ]
        );

        $this->load->view('templates/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/user', $data);
        $this->load->view('templates/footer');
    }

    public function detail()
    {
        $id      = $this->uri->segment(4);

        if ($id < '1' || $id > '4') {
            redirect('admin/user');
        }

        $level      = $id == 1 ? 'admin' : ($id == 2 ? 'guru' : ($id == 3 ? 'wali kelas' : ($id == 4 ? 'siswa' : null)));
        $data       = $this->User_model->get_detail_admin($this->session->userdata['id_user'], $this->session->userdata['level']);
        $get_list   = ($id == 2) ? $this->User_model->get_user($data['level'], 'wali kelas') : $this->User_model->get_user($data['level']);
        $data       = array(
            'id_user'       => $data['id_user'],
            'nama'          => $data['nama'],
            'photo'         => $data['photo'] != null ? $data['photo'] : 'user-placeholder.jpg',
            'level'         => $data['level'],
            'id'            => $id,
            'levels'        => $level,
            'user'          => $get_list,
            'menu'          => 'user',
            'breadcrumb'    => [
                0 => (object)[
                    'name' => 'Dashboard',
                    'link' => 'admin'
                ],
                1 => (object)[
                    'name' => 'Users',
                    'link' => 'admin/user'
                ],
                2 => (object)[
                    'name' => $level,
                    'link' => NULL
                ]
            ]
        );

        $this->load->view('templates/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/user_detail', $data);
        $this->load->view('templates/footer');
    }

    function get_result_user($id)
    {
        $level          = $id == 1 ? 'admin' : ($id == 2 ? 'guru' : ($id == 3 ? 'wali kelas' : ($id == 4 ? 'siswa' : null)));
        $list           = ($id == 2) ?  $this->User_model->get_datatables($level, 'wali kelas') : $this->User_model->get_datatables($level);
        $count_all      = ($id == 2) ?  $this->User_model->count_all($level, 'wali kelas') : $this->User_model->count_all($level);
        $count_filter   = ($id == 2) ?  $this->User_model->count_filtered($level, 'wali kelas') : $this->User_model->count_filtered($level);
        $data           = array();
        $no             = @$_POST['start'];
        foreach ($list as $item) {
            $dataAdmin  = $level == 'admin' ? $this->User_model->get_detail_admin($item->id_user, $level) : NULL;
            $isDelete   = ($level == 'admin' && $no != 0) ? '<a href="javascript:;" onclick="confirmDelete(' . $item->id_user . ')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>' : '';
            $isDetail   = $level == 'admin' ? '<div id="set_detailModal" class="btn btn-sm btn-info mr-1 ml-1 mb-1" data-toggle="modal" data-target="#detailModal" data-level="' . $level . '" data-idadmin="' . $item->id_user . '" data-nip="' . $dataAdmin['nip'] . '" data-nama="' . $dataAdmin['nama'] . '" data-jeniskelamin="' . $dataAdmin['jenis_kelamin'] . '"data-tanggallahir="' . $dataAdmin['tanggal_lahir'] . '" data-nohp="' . $dataAdmin['no_hp'] . '" data-email="' . $dataAdmin['email'] . '"  data-alamat="' . $dataAdmin['alamat'] . '" data-photo="' . $dataAdmin['photo'] . '"><i class="fa fa-eye"></i></div>' : '';
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $item->nama;
            $row[] = $item->username;
            $row[] = $item->level;
            $row[] = ($item->status == 1) ? '<strong class="badge badge-success">aktif</strong>' : '<strong class="badge badge-danger">tidak aktif</strong>';
            $row[] = $isDetail
                . anchor(
                    'admin/user/edit/' . $item->level . '/' . $item->id_user,
                    '<div class="btn btn-sm btn-primary mr-1 ml-1 mb-1"><i class="fa fa-edit"></i></div>'
                )
                . anchor(
                    'admin/user/change_password?level=' . $item->level . '&id=' . $item->id_user,
                    '<div class="btn btn-sm btn-success  mr-1 ml-1 mb-1"><i class="fa fa-lock"></i></div>'
                ) . $isDelete;
            $data[] = $row;
        }

        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $count_all,
            "recordsFiltered" => $count_filter,
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function input()
    {
        $data = $this->User_model->get_detail_admin($this->session->userdata['id_user'], $this->session->userdata['level']);
        $data = array(
            'id_user'       => $data['id_user'],
            'nama'          => $data['nama'],
            'photo'         => $data['photo'] != null ? $data['photo'] : 'user-placeholder.jpg',
            'level'         => $data['level'],
            'menu'          => 'user',
            'breadcrumb'    => [
                0 => (object)[
                    'name' => 'Dashboard',
                    'link' => 'admin'
                ],
                1 => (object)[
                    'name' => 'Users',
                    'link' => 'admin/user'
                ],
                2 => (object)[
                    'name' => 'admin',
                    'link' => 'admin/user/detail/1'
                ],
                3 => (object)[
                    'name' => 'input',
                    'link' => NULL
                ],
            ]
        );

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('admin/user_input', $data);
            $this->load->view('templates/footer');
        } else {
            $cek = $this->User_model->cek_user();
            if ($cek == 0) {
                $config['upload_path']          = './assets/photos/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 5000;
                $config['file_name']            = 'photo-admin-' . $this->input->post('tanggal_lahir', TRUE) . '-' . substr(md5(rand()), 0, 10);
                $this->upload->initialize($config);

                if (@$_FILES['photo']['name'] != null) {

                    if ($this->upload->do_upload('photo')) {
                        $gbr = $this->upload->data();
                        //Compress Image
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './assets/photos/' . $gbr['file_name'];
                        $config['create_thumb'] = FALSE;
                        $config['maintain_ratio'] = FALSE;
                        $config['quality'] = '50%';
                        $config['width'] = 400;
                        $config['height'] = 600;
                        $config['new_image'] = './assets/photos/' . $gbr['file_name'];
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();

                        $photo = $gbr['file_name'];
                        $this->User_model->input_data($photo);
                        $this->session->set_flashdata('message', 'Data Admin Berhasil Ditambahkan!');
                        redirect('admin/user/detail/1');
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('message_error', $error);
                        redirect('admin/user/input');
                    }
                } else {
                    $photo = NULL;
                    $this->User_model->input_data($photo);
                    $this->session->set_flashdata('message', 'Data Admin Berhasil Ditambahkan!');
                    redirect('admin/user/detail/1');
                }
            } else {
                $this->session->set_flashdata('message_error', 'Username telah ada');
                redirect('admin/user/input');
            }
        }
    }

    public function edit()
    {
        $level  = urldecode($this->uri->segment(4));
        $id     = $this->uri->segment(5);
        $detail = $level == 'admin' ? '1' : ($level == 'guru' ? '2' : ($level == 'wali kelas' ? '3' : ($level == 'siswa' ? '4' : NULL)));

        $data   = $this->User_model->get_detail_admin($this->session->userdata['id_user'], $this->session->userdata['level']);
        $data   = array(
            'id_user'       => $data['id_user'],
            'nama'          => $data['nama'],
            'photo'         => $data['photo'] != null ? $data['photo'] : 'user-placeholder.jpg',
            'level'         => $data['level'],
            'levels'        => $level,
            'status'        => ['0', '1'],
            'jenis_kelamin' => ['Laki-laki', 'Perempuan'],
            'menu'          => 'user',
            'breadcrumb'    => [
                0 => (object)[
                    'name' => 'Dashboard',
                    'link' => 'admin'
                ],
                1 => (object)[
                    'name' => 'Users',
                    'link' => 'admin/user'
                ],
                2 => (object)[
                    'name' => $level,
                    'link' => 'admin/user/detail/' . $detail
                ],
                3 => (object)[
                    'name' => 'edit',
                    'link' => NULL
                ],
            ]
        );

        if ($level == 'admin') {
            $admin  = $this->User_model->get_detail_admin($id, $level);

            if (!isset($admin)) {
                redirect('error_404');
            }

            $data['admin'] = $admin;

            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('templates/header');
                $this->load->view('templates_admin/sidebar', $data);
                $this->load->view('admin/user_admin', $data);
                $this->load->view('templates/footer');
            } else {
                $config['upload_path']          = './assets/photos/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 5000;
                $config['file_name']            = 'photo-admin-' . $this->input->post('tanggal_lahir', TRUE) . '-' . substr(md5(rand()), 0, 10);
                $this->upload->initialize($config);

                if (@$_FILES['photo']['name'] != null) {

                    if ($this->upload->do_upload('photo')) {

                        $item = $this->User_model->get_detail_admin($id, $level);
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
                        $config['quality'] = '50%';
                        $config['width'] = 400;
                        $config['height'] = 600;
                        $config['new_image'] = './assets/photos/' . $gbr['file_name'];
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();

                        $photo = $gbr['file_name'];
                        $this->User_model->edit_admin($id, $photo);
                        $this->session->set_flashdata('message', 'Data Berhasil Diupdate!');
                        redirect('admin/user/detail/' . $detail);
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('message_error', $error);
                        redirect('admin/user/input');
                    }
                } else {
                    $photo = NULL;
                    $this->User_model->edit_admin($id, $photo);
                    $this->session->set_flashdata('message', 'Data Berhasil Diupdate!');
                    redirect('admin/user/detail/' . $detail);
                }
            }
        } else {

            $user  = $this->User_model->get_detail_user($id, $level);

            if (!isset($user)) {
                redirect('error_404');
            }

            $data['user'] = $user;

            $this->_rules_data();

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('templates/header');
                $this->load->view('templates_admin/sidebar', $data);
                $this->load->view('admin/user_edit', $data);
                $this->load->view('templates/footer');
            } else {
                $this->User_model->edit_data($id);
                $this->session->set_flashdata('message', 'Data Berhasil Diupdate!');
                redirect('admin/user/detail/' . $detail);
            }
        }
    }

    public function change_password()
    {
        $id     = $this->input->get('id', TRUE);
        $level  = $this->input->get('level', TRUE);
        $detail = $level == 'admin' ? '1' : ($level == 'guru' ? '2' : ($level == 'wali kelas' ? '3' : ($level == 'siswa' ? '4' : NULL)));
        $data   = $this->User_model->get_detail_admin($this->session->userdata['id_user'], $this->session->userdata['level']);
        $data   = array(
            'id_user'       => $data['id_user'],
            'nama'          => $data['nama'],
            'photo'         => $data['photo'] != null ? $data['photo'] : 'user-placeholder.jpg',
            'level'         => $data['level'],
            'user_id'       => $id,
            'user_level'    => $level,
            'menu'          => 'user',
            'breadcrumb'    => [
                0 => (object)[
                    'name' => 'Dashboard',
                    'link' => 'admin'
                ],
                1 => (object)[
                    'name' => 'Users',
                    'link' => 'admin/user'
                ],
                2 => (object)[
                    'name' => $level,
                    'link' => 'admin/user/detail/' . $detail
                ],
                3 => (object)[
                    'name' => 'password',
                    'link' => NULL
                ],
            ]
        );

        $this->_rules_password();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('admin/user_password', $data);
            $this->load->view('templates/footer');
        } else {
            $this->User_model->edit_password($id);
            $this->session->set_flashdata('message', 'Password Berhasil Diupdate!');
            redirect('admin/user/detail/' . $detail);
        }
    }

    public function resetpass()
    {
        $id     = $this->input->get('id', TRUE);
        $level  = $this->input->get('level', TRUE);
        $detail = $level == 'admin' ? '1' : ($level == 'guru' ? '2' : ($level == 'wali kelas' ? '3' : ($level == 'siswa' ? '4' : NULL)));
        if ($level == 'admin') {
            $data = $this->User_model->get_detail_admin($id, $level);
            $this->User_model->reset_password($id, $data['tanggal_lahir']);
            $this->session->set_flashdata('message', 'Password Berhasil Direset!');
            redirect('admin/user/detail/' . $detail);
        } elseif ($level == 'wali kelas') {
            $data = $this->User_model->get_detail_guru($id, $level);
            $this->User_model->reset_password($id, $data['tanggal_lahir']);
            $this->session->set_flashdata('message', 'Password Berhasil Direset!');
            redirect('admin/user/detail/' . $detail);
        } elseif ($level == 'guru') {
            $data = $this->User_model->get_detail_guru($id, $level);
            $this->User_model->reset_password($id, $data['tanggal_lahir']);
            $this->session->set_flashdata('message', 'Password Berhasil Direset!');
            redirect('admin/user/detail/' . $detail);
        } elseif ($level == 'siswa') {
            $data = $this->User_model->get_detail_siswa($id, $level);
            $this->User_model->reset_password($id, $data['tanggal_lahir']);
            $this->session->set_flashdata('message', 'Password Berhasil Direset!');
            redirect('admin/user/detail/' . $detail);
        } else {
            redirect('error_404');
        }
    }

    public function delete()
    {
        $level      = $this->uri->segment(4);
        $id         = $this->uri->segment(5);
        $detail     = $level == 'admin' ? '1' : ($level == 'guru' ? '2' : ($level == 'wali kelas' ? '3' : ($level == 'siswa' ? '4' : NULL)));

        $item = $this->User_model->get_detail_admin($id, $level);
        if ($item['photo'] != null) {
            $target_delete = './assets/photos/' . $item['photo'];
            unlink($target_delete);
        }

        $this->User_model->delete_data($id);
        $this->session->set_flashdata('message', 'Data User Berhasil Dihapus!');
        redirect('admin/user/detail/' . $detail);
    }

    private function _rules()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[6]|max_length[100]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[50]');
        $this->form_validation->set_rules('konfirmasi', 'Konfirmasi Password', "required|min_length[6]|matches[password]|max_length[50]");
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required|max_length[20]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|max_length[100]');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('no_hp', 'No Handphone', 'required|numeric|min_length[10]|max_length[15]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[100]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|max_length[100]');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal lahir', 'required');
    }

    private function _rules_data()
    {
        $this->form_validation->set_rules('status', 'status', 'required');
    }

    private function _rules_password()
    {
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[50]');
        $this->form_validation->set_rules('konfirmasi', 'Konfirmasi Password', "required|min_length[6]|matches[password]|max_length[50]");
    }
}
