<?php
class Tahun_model extends CI_Model
{
    public function get_data()
    {
        return $this->db->get('tb_tahunajaran')->result();
    }

    public function get_data_groupname()
    {
        $this->db->group_by('nama');
        return $this->db->get('tb_tahunajaran')->result();
    }

    public function get_name_data()
    {
        $this->db->select('tt.nama');
        $this->db->from('tb_tahunajaran tt');
        $this->db->group_by('tt.nama');
        return $this->db->get()->result();
    }

    public function get_detail_data($id)
    {
        return $this->db->get_where('tb_tahunajaran', ['id_tahun' => $id])->row_array();
    }

    public function get_active_stats()
    {
        $data = $this->db->get('tb_tahunajaran')->num_rows();
        if ($data > 0) {
            $this->db->order_by('nama', 'desc');
            return $this->db->get_where('tb_tahunajaran', ['status' => '1'])->row_array();
        } else {
            return NULL;
        }
    }

    public function get_id_year($name)
    {
        $this->db->select('id_tahun');
        $this->db->where('nama', $name);
        return $this->db->get('tb_tahunajaran')->result();
    }

    public function input_data()
    {
        $data_ganjil = array(
            'nama'         => $this->input->post('nama', TRUE),
            'semester'     => 'Ganjil'
        );

        $data_genap = array(
            'nama'         => $this->input->post('nama', TRUE),
            'semester'     => 'Genap'
        );

        $this->db->insert('tb_tahunajaran', $data_ganjil);
        $this->db->insert('tb_tahunajaran', $data_genap);
    }

    public function edit_data($id)
    {
        $data = array(
            'nama'      => $this->input->post('nama', TRUE),
            'semester'  => $this->input->post('semester', TRUE),
            'status'    => $this->input->post('status', TRUE),
            'shared'    => $this->input->post('shared', TRUE),
        );

        if ($data['status'] == '0') {
            $this->db->where('id_tahun', $id);
            $this->db->update('tb_tahunajaran', $data);
        } else {
            $this->db->update('tb_tahunajaran', ['status' => '0']);

            $this->db->where('id_tahun', $id);
            $this->db->update('tb_tahunajaran', $data);
        }
    }

    public function delete_data($id)
    {
        $this->db->delete('tb_tahunajaran', ['id_tahun' => $id]);
    }

    var $column_order = array(null, 'nama', 'semester', 'shared', 'status',); //Sesuaikan dengan field
    var $column_search = array('nama'); //field yang diizin untuk pencarian 
    var $order = array('nama' => 'asc'); // default order 

    private function _get_datatables_query()
    {

        $this->db->from('tb_tahunajaran');

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
        $this->db->from('tb_tahunajaran');
        return $this->db->count_all_results();
    }
}
