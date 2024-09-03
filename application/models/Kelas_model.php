<?php
class Kelas_model extends CI_Model
{
    // public function get_data()
    // {
    //     $this->db->from('tb_kelas tk');
    //     $this->db->join('tb_pengajar tp', 'tp.id_kelas = tk.id_kelas', 'inner');
    //     $this->db->join('tb_tahunajaran tt', 'tt.id_tahun = tp.id_tahun', 'inner');
    //     $this->db->where('tt.status', '1');
    //     $this->db->order_by('tk.kelas', 'asc');
    //     $this->db->group_by('tk.id_kelas');
    //     return $this->db->get()->result();
    // }

    public function get_data()
    {
        $this->db->from('tb_kelas');
        $this->db->order_by('kelas', 'asc');
        return $this->db->get()->result();
    }

    public function get_like_data($query)
    {
        $this->db->like('kelas', $query, 'both');
        return $this->db->get('tb_kelas');
    }

    public function get_like_walikelas($query)
    {
        $this->db->like('wali_kelas', $query, 'both');
        return $this->db->get('tb_kelas')->row_array();
    }

    public function get_kelas_with_name($name)
    {
        return $this->db->get_where('tb_kelas', ['wali_kelas' => $name])->result();
    }

    public function get_count()
    {
        return $this->db->get('tb_kelas')->num_rows();
    }

    public function get_detail_data($id)
    {
        return $this->db->get_where('tb_kelas', ['id_kelas' => $id])->row_array();
    }

    public function get_detail_siswa($id, $tahun)
    {
        $tahun = ($tahun) ? $tahun['nama'] : 'null';
        $this->db->from('tb_datasiswa td');
        $this->db->join('tb_kelas tk', 'tk.id_kelas = td.id_kelas', 'inner');
        $this->db->where('td.id_siswa', $id);
        $this->db->where('td.tahun_ajaran', $tahun);
        return $this->db->get()->row_array();
    }

    public function get_id_kelas()
    {
        $kelas = $this->input->post('kelas', TRUE);
        $this->db->select('id_kelas');
        $this->db->where('kelas', $kelas);
        $row = $this->db->get('tb_kelas')->row();
        return $row->id_kelas;
    }

    public function input_data()
    {
        $guru = explode("-", $this->input->post('wali_kelas', TRUE));
        $wali_kelas = $guru[0];
        $id_user = $guru[1];

        $data = array(
            'kelas'         => $this->input->post('kelas', TRUE),
            'wali_kelas'    => $wali_kelas,
        );
        $dataUser = array(
            'level'     => 'wali kelas'
        );

        $this->db->insert('tb_kelas', $data);

        $this->db->where('id_user', $id_user);
        $this->db->update('tb_user', $dataUser);
    }

    public function edit_data($id, $id_old_user)
    {
        $guru = explode("-", $this->input->post('wali_kelas', TRUE));
        $wali_kelas = $guru[0];
        $id_user = $guru[1];

        $data = array(
            'kelas'         => $this->input->post('kelas', TRUE),
            'wali_kelas'    => $wali_kelas,
        );

        $dataUser = array(
            'level'     => 'wali kelas'
        );

        $dataOldUser = array(
            'level'     => 'guru'
        );

        $this->db->where('id_user', $id_old_user);
        $this->db->update('tb_user', $dataOldUser);

        $this->db->where('id_kelas', $id);
        $this->db->update('tb_kelas', $data);

        $this->db->where('id_user', $id_user);
        $this->db->update('tb_user', $dataUser);
    }

    public function delete_data($id)
    {
        $detail     = $this->get_detail_data($id);
        $guru       = $this->db->get_where('tb_guru', ['nama' => $detail['wali_kelas']])->row_array();
        $dataUser   = array('level' => 'guru');

        $this->db->where('id_user', $guru['id_user']);
        $this->db->update('tb_user', $dataUser);

        $this->db->delete('tb_kelas', ['id_kelas' => $id]);
    }

    public function delete_walikelas($nama)
    {
        $data = array(
            'wali_kelas'    => NULL,
        );

        $this->db->where('wali_kelas', $nama);
        $this->db->update('tb_kelas', $data);
    }

    var $column_order = array(null, 'kelas', 'wali_kelas'); //Sesuaikan dengan field
    var $column_search = array('kelas', 'wali_kelas'); //field yang diizin untuk pencarian 
    var $order = array('kelas' => 'asc'); // default order 

    private function _get_datatables_query()
    {

        $this->db->from('tb_kelas');
        $this->db->order_by('kelas', 'asc');

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
        $this->db->from('tb_kelas');
        return $this->db->count_all_results();
    }
}
