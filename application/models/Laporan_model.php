<?php
class Laporan_model extends CI_Model
{
    public function cek_datatahun($id_tahun)
    {
        return $this->db->get_where('tb_pengajar', ['id_tahun' => $id_tahun]);
    }

    public function cek_datatahun_guru($tahun)
    {
        $this->db->select('*');
        $this->db->from('tb_pengajar tp');
        $this->db->join('tb_tahunajaran tt', 'tp.id_tahun = tt.id_tahun', 'left');
        $this->db->where('tt.nama', $tahun);
        $this->db->group_by('tp.id_guru');
        return $this->db->get();
    }

    public function get_all_lap_guru($id_tahun)
    {
        $this->db->select('tg.*, tp.jabatan, group_concat(tk.kelas) as kelas');
        $this->db->from('tb_guru tg');
        $this->db->join('tb_pengajar tp', 'tg.id_guru = tp.id_guru', 'left');
        $this->db->join('tb_tahunajaran tt', 'tp.id_tahun = tt.id_tahun', 'left');
        $this->db->join('tb_matapelajaran tm', 'tp.id_mapel = tm.id_mapel', 'left');
        $this->db->join('tb_kelas tk', 'tp.id_kelas = tk.id_kelas', 'left');
        $this->db->where('tt.id_tahun', $id_tahun);
        $this->db->group_by('tg.nama');
        $this->db->order_by('kelas', 'asc');
        return $this->db->get()->result();
    }

    public function get_detail_lap_guru($id_guru)
    {
        $this->db->select('tp.id_pengajar, tm.nama_mapel, tk.kelas, count(tk2.id_kd) as kd ,tt.nama as tahun');
        $this->db->from('tb_pengajar tp');
        $this->db->join('tb_guru tg', 'tp.id_guru = tg.id_guru', 'left');
        $this->db->join('tb_matapelajaran tm', 'tp.id_mapel = tm.id_mapel', 'left');
        $this->db->join('tb_kelas tk', 'tp.id_kelas = tk.id_kelas', 'left');
        $this->db->join('tb_kd tk2', 'tm.id_mapel = tk2.id_mapel', 'left');
        $this->db->join('tb_tahunajaran tt', 'tp.id_tahun = tt.id_tahun', 'left');
        $this->db->where('tg.id_guru', $id_guru);
        $this->db->group_by('tp.id_pengajar');
        return $this->db->get()->result();
    }

    public function _get_data_siswa($tahun, $id_kelas)
    {
        $tahun = $tahun != null ? $tahun : 'null';
        $id_kelas = $id_kelas != null ? $id_kelas : 'null';

        $this->db->select('ts.*, ta.*, to.nama_ayah,to.pendidikan_ayah,to.pekerjaan_ayah,to.nama_ibu,to.pendidikan_ibu,to.pekerjaan_ibu, to.no_hp');
        $this->db->from('tb_siswa ts');
        $this->db->join('tb_orangtua to', 'ts.id_orangtua = to.id_orangtua', 'left');
        $this->db->join('tb_alamat ta', 'to.id_alamat = ta.id_alamat', 'left');
        $this->db->join('tb_datasiswa td', 'ts.id_siswa = td.id_siswa', 'inner');
        $this->db->where('td.tahun_ajaran', $tahun);
        $this->db->where('td.id_kelas', $id_kelas);
        $this->db->group_by('ts.nis');
    }

    public function get_numrow_siswa($tahun, $id_kelas)
    {
        $this->_get_data_siswa($tahun, $id_kelas);
        return $this->db->get()->num_rows();
    }

    public function get_all_lap_siswa($tahun, $id_kelas)
    {
        $this->_get_data_siswa($tahun, $id_kelas);
        return $this->db->get()->result();
    }

    var $column_order_siswa = array(null, 'nis', 'nisn', 'nama', 'jenis_kelamin', 'tanggal_lahir', 'agama', 'dusun', 'desa', 'kecamatan', 'kabupaten', 'nama_ayah', 'pendidikan_ayah', 'pekerjaan_ayah', 'nama_ibu', 'pendidikan_ibu', 'pekerjaan_ibu', 'no_hp'); //Sesuaikan dengan field
    var $column_search_siswa = array('nis', 'nisn', 'nama', 'dusun', 'kecamatan', 'kabupaten'); //field yang diizin untuk pencarian 
    var $order_siswa = array('nis' => 'asc'); // default order 

