<?php
class PesertaDidik extends CI_Controller
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
            'tahun'     => $this->Tahun_model->get_active_stats(),
            'kelas'     => $this->Kelas_model->get_data(),
            'menu'      => 'peserta',
            'breadcrumb' => [
                0 => (object)[
                    'name' => 'Dashboard',
                    'link' => 'admin'
                ],
                1 => (object)[
                    'name' => 'Peserta Didik',
                    'link' => NULL
                ]
            ]
        );

        $this->load->view('templates/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/peserta', $data);
        $this->load->view('templates/footer');
    }

    public function input()
    {

        $gettahun= $this->Tahun_model->get_active_stats();
        $data = $this->User_model->get_detail_admin($this->session->userdata['id_user'], $this->session->userdata['level']);
        $data = array(
            'id_user'   => $data['id_user'],
            'nama'      => $data['nama'],
            'photo'     => $data['photo'] != null ? $data['photo'] : 'user-placeholder.jpg',
            'level'     => $data['level'],
            'tahun'     => $gettahun,
            'kelas'     => $this->Kelas_model->get_data(),
            'siswa'     => $this->Siswa_model->get_data_tahun($gettahun['nama']),
            'menu'      => 'peserta',
            'breadcrumb' => [
                0 => (object)[
                    'name' => 'Dashboard',
                    'link' => 'admin'
                ],
                1 => (object)[
                    'name' => 'Peserta Didik',
                    'link' => 'admin/pesertadidik'
                ],
                2 => (object)[
                    'name' => 'Input',
                    'link' => NULL
                ]
            ]
        );

        $this->_rules_input();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('admin/peserta_input', $data);
            $this->load->view('templates/footer');
        } else {
            $tahun = $data['tahun']['nama'];
            $this->Peserta_model->input_data($tahun);
            $this->session->set_flashdata('message', 'Data Peserta Didik Berhasil Ditambahkan!');
            redirect('admin/pesertadidik');
        }
    }

    public function data_peserta()
    {
        $id_kelas       = $this->input->post('id_kelas', TRUE);
        $tahun          = $this->input->post('tahun', TRUE);
        $data_peserta   = $this->Peserta_model->get_data_kelas($id_kelas, $tahun);
        $html       = "";
        if ($data_peserta) {
            $html = $html . '
            <div class="card">
                <div class="card-body">
                    <table class="table table-responsive-sm table-bordered table-striped table-sm w-100 d-block d-md-table" id="table-peserta">
                        <thead>
                            <tr>
                                <th class="text-center" style="vertical-align : middle;text-align:center;" width="20px">No</th>
                                <th style="vertical-align : middle;text-align:center;">NIS</th>
                                <th style="vertical-align : middle;text-align:center;">NISN</th>
                                <th style="vertical-align : middle;text-align:center;">Nama</th>
                                <th style="vertical-align : middle;text-align:center;">Jenis Kelamin</th>
                                <th style="vertical-align : middle;text-align:center;">Agama</th>
                                <th class="text-center" width="80px" style="vertical-align : middle;text-align:center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>';
            foreach ($data_peserta as $key => $value) {
                $html = $html . '<tr>
                                <td class="text-center" style="vertical-align : middle;text-align:center;" widtd="20px">' . ++$key . '</td>
                                <td style="vertical-align : middle;text-align:center;">' . $value->nis . '</td>
                                <td style="vertical-align : middle;text-align:center;">' . $value->nisn . '</td>
                                <td style="vertical-align : middle;text-align:left;">' . $value->nama . '</td>
                                <td style="vertical-align : middle;text-align:center;">' . $value->jenis_kelamin . '</td>
                                <td style="vertical-align : middle;text-align:center;">' . $value->agama . '</td>
                                <td class="text-center" width="80px" style="vertical-align : middle;text-align:center;"><a href="javascript:;" id="data-siswa" data-idsiswa="' . $value->id_datasiswa . '" class="btn btn-sm btn-danger btn-delete-guru btn-xs mr-1 ml-1 mb-1"><i class="fa fa-trash"></i></a></td>
                            </tr>';
            }

            $html = $html . '                    
                        </tbody>
                    </table>
                </div>
            </div>';
        } else {
            $html = $html . '<div class="card">
                                <div class="card-body">
                                    <h6 class="text-center">Data Peserta Didik Belum Tersedia</h6>
                                </div>
                            </div>';
        }

        echo $html;
    }

    public function updatekelas()
    {
        $data = $this->User_model->get_detail_admin($this->session->userdata['id_user'], $this->session->userdata['level']);
        $data = array(
            'id_user'   => $data['id_user'],
            'nama'      => $data['nama'],
            'photo'     => $data['photo'] != null ? $data['photo'] : 'user-placeholder.jpg',
            'level'     => $data['level'],
            'tahun'     => $this->Tahun_model->get_active_stats(),
            'nama_tahun' => $this->Tahun_model->get_name_data(),
            'kelas'     => $this->Kelas_model->get_data(),
            'siswa'     => $this->Siswa_model->get_data(),
            'menu'      => 'peserta',
            'breadcrumb' => [
                0 => (object)[
                    'name' => 'Dashboard',
                    'link' => 'admin'
                ],
                1 => (object)[
                    'name' => 'Peserta Didik',
                    'link' => 'admin/pesertadidik'
                ],
                2 => (object)[
                    'name' => 'Update Kelas',
                    'link' => NULL
                ]
            ]
        );

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('admin/peserta_update', $data);
            $this->load->view('templates/footer');
        } else {
            $oldtahun = $this->input->post('oldtahun', TRUE);
            $newtahun = $this->input->post('newtahun', TRUE);
            if ($oldtahun == $newtahun) {
                $this->session->set_flashdata('message', 'Tidak Bisa Menambahkan Data, Karena Tahun Ajaran Sama!');
                redirect('admin/pesertadidik/updatekelas');
            } else {
                $this->Peserta_model->update_kelas();
                $this->session->set_flashdata('message', 'Data Peserta Didik Berhasil Diupdate!');
                redirect('admin/pesertadidik');
            }
        }
    }

    public function previewold()
    {
        $id_kelas       = $this->input->post('id_kelas', TRUE);
        $tahun          = $this->input->post('tahun', TRUE);
        $data_peserta   = $this->Peserta_model->get_data_kelas($id_kelas, $tahun);
        $kelas          = $this->Kelas_model->get_detail_data($id_kelas);
        $html = "";
        $html = $html . '<label class="col-form-label" for="old-daftar">Daftar Peserta Didik Lama Kelas ' . $kelas['kelas'] . '</label>
                        <div class="">
                            <select class="form-control" id="old-daftar" name="old-daftar" size="20" multiple="">
                                <option value="">NIS - NISN - Nama Siswa</option>';
        if ($data_peserta) {
            foreach ($data_peserta as $dp) {
                $html = $html . '<option value="">' . $dp->nis . '-' . $dp->nisn . '-' . $dp->nama . '</option>';
            }
        }

        $html = $html . '</select></div>';
        echo $html;
    }

    public function previewnew()
    {
        $id_kelas       = $this->input->post('id_kelas', TRUE);
        $tahun          = $this->input->post('tahun', TRUE);
        $data_peserta   = $this->Peserta_model->get_data_kelas($id_kelas, $tahun);
        $kelas          = $this->Kelas_model->get_detail_data($id_kelas);
        $html = "";
        $html = $html . '<label class="col-form-label" for="new-daftar">Daftar Peserta Didik Baru Kelas ' . $kelas['kelas'] . ' - ' . $tahun . '</label>
                        <div class="">
                            <select class="form-control" id="new-daftar" name="new-daftar" size="20" multiple="">
                                <option value="">NIS - NISN - Nama Siswa</option>';
        if ($data_peserta) {
            foreach ($data_peserta as $dp) {
                $html = $html . '<option value="">' . $dp->nis . '-' . $dp->nisn . '-' . $dp->nama . '</option>';
            }
        }

        $html = $html . '</select></div>';
        echo $html;
    }

    public function delete($id)
    {
        $this->Peserta_model->delete_data($id);
        $this->session->set_flashdata('message', 'Data Siswa Berhasil Dihapus!');
        redirect('admin/pesertadidik');
    }

    private function _rules()
    {
        $this->form_validation->set_rules('oldtahun', 'Tahun Ajaran Lama', 'required');
        $this->form_validation->set_rules('newtahun', 'Tahun Ajaran Baru', 'required');
        $this->form_validation->set_rules('oldkelas', 'Kelas', 'required');
        $this->form_validation->set_rules('newkelas', 'Kelas', 'required');
    }

    private function _rules_input()
    {
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('siswa[]', 'Siswa', 'required');
    }
}
