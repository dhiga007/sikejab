<?php
class Relasi_model extends CI_Model {

    public function tampil($kode_aspek, $search = '')
    {                           
        $rows = $this->db->query("SELECT r.*, a.nama_alternatif
        FROM tb_profile r            
            INNER JOIN tb_alternatif a ON a.kode_alternatif=r.kode_alternatif     
            INNER JOIN tb_kriteria k ON k.kode_kriteria=r.kode_kriteria       
        WHERE (a.kode_alternatif LIKE '%".$search."%' OR a.nama_alternatif LIKE '%".$search."%')
            AND k.kode_aspek='$kode_aspek'
        ORDER BY r.kode_alternatif, r.kode_kriteria")->result();
        
        $arr = array();
        foreach($rows as $row){
            $arr[$row->kode_alternatif][$row->kode_kriteria] = $row->nilai;
        }
        
        return $arr;
    }
    
    public function get_relasi($kode_aspek, $kode_alternatif) 
    {
        $query = $this->db->query("SELECT
            r.*, a.nama_alternatif, k.nama_kriteria
        FROM tb_profile r 
        	INNER JOIN tb_kriteria k ON k.kode_kriteria=r.kode_kriteria
            INNER JOIN tb_alternatif a ON a.kode_alternatif=r.kode_alternatif            
        WHERE a.kode_alternatif='$kode_alternatif' AND k.kode_aspek='$kode_aspek'
        ORDER BY r.kode_kriteria");
                
        return $query->result();
    }
                        
    public function ubah($nilai)
    {           
        foreach ($nilai as $key => $val){                   
            $this->db->update( 'tb_profile', array('nilai' =>$val), array('ID' => $key));   
        }                       
    }    
}