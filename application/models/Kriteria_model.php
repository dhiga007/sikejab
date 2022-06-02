<?php
class Kriteria_model extends CI_Model {
    
    protected $table = 'tb_kriteria';
    protected $kode = 'kode_kriteria';
    
    public function tampil( $search='')
    {                
        $this->db->like( 'nama_aspek', $search );
        $this->db->or_like( 'nama_kriteria', $search );
        $this->db->join('tb_aspek', 'tb_aspek.kode_aspek=tb_kriteria.kode_aspek');
        $this->db->order_by( 'tb_aspek.kode_aspek' );
        $this->db->order_by('kode_kriteria');
        $query = $this->db->get($this->table);
        return $query->result();
    }
    
    public function tampil_array($search=''){
        $rows = $this->tampil($search);
        $arr = array();
        foreach($rows as $row){
            $arr[$row->kode_aspek][$row->kode_kriteria] = $row;
        }
        return $arr;
    }
    
    public function get_kriteria_by_aspek($kode_aspek)
    {        
        $this->db->where( array('kode_aspek' => $kode_aspek));  
        $this->db->order_by('nilai_kriteria');      
        $query = $this->db->get($this->table);
        return $query->result();
    }
    
    public function get_kriteria( $ID = null )
    {
        $query = $this->db->get_where($this->table, array ( $this->kode => $ID ));                
        return $query->row();
    }
            
    public function tambah($fields)
    {
        $this->db->insert($this->table, $fields);  
        $this->db->query("INSERT INTO tb_profile(kode_alternatif, kode_aspek, kode_kriteria, nilai) 
            SELECT kode_alternatif, '$fields[kode_aspek]', '$fields[kode_kriteria]', 0  FROM tb_alternatif");       
    }
    
    public function ubah($fields, $ID)
    {                          
        $this->db->update($this->table, $fields, array($this->kode => $ID));                  
    }
    
    public function hapus( $ID )
    {
        $this->db->delete($this->table, array($this->kode=> $ID));
        $this->db->delete('tb_profile', array($this->kode=> $ID));
    }
}