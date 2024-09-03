<?php
class Siswa_model extends CI_Model
{
    public function get_data()
    {
        return $this->db->query('select * from tb_siswa ts where ts.id_siswa not in (select td.id_siswa from tb_datasiswa td) order by ts.nis')->result();
    }

    public function get_data_tahun($tahun)
    {
        return $this->db->query("select * from tb_siswa ts where ts.id_siswa not in (select td.id_siswa from tb_datasiswa td where td.tahun_ajaran = '$tahun') order by ts.nis asc")->result();
    }

    public function get_detail_data($id)
    {
        $this->db->select('*');
        $this->db->from('tb_siswa');
        $this->db->where('id_siswa', $id);
        $this->db->join('tb_orangtua', 'tb_siswa.id_orangtua = tb_orangtua.id_orangtua', 'left');
        $this->db->join('tb_alamat', 'tb_orangtua.id_alamat = tb_alamat.id_alamat', 'left');
        return $this->db->get()->row_array();
    }

    public function get_id_address($id)
    {
        $this->db->select('*');
        $this->db->from('tb_orangtua');
        $this->db->where('id_orangtua', $id);
        return $this->db->get()->row_array()['id_alamat'];
    }

    public function get_data_perkelas($id_kelas, $tahun)
    {
        $tahun = ($tahun) ? $tahun['nama'] : 'null';
        return $this->_get_data_perkelas($id_kelas, $tahun)->result();
    }

    public function get_count_perkelas($id_kelas, $tahun)
    {
        $tahun = ($tahun) ? $tahun['nama'] : 'null';
        return $this->_get_data_perkelas($id_kelas, $tahun)->num_rows();
    }

    private function _get_data_perkelas($id_kelas, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tb_siswa ts');
        $this->db->join('tb_datasiswa td', 'ts.id_siswa = td.id_siswa', 'left');
        $this->db->where('td.id_kelas', $id_kelas);
        $this->db->where('td.tahun_ajaran', $tahun);
        return $this->db->get();
    }

    // public function get_count_allsiswa()
    // {
    //     $this->db->select('*');
    //     $this->db->from('tb_siswa');
    //     $this->db->join('tb_orangtua', 'tb_siswa.id_orangtua = tb_orangtua.id_orangtua', 'left');
    //     $this->db->join('tb_alamat', 'tb_orangtua.id_alamat = tb_alamat.id_alamat', 'left');
    //     return $this->db->get()->num_rows();
    // }

    public function get_count_allsiswa($tahun)
    {
        $tahun_ajaran = ($tahun) ? $tahun['nama'] : 'null';
        $this->db->select('*');
        $this->db->from('tb_siswa');
        $this->db->join('tb_orangtua', 'tb_siswa.id_orangtua = tb_orangtua.id_orangtua', 'left');
        $this->db->join('tb_alamat', 'tb_orangtua.id_alamat = tb_alamat.id_alamat', 'left');
        $this->db->join('tb_datasiswa', 'tb_datasiswa.id_siswa = tb_siswa.id_siswa', 'inner');
        $this->db->where('tb_datasiswa.tahun_ajaran', $tahun_ajaran);
        return $this->db->get()->num_rows();
    }

    public function input_data_siswa($photo)
    {
        $id_user = $this->_input_user();
        $id_orangtua = $this->_input_data_orangtua();
        $data = array(
            'nis'           => $this->input->post('nis', TRUE),
            'nisn'          => $this->input->post('nisn', TRUE),
            'nama'          => $this->input->post('nama', TRUE),
            'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
            'agama'         => $this->input->post('agama', TRUE),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
            'photo'         => $photo,
            'id_orangtua'   => $id_orangtua,
            'id_user'       => $id_user
        );

        $this->db->insert('tb_siswa', $data);
    }

    public function edit_data($id, $photo)
    {
        $id_orangtua = $this->db->get_where('tb_siswa', ['id_siswa' => $id])->row()->id_orangtua;
        $id_alamat = $this->db->get_where('tb_orangtua', ['id_orangtua' => $id_orangtua])->row()->id_alamat;
        $dataDetail = $this->get_detail_data($id);

        $dataUser = array(
            'username'       => $this->input->post('nis', TRUE),
        );

        $data_siswa = array(
            'nis'           => $this->input->post('nis', TRUE),
            'nisn'          => $this->input->post('nisn', TRUE),
            'nama'          => $this->input->post('nama', TRUE),
            'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
            'agama'         => $this->input->post('agama', TRUE),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE)
        );

