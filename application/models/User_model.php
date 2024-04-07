<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function get($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }

    public function update($table, $pk, $id, $data)
    {
        $this->db->where($pk, $id);
        return $this->db->update($table, $data);
    }

    public function insert($table, $data, $batch = false)
    {
        return $batch ? $this->db->insert_batch($table, $data) : $this->db->insert($table, $data);
    }

    public function delete($table, $pk, $id)
    {
        return $this->db->delete($table, [$pk => $id]);
    }

    public function getFieldWhere($table,$field,$where)
    {
        $this->db->select($field);
        return $this->db->get_where($table, $where)->result_array();
    }

    public function getFieldWhere1($table,$field,$where)
    {
        $this->db->select($field);
        return $this->db->get_where($table, $where)->result();
    }

    public function getFieldWhereD($table,$field,$where)
    {
        $this->db->select($field);
        $this->db->distinct();
        return $this->db->get_where($table, $where)->result_array();
    }

    public function getFieldD($table,$field)
    {
        $this->db->select($field);
        $this->db->distinct();
        return $this->db->get($table)->result_array();
    }

    public function getUsers($id)
    {
        /**
         * ID disini adalah untuk data yang tidak ingin ditampilkan. 
         * Maksud saya disini adalah 
         * tidak ingin menampilkan data user yang digunakan, 
         * pada managemen data user
         */
        $this->db->where('id_user !=', $id);
        return $this->db->get('user')->result_array();
    }

    public function getMax($table, $field, $kode = null)
    {
        $this->db->select_max($field);
        if ($kode != null) {
            $this->db->like($field, $kode, 'after');
        }
        return $this->db->get($table)->row_array()[$field];
    }

    public function count($table)
    {
        return $this->db->count_all($table);
    }

    public function countField($table,$field,$where)
    {
        $this->db->select($field);
        $this->db->where($where);
        $this->db->from($table);
        return $this->db->count_all_results();
    }

    public function countDistinct($table, $field)
    {
        $this->db->select($field);
        $this->db->distinct();
        $this->db->from($table);
        return $this->db->count_all_results();
    }

    public function sum($table, $field)
    {
        $this->db->select_sum($field);
        return $this->db->get($table)->row_array()[$field];
    }

    public function sumWhere($table, $field, $where)
    {
        $this->db->select_sum($field);
        return $this->db->get_where($table, $where)->row_array()[$field];
    }

    public function sumBerzakat()
    {
        $this->db->select('t_waktu as x');
        $this->db->select('sum(case when t_jenis in (1,2) then t_tanggungan else 0 end) as y');
        $this->db->group_by('x');
        return $this->db->get('tb_tunai')->result_array();
    }

    public function min($table, $field, $min)
    {
        $field = $field . ' <=';
        $this->db->where($field, $min);
        return $this->db->get($table)->result_array();
    }

    public function progressZF($i)
    {
        $this->db->select('t_rt');
        $this->db->select('count(distinct t_warga) as w');
        $this->db->select('sum(case when t_jenis in (1,2) then t_tanggungan else 0 end) as ak');
        // $this->db->group_by('t_rt');
        return $this->db->get_where('tb_tunai', ['t_rt' => $i])->result_array();
    }

    public function zfuTerkumpul($i)
    {
        $this->db->select('t_rt');
        $this->db->select('count(distinct t_warga) as w');
        $this->db->select_sum('t_total');
        $this->db->select('sum(case when t_jenis in (1,2) then t_tanggungan else 0 end) as ak');
        // $this->db->group_by('t_rt');
        return $this->db->get_where('tb_tunai', ['t_jenis' => 1, 't_rt' => $i])->result_array();
    }

    public function zfbTerkumpul($i)
    {
        $this->db->select('t_rt');
        $this->db->select('count(distinct t_warga) as w');
        $this->db->select_sum('t_total');
        $this->db->select('sum(case when t_jenis in (1,2) then t_tanggungan else 0 end) as ak');
        // $this->db->group_by('t_rt');
        return $this->db->get_where('tb_tunai', ['t_jenis' => 2, 't_rt' => $i])->result_array();
    }

    public function keluargaZRT($i)
    {
        // $this->db->select('t_rt');
        // $this->db->select('count(distinct t_warga) as w');
        $this->db->select('t_warga');
        $this->db->distinct();
        $this->db->where(['t_rt' => $i]);
        $this->db->from('tb_tunai');
        return $this->db->count_all_results();
    }

    public function muzakkiZRT($i)
    {
        // $this->db->select('t_rt');
        $this->db->select('sum(case when t_jenis in (1,2) then t_tanggungan else 0 end) as ak', FALSE);
        // $this->db->from('tb_tunai');
        // return $this->db->get()->result();
        // $this->db->select_sum('t_tanggungan');
        // $this->db->where(['t_rt' => $i]);
        // $this->db->where('CASE WHEN t_jenis in (1,2)');
        // $this->db->group_by('t_rt');
        // $this->db->where(['t_rt' => $i]);
        return $this->db->get_where('tb_tunai', ['t_rt' => $i])->result_array();
    }

    public function chartPembelian($bulan)
    {
        $like = 'KT-PB-' . date('y') . $bulan;
        $this->db->like('pembelian_id', $like, 'after');
        return count($this->db->get('pembelian')->result_array());
    }

    public function chartPenjualan($bulan)
    {
        $like = 'KT-PJ-' . date('y') . $bulan;
        $this->db->like('penjualan_id', $like, 'after');
        return count($this->db->get('penjualan')->result_array());
    }

    public function laporan($table, $mulai, $akhir)
    {
        $tgl = $table == 'pembelian' ? 'tanggal' : 'tanggal';
        $this->db->where($tgl . ' >=', $mulai);
        $this->db->where($tgl . ' <=', $akhir);
        return $this->db->get($table)->result_array();
    }

    public function cekwarga($id)
    {
        return $this->db->get_where('tb_warga', ['w_nama' => $id])->row_array();
    }

    public function cekjenis($id)
    {
        $this->db->join('tb_alat', 'j_alat = a_id');
        return $this->db->get_where('tb_jenis', ['j_id' => $id])->row_array();
    }
}
