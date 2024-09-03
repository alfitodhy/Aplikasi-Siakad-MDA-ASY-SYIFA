<?php
class LaporanGuru extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!isset($this->session->userdata['username'])) {
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
            'tahun'     => $this->Tahun_model->get_data_groupname(),
            'menu'      => 'laporan_guru',
            'breadcrumb' => [
                0 => (object)[
                    'name' => 'Dashboard',
                    'link' => 'admin'
                ],
                1 => (object)[
                    'name' => 'Laporan Daftar Guru',
                    'link' => NULL
                ]
            ]
        );

        $this->load->view('templates/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/laporan_guru', $data);
        $this->load->view('templates/footer');
    }

    public function detail()
    {
        $id           = $this->uri->segment(4);
        if (!$id) {
            redirect('admin/laporanguru');
        }

        $data = $this->User_model->get_detail_admin($this->session->userdata['id_user'], $this->session->userdata['level']);
        $data = array(
            'id_user'   => $data['id_user'],
            'nama'      => $data['nama'],
            'photo'     => $data['photo'] != null ? $data['photo'] : 'user-placeholder.jpg',
            'guru'      => $this->Guru_model->get_detail_data($id),
            'data'      => $this->Laporan_model->get_detail_lap_guru($id),
            'id_guru'   => $id,
            'level'     => $data['level'],
            'tahun'     => $this->Tahun_model->get_data(),
            'menu'      => 'laporan_guru',
            'breadcrumb' => [
                0 => (object)[
                    'name' => 'Dashboard',
                    'link' => 'admin'
                ],
                1 => (object)[
                    'name' => 'Laporan Daftar Guru',
                    'link' => 'admin/laporanguru'
                ],
                2 => (object)[
                    'name' => 'Detail',
                    'link' => NULL
                ]
            ]
        );

        $this->load->view('templates/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/laporan_gurudetail', $data);
        $this->load->view('templates/footer');
    }

    public function data_all_guru()
    {
        $tahun   = $this->input->post('tahun', TRUE);
        $cek_data = $this->Laporan_model->cek_datatahun_guru($tahun);
        $id_tahun = ($cek_data->row_array()) ? $cek_data->row_array()['id_tahun'] : 'null';

        $tahun      = $this->Tahun_model->get_detail_data($id_tahun);
        $data_guru  = $this->Laporan_model->get_all_lap_guru($id_tahun);
        $html       = '';

        if ($cek_data->num_rows() > 0) {
            $html = $html . '
                <div class="card">
                    <div class="card-body">
                        <div>
                            <h1 class="h1 text-center">LAPORAN DAFTAR GURU</h1>
                            <h2 class="text-center">MADRASAH DINIYAH AWALIYAH (MDA) ASY - SYIFA</h2>
                            <h3 class="text-center">Tahun Ajaran ' . $tahun['nama'] . '</h3>
                        </div>
                        <a href="' . base_url('admin/laporanguru/excel_laporan?tahun=' . $tahun['nama']) . '" class="btn btn-success mb-2"><i class="fas fa-file-excel" aria-hidden="true" ></i> Print Excel</a>
                        <table class="table table-responsive-sm table-bordered table-striped table-sm w-100 d-block d-md-table" id="table-laporanguru">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jabatan</th>
                                    <th>Kelas Mengajar</th>
                                    <th>Alamat</th>
                                </tr>
                            </thead>
                            <tbody>';
            foreach ($data_guru as $key => $value) {
                $map_kelas = explode(',', $value->kelas);
                $uniqe_kelas = array_unique($map_kelas);
                sort($uniqe_kelas);
                $new_kelas = implode(', ', $uniqe_kelas);

                $html = $html . '<tr>
                    <td>' . ++$key . '</td>
                    <td>' . $value->nama . '</td>
                    <td>' . $value->nip . '</td>
                    <td>' . $value->jenis_kelamin . '</td>
                    <td>' . $value->tanggal_lahir . '</td>
                    <td>' . $value->jabatan . '</td>
                    <td>' . $new_kelas . '</td>
                    <td>' . $value->alamat . '</td>
                    </tr>';
            }

            $html = $html . "
                            </tbody>
                        </table>
                    </div>
                </div>";
        } else {
            $html = $html . '<div class="card">
                                <div class="card-body">
                                    <h6 class="text-center">Laporan Daftar Guru Tidak Tersedia, Silahkan Pilih Tahun Ajaran</h6>
                                </div>
                            </div>';
        }
        echo $html;
    }

    function get_result_guru()
    {
        $id_tahun = $this->input->post('id_tahun', TRUE);
        $list = $this->Laporan_model->get_datatables_guru($id_tahun);
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $map_kelas = explode(',', $item->kelas);
            $uniqe_kelas = array_unique($map_kelas);
            sort($uniqe_kelas);
            $new_kelas = implode(', ', $uniqe_kelas);
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $item->nama;
            $row[] = $item->nip;
            $row[] = $item->jenis_kelamin;
            $row[] = $item->tanggal_lahir;
            $row[] = $item->jabatan;
            $row[] = $new_kelas;
            $row[] = $item->alamat;

            // $row[] = anchor('admin/laporanguru/detail/' . $item->id_guru, '<div class="btn btn-sm btn-success mr-1 ml-1 mb-1 mt-1"><i class="fa fa-eye"></i></div>') .
            // '<a href="' . base_url('admin/laporanguru/pdf_laporan?q=detaildata&id=' . $item->id_guru) . '" class="btn btn-sm btn-info mr-1 ml-1 mb-1 mt-1"><i class="fa fa-print"></i></a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Laporan_model->count_all_guru($id_tahun),
            "recordsFiltered" => $this->Laporan_model->count_filtered_guru($id_tahun),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function pdf_laporan()
    {
        $query   = $this->input->get('q');
        $tahun   = $this->input->get('tahun');
        $id_guru = $this->input->get('id');

        if ($query == 'alldata') {
            $data['data']   = $this->Laporan_model->get_all_lap_guru($tahun);
            $data['tahun']  = $this->Tahun_model->get_detail_data($tahun);

            $this->mypdf->generate('pdf/laporan_allguru', $data, 'Laporan Data Guru', 'A4', 'landscape');
        } elseif ($query == 'detaildata') {
            $data = array(
                'guru'  => $this->Guru_model->get_detail_data($id_guru),
                'data'  => $this->Laporan_model->get_detail_lap_guru($id_guru)
            );

            $this->mypdf->generate('pdf/laporan_detailguru', $data, 'Laporan Data Guru', 'A4', 'portrait');
        }
    }

    public function excel_laporan()
    {
        $tahun      = $this->input->get('tahun');
        $cek_data   = $this->Laporan_model->cek_datatahun_guru($tahun);
        $id_tahun   = ($cek_data->row_array()) ? $cek_data->row_array()['id_tahun'] : 'null';
        $tahun      = $this->Tahun_model->get_detail_data($id_tahun);
        $data_guru  = $this->Laporan_model->get_all_lap_guru($id_tahun);
        $this->myexcel->generate_guru('Admin', $tahun, $data_guru);
    }
}
