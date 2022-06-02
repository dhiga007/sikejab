<?php
class Aspek_model extends CI_Model {
    
    protected $table = 'tb_aspek';
    protected $kode = 'kode_aspek';
    
    public function tampil( $search='')
    {                
        $this->db->like( $this->kode, $search );
        $this->db->or_like( 'nama_aspek', $search );
        $this->db->order_by( $this->kode );
        $query = $this->db->get($this->table);
        return $query->result();
    }
    
    public function tampil_array($search=''){
        $rows = $this->tampil($search);
        $arr = array();
        foreach($rows as $row){
            $arr[$row->kode_aspek] = $row;
        }
        return $arr;
    }

    public function get_aspek( $ID = null )
    {
        $query = $this->db->get_where($this->table, array ( $this->kode => $ID ));                
        return $query->row();
    }
            
    public function tambah($fields)
    {
        $this->db->insert($this->table, $fields);            
    }
    
    public function ubah($fields, $ID)
    {                          
        $this->db->update($this->table, $fields, array($this->kode => $ID));                  
    }
    
    public function hapus( $ID )
    {
        $this->db->delete($this->table, array($this->kode=> $ID));
        $this->db->query("DELETE FROM tb_profile WHERE kode_kriteria IN (SELECT kode_kriteria FROM tb_kriteria WHERE kode_aspek='$ID')");
        $this->db->delete('tb_kriteria', array($this->kode=> $ID));
    }
}