        if ($photo != null) {
            $data_siswa['photo'] = $photo;
        }

        $data_orangtua = array(
            'nama_ibu'          => $this->input->post('nama_ibu', TRUE),
            'pendidikan_ibu'    => $this->input->post('pendidikan_ibu', TRUE),
            'pekerjaan_ibu'     => $this->input->post('pekerjaan_ibu', TRUE),
            'nama_ayah'         => $this->input->post('nama_ayah', TRUE),
            'pendidikan_ayah'   => $this->input->post('pendidikan_ayah', TRUE),
            'pekerjaan_ayah'    => $this->input->post('pekerjaan_ayah', TRUE),
            'no_hp'             => $this->input->post('no_hp', TRUE)
        );

        $data_alamat = array(
            'dusun'     => $this->input->post('dusun', TRUE),
            'desa'      => $this->input->post('desa', TRUE),
            'kecamatan' => $this->input->post('kecamatan', TRUE),
            'kabupaten' => $this->input->post('kabupaten', TRUE)
        );

        $this->db->where('username', $dataDetail['nis']);
        $this->db->update('tb_user', $dataUser);

        $this->db->where('id_siswa', $id);
        $this->db->update('tb_siswa', $data_siswa);

        $this->db->where('id_orangtua', $id_orangtua);
        $this->db->update('tb_orangtua', $data_orangtua);

        $this->db->where('id_alamat', $id_alamat);
        $this->db->update('tb_alamat', $data_alamat);
    }

    public function delete_data($id)
    {
        $this->db->delete('tb_alamat', ['id_alamat' => $id]);
    }

    private function _input_data_orangtua()
    {
        $id_alamat = $this->_input_data_alamat();
        $data = array(
            'nama_ibu'          => $this->input->post('nama_ibu', TRUE),
            'pendidikan_ibu'    => $this->input->post('pendidikan_ibu', TRUE),
            'pekerjaan_ibu'     => $this->input->post('pekerjaan_ibu', TRUE),
            'nama_ayah'         => $this->input->post('nama_ayah', TRUE),
            'pendidikan_ayah'   => $this->input->post('pendidikan_ayah', TRUE),
            'pekerjaan_ayah'    => $this->input->post('pekerjaan_ayah', TRUE),
            'no_hp'             => $this->input->post('no_hp', TRUE),
            'id_alamat'         => $id_alamat
        );

        $this->db->insert('tb_orangtua', $data);
        return $this->db->insert_id();
    }

    private function _input_data_alamat()
    {
        $data = array(
            'dusun'     => $this->input->post('dusun', TRUE),
            'desa'      => $this->input->post('desa', TRUE),
            'kecamatan' => $this->input->post('kecamatan', TRUE),
            'kabupaten' => $this->input->post('kabupaten', TRUE)
        );

        $this->db->insert('tb_alamat', $data);
        return $this->db->insert_id();
    }

    private function _input_user()
    {
        $date = date_create($this->input->post('tanggal_lahir', TRUE));
        $dateFormat = date_format($date, "mY");
        $data = array(
            'username'  => $this->input->post('nis', TRUE),
            'password'  => MD5($dateFormat),
            'level'     => 'siswa',
            'status'    => '1'
        );

        $this->db->insert('tb_user', $data);
        return $this->db->insert_id();
    }

    var $column_order = array(null, 'tb_siswa.nis', 'tb_siswa.nisn', 'tb_siswa.nama', 'tb_siswa.tanggal_lahir', 'tb_siswa.agama', 'tb_siswa.jenis_kelamin'); //Sesuaikan dengan field
    var $column_search = array('tb_siswa.nis', 'tb_siswa.nisn', 'tb_siswa.nama'); //field yang diizin untuk pencarian 
    var $order = array('tb_kelas.kelas' => 'asc'); // default order 

    private function _get_datatables_query()
    {

        $this->db->select('*');
        $this->db->from('tb_siswa');
        $this->db->join('tb_orangtua', 'tb_siswa.id_orangtua = tb_orangtua.id_orangtua', 'left');
        $this->db->join('tb_alamat', 'tb_orangtua.id_alamat = tb_alamat.id_alamat', 'left');

        $i = 0;

        foreach ($this->column_search as $item) // looping awal
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

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from('tb_siswa');
        return $this->db->count_all_results();
    }
}
