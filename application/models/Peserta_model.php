<?php
class Peserta_model extends CI_Model
{
    public function input_data($tahun)
    {
        $peserta = $this->input->post('siswa', TRUE);
        if (!empty($peserta)) {
            foreach ($peserta as $ps) {
                $data = array(
                    'id_siswa'      => $ps,
                    'id_kelas'      => $this->input->post('kelas', TRUE),
                    'tahun_ajaran'  => $tahun
                );

                $this->db->insert('tb_datasiswa', $data);
            }
        }
    }

    public function get_data_kelas($id_kelas, $tahun)
    {
        $this->db->select('td.id_datasiswa, ts.id_siswa, ts.nis, ts.nisn, ts.nama, ts.jenis_kelamin, ts.agama, tk.kelas');
        $this->db->from('tb_datasiswa td');
        $this->db->join('tb_siswa ts', 'ts.id_siswa = td.id_siswa', 'inner');
        $this->db->join('tb_kelas tk', 'tk.id_kelas = td.id_kelas', 'inner');
        $this->db->where('td.id_kelas', $id_kelas);
        $this->db->where('td.tahun_ajaran', $tahun);
        $this->db->order_by('ts.nis', 'asc');

        return $this->db->get()->result();
    }

    public function update_kelas()
    {
        $oldtahun       = $this->input->post('oldtahun', TRUE);
        $oldkelas       = $this->input->post('oldkelas', TRUE);
        $get_oldkelas   = $this->get_data_kelas($oldkelas, $oldtahun);
        if ($get_oldkelas) {
            foreach ($get_oldkelas as $go) {
                $data = array(
                    'id_siswa'      => $go->id_siswa,
                    'id_kelas'      => $this->input->post('newkelas', TRUE),
                    'tahun_ajaran'  => $this->input->post('newtahun', TRUE)
                );
                $this->db->insert('tb_datasiswa', $data);
            }
        }
    }

    public function get_kelas($id_siswa, $tahun)
    {
        return $this->db->get_where('tb_datasiswa', ['id_siswa' => $id_siswa, 'tahun_ajaran' => $tahun])->row_array();
    }

    public function delete_data($id_datasiswa)
    {
        $this->db->delete('tb_datasiswa', ['id_datasiswa' => $id_datasiswa]);
    }
}
