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

    public function getBarang()
    {
        // $this->db->join('jenis j', 'b.jenis_id = j.jenis_id');
        $this->db->join('satuan s', 'b.satuan_id = s.satuan_id');
        // $this->db->join('stock st', 'st.stock_id');
        $this->db->order_by('barang_id');
        return $this->db->get('barang b')->result_array();
    }

    public function getPembelian($limit = null, $barang_id = null, $range = null)
    {
        $this->db->select('*');
        $this->db->join('user u', 'pb.id_user = u.id_user');
        $this->db->join('supplier sp', 'pb.supplier_id = sp.supplier_id');
        $this->db->join('barang b', 'pb.barang_id = b.barang_id');
        // $this->db->join('stock st', '.stock_id')
        $this->db->join('satuan s', 'b.satuan_id = s.satuan_id');
        if ($limit != null) {
            $this->db->limit($limit);
        }

        if ($barang_id != null) {
            $this->db->where('barang_id', $barang_id);
        }

        if ($range != null) {
            $this->db->where('tanggal' . ' >=', $range['mulai']);
            $this->db->where('tanggal' . ' <=', $range['akhir']);
        }

        $this->db->order_by('pembelian_id', 'DESC');
        return $this->db->get('pembelian pb')->result_array();
    }

    public function getPenjualan($limit = null, $barang_id = null, $range = null)
    {
        $this->db->select('*');
        $this->db->join('user u', 'pj.id_user = u.id_user');
        $this->db->join('barang b', 'pj.barang_id = b.barang_id');
        $this->db->join('satuan s', 'b.satuan_id = s.satuan_id');
        if ($limit != null) {
            $this->db->limit($limit);
        }
        if ($barang_id != null) {
            $this->db->where('barang_id', $barang_id);
        }
        if ($range != null) {
            $this->db->where('tanggal' . ' >=', $range['mulai']);
            $this->db->where('tanggal' . ' <=', $range['akhir']);
        }
        $this->db->order_by('penjualan_id', 'DESC');
        return $this->db->get('penjualan pj')->result_array();
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

    public function sum($table, $field)
    {
        $this->db->select_sum($field);
        return $this->db->get($table)->row_array()[$field];
    }

    public function min($table, $field, $min)
    {
        $field = $field . ' <=';
        $this->db->where($field, $min);
        return $this->db->get($table)->result_array();
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

    public function cekStock($id)
    {
        $this->db->join('satuan s', 'b.satuan_id = s.satuan_id');
        return $this->db->get_where('barang b', ['barang_id' => $id])->row_array();
    }
}
