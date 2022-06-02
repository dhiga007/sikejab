<?php
class Hasil_model extends CI_Model {
    
    protected $table = 'tb_hasil';
    protected $kode = 'id';
    
    public function tampil( $search='')
    {                
        $this->db->like( 'nama_alternatif', $search );
        $this->db->or_like( 'ranking',  $search );
        $this->db->join('tb_alternatif', 'tb_alternatif.kode_alternatif=tb_hasil.kode_alternatif');
        // $this->db->order_by( 'tb_alternatif.kode_alternatif' );
        $this->db->order_by('ranking','asc');
        $this->db->limit(5);
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function tampil_array($search=''){
        $rows = $this->tampil($search);
        $arr = array();
        foreach($rows as $row){
            $arr[$row->kode_alternatif][$row->id] = $row;
        }
        return $arr;
    }

}