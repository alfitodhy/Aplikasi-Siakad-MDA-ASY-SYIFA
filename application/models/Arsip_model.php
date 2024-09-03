<?php 
class Arsip_model extends CI_Model
{
    public function input_nilai($nilai)
    {
        foreach ($nilai as $key => $value) {
            $data = array(
                'id_datasiswa'  => $value->id_datasiswa,
                'id_kd'         => $value->id_kd,
                'jenis'         => $value->jenis,
                'nilai'         => $value->nilai,
            );
            $this->db->insert('tb_arsipnilai', $data);
        }
    }

    public function cancel_nilai($nilai, $jenis)
    {
        foreach ($nilai as $key => $value) {
            $data = array(
                'id_datasiswa'  => $value->id_datasiswa,
                'id_kd'         => $value->id_kd,
                'jenis'         => $jenis,
                'nilai'         => $value->nilai,
            );
            $this->db->insert('tb_nilai', $data);
        }
    }

    public function delete_nilai($id_kelas, $id_kd, $jenis, $tahun)
    {
        $this->db->query("delete tn from tb_arsipnilai tn 
            inner join tb_datasiswa td on tn.id_datasiswa = td.id_datasiswa
            where tn.id_kd = $id_kd
            and td.id_kelas = $id_kelas
            and td.tahun_ajaran = '$tahun'
            and tn.jenis = '$jenis'");
    }

    public function get_jenis_nilai_in_perkd($id_kelas = null, $id_mapel = null, $id_kd = null, $tahun = null)
    {
        $query = $this->_get_jenis_nilai_inperkd($id_kelas, $id_mapel, $id_kd, $tahun);
        return $query->result();
    }


    public function get_jenis_nilai_in_perkd_array($id_kelas = null, $id_mapel = null, $id_kd = null, $tahun = null)
    {
        $query = $this->_get_jenis_nilai_inperkd($id_kelas, $id_mapel, $id_kd, $tahun);
        return $query->result_array();
    }

    private function _get_jenis_nilai_inperkd($id_kelas = null, $id_mapel = null, $id_kd = null, $tahun = null)
    {
        $kelas = $id_kelas != null ? $id_kelas : 'null';
        $mapel = $id_mapel != null ? $id_mapel : 'null';
        $tahun = $tahun != null ? $tahun : 'null';
        $kd = $id_kd != null ? $id_kd : 'null';
        $query = $this->db->query("select tn.jenis from tb_arsipnilai tn  
            left join tb_kd tk 
                on tn.id_kd = tk.id_kd 
            left join tb_matapelajaran tm 
                on tk.id_mapel = tm.id_mapel
            left join tb_datasiswa td 
                on tn.id_datasiswa = td.id_datasiswa
            left join tb_siswa ts 
                on td.id_siswa = ts.id_siswa
            left join tb_pengajar tp 
                on td.id_kelas = tp.id_kelas
            left join tb_tahunajaran tt 
                on tp.id_tahun = tt.id_tahun  
            where
                tt.status = '1' 
                and tm.id_mapel = $mapel
                and tk.id_kd = $kd
                and td.id_kelas = $kelas
                and td.tahun_ajaran = '$tahun'
            group by tn.jenis");
        return $query;
    }

    public function get_nilai_perkd($id_kelas, $id_mapel, $id_kd, $tahun)
    {
        $kelas = $id_kelas != null ? $id_kelas : 'null';
        $mapel = $id_mapel != null ? $id_mapel : 'null';
        $kd = $id_kd != null ? $id_kd : 'null';
        $tahun = $tahun != null ? $tahun : 'null';
        $jenis_nilai = $this->get_jenis_nilai_in_perkd($id_kelas, $id_mapel, $id_kd, $tahun);
        $query_select = "";

        foreach ($jenis_nilai as $jn => $value) {
            $query_select = $query_select . "sum( if ( nilai.jenis = '$value->jenis', nilai.nilai, null)) as '$value->jenis', ";
        }

        $query_select = substr($query_select, 0, -2);

        if ($query_select != null) {
            $query = $this->db->query("select ts.nis, ts.nisn ,ts.nama, $query_select, jm.jumlah, jm.rerata from tb_siswa ts
                inner join (
                    select td.id_siswa, tn.nilai, tn.jenis from tb_arsipnilai tn  
                        left join tb_kd tk 
                            on tn.id_kd = tk.id_kd 
                        left join tb_matapelajaran tm 
                            on tk.id_mapel = tm.id_mapel
                        left join tb_pengajar tp 
                            on tm.id_mapel = tp.id_mapel
                        left join tb_kelas tk2 
                            on tp.id_kelas =tk2.id_kelas
                        left join tb_datasiswa td 
                            on tn.id_datasiswa = td.id_datasiswa
                        left join tb_tahunajaran tt 
                            on tp.id_tahun = tt.id_tahun 
                    where tt.status = '1'
                        and tm.id_mapel = $mapel
                        and tk.id_kd = $kd
                        and tk2.id_kelas = $kelas
                        and td.tahun_ajaran = '$tahun') nilai on nilai.id_siswa = ts.id_siswa    
                inner join (
                    select td.id_siswa, sum(tn.nilai) as jumlah, round(avg(tn.nilai)) as rerata 
                    from tb_arsipnilai tn 
                        inner join tb_datasiswa td 
                            on tn.id_datasiswa = td.id_datasiswa 
                        inner join tb_kd tk 
                            on tn.id_kd = tk.id_kd
                        inner join tb_matapelajaran tm 
                            on tk.id_mapel = tm.id_mapel
                    where 
                        tm.id_mapel = $mapel
                        and tk.id_kd = $kd
                        and td.id_kelas = $kelas
                    group by td.id_siswa) jm on jm.id_siswa = ts.id_siswa
                group by ts.nis");
            return $query->result_array();
        } else {
            return null;
        }
    }

    public function detail_nilai_perkd($id_kelas, $id_mapel, $id_kd, $jenis, $tahun)
    {
        $query = $this->db->query("select td.id_datasiswa, ts.id_siswa, ts.nis, ts.nama, tn.nilai, tn.jenis, tk.id_kd 
            from tb_arsipnilai tn  
                left join tb_kd tk 
                    on tn.id_kd = tk.id_kd 
                left join tb_matapelajaran tm 
                    on tk.id_mapel = tm.id_mapel
                left join tb_datasiswa td
                    on tn.id_datasiswa = td.id_datasiswa 
                left join tb_siswa ts 
                    on td.id_siswa = ts.id_siswa
            where 
                tm.id_mapel = $id_mapel
                and tk.id_kd = $id_kd
                and td.id_kelas = $id_kelas
                and tn.jenis = '$jenis'
                and td.tahun_ajaran = '$tahun'");

        return $query->result();
    }
}