    private function _get_datatables_query_siswa($tahun, $id_kelas)
    {
        $this->_get_data_siswa($tahun, $id_kelas);

        $i = 0;

        foreach ($this->column_search_siswa as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search_siswa) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order_siswa[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order_siswa = $this->order;
            $this->db->order_by(key($order_siswa), $order_siswa[key($order_siswa)]);
        }
    }

    function get_datatables_siswa($tahun, $id_kelas)
    {
        $this->_get_datatables_query_siswa($tahun, $id_kelas);
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_siswa($tahun, $id_kelas)
    {
        $this->_get_datatables_query_siswa($tahun, $id_kelas);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_siswa($tahun, $id_kelas)
    {
        $this->_get_data_siswa($tahun, $id_kelas);
        return $this->db->count_all_results();
    }

    var $column_order_guru = array(null, 'nama', 'nip', 'jenis_kelamin', 'tanggal_lahir', 'jabatan', 'kelas', 'alamat'); //Sesuaikan dengan field
    var $column_search_guru = array('nama', 'nip', 'jenis_kelamin', 'jabatan', 'kelas'); //field yang diizin untuk pencarian 
    var $order_guru = array('kelas' => 'asc'); // default order 

    private function _get_datatables_query_guru($id_tahun)
    {

        $this->db->select("tg.id_guru, tg.nama, tg.nip, tg.jenis_kelamin, tg.tanggal_lahir, tp.jabatan, group_concat(tk.kelas) as 'kelas', tg.alamat");
        $this->db->from('tb_guru tg');
        $this->db->join('tb_pengajar tp', 'tg.id_guru = tp.id_guru', 'left');
        $this->db->join('tb_tahunajaran tt', 'tp.id_tahun = tt.id_tahun', 'left');
        $this->db->join('tb_matapelajaran tm', 'tp.id_mapel = tm.id_mapel', 'left');
        $this->db->join('tb_kelas tk', 'tp.id_kelas = tk.id_kelas', 'left');
        $this->db->where('tp.id_tahun', $id_tahun);
        $this->db->group_by('tg.nama');
        $this->db->order_by('tk.kelas', 'asc');

        $i = 0;

        foreach ($this->column_search_guru as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search_guru) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order_guru[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order_guru = $this->order;
            $this->db->order_by(key($order_guru), $order_guru[key($order_guru)]);
        }
    }

    function get_datatables_guru($id_tahun)
    {
        $this->_get_datatables_query_guru($id_tahun);
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_guru($id_tahun)
    {
        $this->_get_datatables_query_guru($id_tahun);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_guru($id_tahun)
    {
        $this->db->select('tg.id_guru, tg.nama, tg.nip, tg.jenis_kelamin, tg.tanggal_lahir, tp.jabatan, group_concat(tk.kelas) as kelas, tg.alamat');
        $this->db->from('tb_guru tg');
        $this->db->join('tb_pengajar tp', 'tg.id_guru = tp.id_guru', 'left');
        $this->db->join('tb_tahunajaran tt', 'tp.id_tahun = tt.id_tahun', 'left');
        $this->db->join('tb_matapelajaran tm', 'tp.id_mapel = tm.id_mapel', 'left');
        $this->db->join('tb_kelas tk', 'tp.id_kelas = tk.id_kelas', 'left');
        $this->db->where('tp.id_tahun', $id_tahun);
        $this->db->group_by('tg.nama');
        return $this->db->count_all_results();
    }

    public function get_data_nilai($id_tahun, $id_kelas, $view = 'default', $jenis, $id_guru = NULL)
    {
        $id_tahun               = $id_tahun != null ? $id_tahun : 'null';
        $id_kelas               = $id_kelas != null ? $id_kelas : 'null';
        $tahun                  = $this->_get_detail_tahun($id_tahun);
        $name_tahun             = $tahun['nama'];
        $get_mapel              = $this->get_mapel_pertahun($id_tahun, $id_kelas, $id_guru);
        $mapel                  = ($get_mapel->num_rows() > 0) ? $get_mapel->result() : null;
        $guru                   = $id_guru != null ? " and tp.id_guru = $id_guru " : '';
        $query_join             = "";
        $query_select           = "";
        $query_select_injoin    = "";

        if (!isset($mapel)) {
            return null;
        }

        foreach ($mapel as $key => $value) {
            $query_select_injoin = $query_select_injoin . "sum(if ( nilai.nama_mapel = '$value->nama_mapel', nilai.nilai, 0)) as nilai$key, ";

            switch ($view) {
                case 'min':
                    $query_select = $query_select . "min(hasil.nilai$key) as '$value->nama_mapel', ";
                    break;
                case 'max':
                    $query_select = $query_select . "max(hasil.nilai$key) as '$value->nama_mapel', ";
                    break;
                case 'jumlah':
                    $query_select = $query_select . "sum(hasil.nilai$key) as '$value->nama_mapel', ";
                    break;
                case 'rerata':
                    $query_select = $query_select . "round(avg(hasil.nilai$key)) as '$value->nama_mapel', ";
                    break;
                default:
                    $query_select = $query_select . "hasil.nilai$key as '$value->nama_mapel', ";
                    break;
            }
        }

        switch ($view) {
            case 'min':
                $query_select = $query_select . "min(hasil.jumlah) as 'jumlah', min(hasil.rerata) as 'rerata'";
                break;
            case 'max':
                $query_select = $query_select . "max(hasil.jumlah) as 'jumlah', max(hasil.rerata) as 'rerata'";
                break;
            case 'jumlah':
                $query_select = $query_select . "sum(hasil.jumlah) as 'jumlah', sum(hasil.rerata) as 'rerata'";
                break;
            case 'rerata':
                $query_select = $query_select . "round(avg(hasil.jumlah)) as 'jumlah', round(avg(hasil.rerata)) as 'rerata'";
                break;
            default:
                $query_select = $query_select . "hasil.jumlah as 'jumlah', hasil.rerata as 'rerata'";
                break;
        }

        $query_join = "select ts.nis, ts.nisn ,ts.nama, $query_select_injoin round(sum(nilai.nilai)) as 'jumlah', round(avg(nilai.nilai)) as 'rerata' from tb_siswa ts 
                inner join (
                    select ts.id_siswa, ts.nis, ts.nama, round(avg(tn.nilai)) as nilai, tm.id_mapel, tm.nama_mapel 
                    from tb_nilai tn 
                    inner join tb_datasiswa td on 
                        tn.id_datasiswa = td.id_datasiswa 
                    inner join tb_siswa ts on
                        td.id_siswa = ts.id_siswa
                    inner join tb_kd tk on
                        tn.id_kd = tk.id_kd
                    inner join tb_matapelajaran tm on
                        tk.id_mapel = tm.id_mapel
                    inner join tb_pengajar tp on
                        tp.id_mapel = tm.id_mapel 
                    where td.id_kelas = $id_kelas
                        and td.tahun_ajaran = '$name_tahun'
                        and tk.jenis_penilaian = '$jenis' $guru
                    group by ts.nis, tm.id_mapel) nilai on nilai.id_siswa = ts.id_siswa
                    group by ts.nis";

        if ($query_select != null || $query_join != null) {

            $query = "select ts.nis, ts.nisn, ts.nama, $query_select from
                        tb_siswa ts
                    inner join($query_join) hasil on
                    hasil.nis = ts.nis";

            return $this->db->query($query)->result_array();
        } else {
            return null;
        }
    }

    private function _get_detail_tahun($id)
    {
        return $this->db->get_where('tb_tahunajaran', ['id_tahun' => $id])->row_array();
    }

    public function get_mapel_pertahun($id_tahun, $id_kelas, $id_guru = NULL)
    {
        $this->db->select('tm.*');
        $this->db->from('tb_matapelajaran tm');
        $this->db->join('tb_pengajar tp', 'tm.id_mapel = tp.id_mapel', 'left');
        $this->db->where('tp.id_tahun', $id_tahun);
        $this->db->where('tp.id_kelas', $id_kelas);
        if ($id_guru != null) {
            $this->db->where('tp.id_guru', $id_guru);
        }
        return $this->db->get();
    }
}
