<?php
class LaporanSiswa extends CI_Controller
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
        $data = array(
            'id_user'   => $data['id_user'],
            'nama'      => $data['nama'],
            'photo'     => $data['photo'] != null ? $data['photo'] : 'user-placeholder.jpg',
            'level'     => $data['level'],
            'tahun'     => $this->Tahun_model->get_data_groupname(),
            'kelas'     => $kelas,
            'menu'      => 'laporan_siswa',
            'breadcrumb' => [
                0 => (object)[
                    'name' => 'Dashboard',
                    'link' => 'walikelas'
                ],
                1 => (object)[
                    'name' => 'Laporan Daftar Siswa',
                    'link' => NULL
                ]
            ]
        );

        $this->load->view('templates/header');
        $this->load->view('templates_guruwali/sidebar', $data);
        $this->load->view('guru_wali/laporan_siswa', $data);
        $this->load->view('templates/footer');
    }

    public function data_all_siswa()
    {
        $tahun      = $this->input->post('tahun', TRUE);
        $id_kelas   = $this->input->post('id_kelas', TRUE);
        // $tahun      = $this->Tahun_model->get_detail_data($id_tahun);
        $kelas      = $this->Kelas_model->get_detail_data($id_kelas);
        $html       = '';

        $cek_data   = $this->Laporan_model->get_numrow_siswa($tahun, $id_kelas);
        $data = $this->Laporan_model->get_all_lap_siswa($tahun, $id_kelas);
        if ($cek_data > 0) {
            $html       = $html . '
                <div class="card">
                    <div class="card-body">
                        <div>
                            <h1 class="h1 text-center">LAPORAN DAFTAR SISWA</h1>
                            <h2 class="text-center">MADRASAH DINIYAH AWALIYAH (MDA) ASY - SYIFA</h2>
                            <h3 class="text-center">Tahun Ajaran ' . $tahun . '</h3>
                            <h4 class="text-center">' . $kelas['kelas'] . '</h4>
                        </div>
                        <a href="' . base_url('walikelas/laporansiswa/excel_laporan?tahun=' . $tahun . '&id_kelas=' . $id_kelas) . '" class="btn btn-success mb-2"><i class="fas fa-file-excel" aria-hidden="true" ></i> Print Excel</a>
                        <table class="table table-responsive-xl table-bordered table-striped table-sm w-100 d-block d-md-table" id="laporansiswa">
                            <thead>
                                <tr class="text-center">
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">NIS</th>
                                    <th rowspan="2">NISN</th>
                                    <th rowspan="2">Nama</th>
                                    <th rowspan="2">JK</th>
                                    <th rowspan="2">Tanggal Lahir</th>
                                    <th rowspan="2">Agama</th>
                                    <th colspan="7">Orang Tua</th>
                                    <th colspan="4">Alamat</th>
                                </tr>
                                <tr>
                                    <th>Nama Ayah</th>
                                    <th>Pendidkan Ayah</th>
                                    <th>Pekerjaan Ayah</th>
                                    <th>Nama Ibu</th>
                                    <th>Pendidikan Ibu</th>
                                    <th>Pekerjaan Ibu</th>
                                    <th>No Hp</th>
                                    <th>Dusun</th>
                                    <th>Desa</th>
                                    <th>Kecamatan</th>
                                    <th>Kabupaten</th>
                                </tr>
                            </thead>
                            <tbody>';

            foreach ($data as $key => $value) {
                $jk = ($value->jenis_kelamin == 'Perempuan') ? 'P' : 'L';
                $html = $html . '<tr>
                    <td>' . ++$key . '</td>
                    <td>' . $value->nis . '</td>
                    <td>' . $value->nisn . '</td>
                    <td>' . $value->nama . '</td>
                    <td>' . $jk . '</td>
                    <td>' . $value->tanggal_lahir . '</td>
                    <td>' . $value->agama . '</td>
                    <td>' . $value->nama_ayah . '</td>
                    <td>' . $value->pendidikan_ayah . '</td>
                    <td>' . $value->pekerjaan_ayah . '</td>
                    <td>' . $value->nama_ibu . '</td>
                    <td>' . $value->pendidikan_ibu . '</td>
                    <td>' . $value->pekerjaan_ibu . '</td>
                    <td>' . $value->no_hp . '</td>
                    <td>' . $value->dusun . '</td>
                    <td>' . $value->desa . '</td>
                    <td>' . $value->kecamatan . '</td>
                    <td>' . $value->kabupaten . '</td>
                    </tr>';
            }

            $html = $html . '
                            </tbody>
                        </table>
                    </div>
                </div>';

            // $html = $html . "
            //     <script>
            //         $(document).ready(function() {
            //             var table = $('#laporansiswa').DataTable({
            //                 dom: 'Bfrtip',
            //                 lengthChange: false,
            //                 'pageLength': 10,
            //                 'lengthMenu': [[10, 20, 25, 50, -1], [10, 20, 25, 50, 'All']],
            //                 buttons: [
            //                     {
            //                         extend: 'excel',
            //                         text: 'Print Excel',
            //                         titleAttr: 'Excel',
            //                         className: 'btn-success'
            //                     },
            //                 ],
            //                 columnDefs: [
            //                     {
            //                         targets: [ -1,-2,-3,-4 ],
            //                         visible: false,
            //                         searchable: false
            //                     }
            //                 ]
            //             });


            //             table.buttons().container()
            //                 .appendTo( '#laporansiswa_wrapper .col-md-6:eq(0)' );
            //         });
            //     </script>
            // ";
        } else {
            $html = $html . '<div class="card">
                                <div class="card-body">
                                    <h6 class="text-center">Laporan Daftar Siswa Tidak Tersedia, Silahkan Masukan Data Yang Diperlukan</h6>
                                </div>
                            </div>';
        }

        echo $html;
    }

    function get_result_siswa()
    {
        $id_tahun = $this->input->post('id_tahun', TRUE);
        $id_kelas = $this->input->post('id_kelas', TRUE);

        $list = $this->Laporan_model->get_datatables_siswa($id_tahun, $id_kelas);
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $item->nis;
            $row[] = $item->nisn;
            $row[] = $item->nama;
            $row[] = $item->jenis_kelamin;
            $row[] = $item->tanggal_lahir;
            $row[] = $item->agama;
            $row[] = $item->dusun;
            $row[] = $item->desa;
            $row[] = $item->kecamatan;
            $row[] = $item->kabupaten;
            $row[] = anchor('walikelas/laporansiswa/detail/' . $item->id_siswa, '<div class="btn btn-sm btn-success mr-1 ml-1 mb-1 mt=1"><i class="fa fa-eye"></i></div>') .
                '<a href="' . base_url('walikelas/laporansiswa/pdf_laporan?q=detaildata&id=' . $item->id_siswa) . '" class="btn btn-sm btn-info mr-1 ml-1 mb-1 mt=1"><i class="fa fa-print"></i></a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Laporan_model->count_all_siswa($id_tahun, $id_kelas),
            "recordsFiltered" => $this->Laporan_model->count_filtered_siswa($id_tahun, $id_kelas),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function detail()
    {
        $id           = $this->uri->segment(4);
        if (!$id) {
            redirect('walikelas/laporansiswa');
        }

        $data = $this->User_model->get_detail_guru($this->session->userdata['id_user'], $this->session->userdata['level']);
        $data = array(
            'id_user'   => $data['id_user'],
            'nama'      => $data['nama'],
            'photo'     => $data['photo'] != null ? $data['photo'] : 'user-placeholder.jpg',
            'siswa'     => $this->Siswa_model->get_detail_data($id),
            'data'      => $this->Laporan_model->get_detail_lap_guru($id),
            'id_siswa'  => $id,
            'level'     => $data['level'],
            'tahun'     => $this->Tahun_model->get_data(),
            'menu'      => 'laporan_siswa',
            'breadcrumb' => [
                0 => (object)[
                    'name' => 'Dashboard',
                    'link' => 'walikelas'
                ],
                1 => (object)[
                    'name' => 'Laporan Daftar Siswa',
                    'link' => 'walikelas/laporansiswa'
                ],
                2 => (object)[
                    'name' => 'Detail',
                    'link' => NULL
                ]
            ]
        );

        $this->load->view('templates/header');
        $this->load->view('templates_guruwali/sidebar', $data);
        $this->load->view('guru_wali/laporan_siswadetail', $data);
        $this->load->view('templates/footer');
    }

    public function pdf_laporan()
    {
        $query      = $this->input->get('q');
        $tahun      = $this->input->get('tahun');
        $kelas      = $this->input->get('kelas');
        $id_siswa   = $this->input->get('id');

        if ($query == 'alldata') {
            $data['data'] = $this->Laporan_model->get_all_lap_siswa($tahun, $kelas);
            $data['kelas'] = $this->Kelas_model->get_detail_data($kelas);
            $this->mypdf->generate('pdf/laporan_allsiswa', $data, 'Laporan Data Siswa', 'A4', 'landscape');
        } elseif ($query == 'detaildata') {
            $data['siswa'] = $this->Siswa_model->get_detail_data($id_siswa);
            $this->mypdf->generate('pdf/laporan_detailsiswa', $data, 'Laporan Data Siswa', 'A4', 'portrait');
        }
    }

    public function excel_laporan()
    {
        $tahun      = $this->input->get('tahun', TRUE);
        $id_kelas   = $this->input->get('id_kelas', TRUE);
        $kelas      = $this->Kelas_model->get_detail_data($id_kelas);
        $data       = $this->Laporan_model->get_all_lap_siswa($tahun, $id_kelas);
        $this->myexcel->generate_siswa('WaliKelas', $tahun, $kelas, $data);
    }
}
