<?php
class LaporanNilai extends CI_Controller
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
        $guru       = $this->Guru_model->get_detail_data(NULL, $data['id_user']);
        $data = array(
            'id_user'   => $data['id_user'],
            'id_guru'   => $guru['id_guru'],
            'nama'      => $data['nama'],
            'photo'     => $data['photo'] != null ? $data['photo'] : 'user-placeholder.jpg',
            'level'     => $data['level'],
            'tahun'     => $this->Tahun_model->get_data(),
            'menu'      => 'laporan_nilai',
            'breadcrumb' => [
                0 => (object)[
                    'name' => 'Dashboard',
                    'link' => 'guru'
                ],
                1 => (object)[
                    'name' => 'Laporan Daftar Nilai',
                    'link' => NULL
                ]
            ]
        );

        $this->load->view('templates/header');
        $this->load->view('templates_guru/sidebar', $data);
        $this->load->view('guru/laporan_nilai', $data);
        $this->load->view('templates/footer');
    }

    public function get_kelas()
    {
        $id_tahun   = $this->input->post('id_tahun', TRUE);
        $id_guru    = $this->input->post('id_guru', TRUE);
        $data       =  $this->Pengajar_model->get_mapel_pengampu($id_guru, NULL, NULL, $id_tahun);
        if ($data) {
            echo '<option value="">--Pilih Kelas--</option>';
            foreach ($data as $pe) {
                echo "<option value=$pe->id_kelas>$pe->kelas</option>";
            }
        } else {
            echo '<option value="">--Tidak Tersedia--</option>';
        }
    }

    public function get_mapel()
    {
        $id_tahun   = $this->input->post('id_tahun', TRUE);
        $id_guru    = $this->input->post('id_guru', TRUE);
        $id_kelas    = $this->input->post('id_kelas', TRUE);
        $data       =  $this->Pengajar_model->get_mapel_pengampu($id_guru, $id_kelas, NULL, $id_tahun);
        if ($data) {
            echo '<option value="">--Pilih Mata Pelajaran--</option>';
            foreach ($data as $pe) {
                echo "<option value=$pe->id_mapel>$pe->nama_mapel</option>";
            }
        } else {
            echo '<option value="">--Tidak Tersedia--</option>';
        }
    }

    public function data_nilai()
    {
        $id_tahun   = $this->input->post('id_tahun', TRUE);
        $id_guru    = $this->input->post('id_guru', TRUE);
        $id_kelas   = $this->input->post('id_kelas', TRUE);
        $nilai          = $this->input->post('nilai', TRUE);
        $html       = '';

        if ($id_tahun == NULL || $id_guru == NULL || $id_kelas == NULL || $nilai == NULL) {
            //id not found
            $html = $html . '<div class="card">
                                <div class="card-body">
                                    <h6 class="text-center">Laporan Daftar Nilai Siswa Tidak Tersedia, Silahkan Masukan Data Yang Diperlukan</h6>
                                </div>
                            </div>';
        } else {
            $tahun          = $this->Tahun_model->get_detail_data($id_tahun);
            $kelas          = $this->Kelas_model->get_detail_data($id_kelas);
            $daftar_mapel   = $this->Laporan_model->get_mapel_pertahun($id_tahun, $id_kelas, $id_guru)->result();
            $result         = $this->Laporan_model->get_data_nilai($id_tahun, $id_kelas, 'default', $nilai, $id_guru);
            $result_min     = $this->Laporan_model->get_data_nilai($id_tahun, $id_kelas, 'min', $nilai, $id_guru);
            $result_max     = $this->Laporan_model->get_data_nilai($id_tahun, $id_kelas, 'max', $nilai, $id_guru);
            $result_jumlah  = $this->Laporan_model->get_data_nilai($id_tahun, $id_kelas, 'jumlah', $nilai, $id_guru);
            $result_rerata  = $this->Laporan_model->get_data_nilai($id_tahun, $id_kelas, 'rerata', $nilai, $id_guru);

            if ($result) {
                //awal table
                $html = $html . '<div class="card">
                    <div class="card-body">
                        <div>
                            <h1 class="h1 text-center">LAPORAN DAFTAR NILAI SISWA ' . $nilai . '</h1>
                            <h1 class="text-center">MADRASAH DINIYAH AWALIYAH (MDA) ASY - SYIFA</h1>
                            <h3 class="text-center">Tahun Ajaran ' . $tahun['nama'] . ' Semester ' . $tahun['semester'] . '</h3>
                            <h3 class="text-center">' . $kelas['kelas'] . '</h3>
                        </div>
                        <a href="' . base_url('guru/laporannilai/excel_laporan?id_tahun=' . $id_tahun . '&id_kelas=' . $id_kelas . '&nilai=' . $nilai . '&id_guru=' . $id_guru) . '" class="btn btn-success mb-2">Print Excel</a>
                        <table class="table table-responsive-sm table-bordered table-striped table-sm w-100 d-block d-md-table">
                            <thead>
                                <tr>
                                    <th style="vertical-align : middle;text-align:center;">No</th>
                                    <th style="vertical-align : middle;text-align:center;">NIS</th>
                                    <th style="vertical-align : middle;text-align:center;">NISN</th>
                                    <th style="vertical-align : middle;text-align:center;">Nama</th>';

                //heading mapel
                foreach ($daftar_mapel as $key => $value) {
                    $html = $html . "<th>$value->nama_mapel</th>";
                }

                //heading jumlah dan rata-rata
                $html = $html . '<th>Jumlah</th>
                            <th>Rata-rata</th>
                            </tr></thead><tbody>';

                // body table default
                foreach ($result as $key => $value) {
                    $html = $html . '
                    <tr>
                        <td class="text-center">' . ++$key . '</td>
                        <td>' . $value['nis'] . '</td>
                        <td>' . $value['nisn'] . '</td>
                        <td>' . $value['nama'] . '</td>';

                    foreach ($daftar_mapel as $kd => $mapel) {
                        $html = $html . '<td>' . $value[$mapel->nama_mapel] . '</td>';
                    }

                    $html = $html . '
                        <td>' . $value['jumlah'] . '</td>
                        <td>' . $value['rerata'] . '</td>
                    </tr>';
                }

                // body table min
                foreach ($result_min as $key => $value) {
                    $html = $html . '<tr><td colspan="100%"></td></tr>';

                    $html = $html . '<tr>
                    <td width="20px"></td>
                    <td colspan="3">MIN</td>';
                    foreach ($daftar_mapel as $kd => $mapel) {
                        $html = $html . '<td>' . $value[$mapel->nama_mapel] . '</td>';
                    }

                    $html = $html . "<td>{$value['jumlah']}</td><td>{$value['rerata']}</td></tr>";
                }

                // body table max
                foreach ($result_max as $key => $value) {
                    $html = $html . '<tr>
                    <td width="20px"></td>
                    <td colspan="3">MAX</td>';
                    foreach ($daftar_mapel as $kd => $mapel) {
                        $html = $html . '<td>' . $value[$mapel->nama_mapel] . '</td>';
                    }

                    $html = $html . "<td>{$value['jumlah']}</td><td>{$value['rerata']}</td></tr>";
                }

                // body table jumlah
                foreach ($result_jumlah as $key => $value) {
                    $html = $html . '<tr>
                    <td width="20px"></td>
                    <td colspan="3">Jumlah</td>';
                    foreach ($daftar_mapel as $kd => $mapel) {
                        $html = $html . '<td>' . $value[$mapel->nama_mapel] . '</td>';
                    }

                    $html = $html . "<td>{$value['jumlah']}</td><td>{$value['rerata']}</td></tr>";
                }

                // body table rerata
                foreach ($result_rerata as $key => $value) {
                    $html = $html . '<tr>
                    <td width="20px"></td>
                    <td colspan="3">Rata-Rata</td>';
                    foreach ($daftar_mapel as $kd => $mapel) {
                        $html = $html . '<td>' . $value[$mapel->nama_mapel] . '</td>';
                    }

                    $html = $html . "<td>{$value['jumlah']}</td><td>{$value['rerata']}</td></tr>";
                }

                //akhir table
                $html = $html . '<tr></tr>';

                $html = $html . '
                            </tbody>
                        </table>
                    </div>
                </div>';
            } else {
                $html = $html . '<div class="card">
                                <div class="card-body">
                                    <h6 class="text-center">Laporan Daftar Nilai Siswa Tidak Tersedia, Silahkan Masukan Data Yang Diperlukan</h6>
                                </div>
                            </div>';
            }
        }

        echo $html;
    }

    public function pdf_laporan()
    {
        $query         = $this->input->get('q');
        $id_tahun      = $this->input->get('tahun');
        $id_kelas      = $this->input->get('kelas');
        $id_mapel      = $this->input->get('mapel');

        if ($query == 'mapeldata') {

            $data['tahun']          = $this->Tahun_model->get_detail_data($id_tahun);
            $data['kelas']          = $this->Kelas_model->get_detail_data($id_kelas);
            $data['mapel']          = $this->Mapel_model->get_detail_data($id_mapel);
            $data['data_default']   = $this->Nilai_model->get_nilai_permapel($id_mapel, $id_kelas, 'default', $id_tahun);
            $data['data_min']       = $this->Nilai_model->get_nilai_permapel($id_mapel, $id_kelas, 'min', $id_tahun);
            $data['data_max']       = $this->Nilai_model->get_nilai_permapel($id_mapel, $id_kelas, 'max', $id_tahun);
            $data['data_jumlah']    = $this->Nilai_model->get_nilai_permapel($id_mapel, $id_kelas, 'jumlah', $id_tahun);
            $data['data_rerata']    = $this->Nilai_model->get_nilai_permapel($id_mapel, $id_kelas, 'rerata', $id_tahun);
            $data['daftar_kd']      = $this->Nilai_model->get_kd_permapel_result($id_mapel, $id_kelas);

            $this->mypdf->generate('pdf/laporan_mapelnilai', $data, 'Laporan Data Nilai Siswa', 'A4', 'landscape');
            // $this->load->view('pdf/laporan_mapelnilai', $data);
        }
    }

    public function excel_laporan()
    {
        $id_tahun       = $this->input->get('id_tahun', TRUE);
        $id_kelas       = $this->input->get('id_kelas', TRUE);
        $nilai          = $this->input->get('nilai', TRUE);
        $id_guru        = $this->input->get('id_guru', TRUE);

        $tahun          = $this->Tahun_model->get_detail_data($id_tahun);
        $kelas          = $this->Kelas_model->get_detail_data($id_kelas);

        $daftar_mapel   = $this->Laporan_model->get_mapel_pertahun($id_tahun, $id_kelas, $id_guru)->result();

        $result         = $this->Laporan_model->get_data_nilai($id_tahun, $id_kelas, 'default', $nilai, $id_guru);
        $result_min     = $this->Laporan_model->get_data_nilai($id_tahun, $id_kelas, 'min', $nilai, $id_guru);
        $result_max     = $this->Laporan_model->get_data_nilai($id_tahun, $id_kelas, 'max', $nilai, $id_guru);
        $result_jumlah  = $this->Laporan_model->get_data_nilai($id_tahun, $id_kelas, 'jumlah', $nilai, $id_guru);
        $result_rerata  = $this->Laporan_model->get_data_nilai($id_tahun, $id_kelas, 'rerata', $nilai, $id_guru);
        $this->myexcel->generate('Guru', $nilai, $tahun, $kelas, $daftar_mapel, $result, $result_min, $result_max, $result_jumlah, $result_rerata);
    }
}
