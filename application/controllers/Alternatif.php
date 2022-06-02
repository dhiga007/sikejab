<?php
class Alternatif extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('alternatif_model');           
    }

    public function index()
    {      
        $data['rows'] = $this->alternatif_model->tampil($this->input->get('search'));
        $data['title'] = 'Alternatif';

        load_view('alternatif/tampil', $data);
    }
    
    public function tambah() 
    {            
        $this->form_validation->set_rules( 'kode_alternatif', 'Kode Alternatif', 'required|is_unique[tb_alternatif.kode_alternatif]' );
        $this->form_validation->set_rules( 'nama_alternatif', 'Nama Alternatif', 'required' );
        $this->form_validation->set_rules( 'keterangan', 'Keterangan' );
        
        $data['title'] = 'Tambah Alternatif';
        
        if ($this->form_validation->run() === FALSE)
        {
            load_view('alternatif/tambah', $data);     
        }
        else
        {
            $fields = array(
                'kode_alternatif' => $this->input->post('kode_alternatif'),
                'nama_alternatif' => $this->input->post('nama_alternatif'),
                'keterangan' => $this->input->post('keterangan'),
            );
            $this->alternatif_model->tambah($fields);
            redirect('alternatif');
        }                        
    }
            
    public function ubah( $ID = null )
    {                     
        $this->form_validation->set_rules( 'nama_alternatif', 'Nama Alternatif', 'required' );
        $this->form_validation->set_rules( 'keterangan', 'Keterangan', 'required' );
        
        $data['title'] = 'Ubah Alternatif';
        
        if ($this->form_validation->run() === FALSE)
        {
            $data['row'] = $this->alternatif_model->get_alternatif($ID);
            load_view('alternatif/ubah', $data);      
        }
        else
        {
            $fields = array(                    
                'nama_alternatif' => $this->input->post('nama_alternatif'),
                'keterangan' => $this->input->post('keterangan'),
            );
            $this->alternatif_model->ubah($fields, $ID);
            redirect('alternatif');
        }            
    }
    
    public function hapus( $ID = null )
    {
        $this->alternatif_model->hapus($ID);
        redirect('alternatif');
    }
    
    public function cetak( $search ='' )
    {
        $data['rows'] = $this->alternatif_model->tampil($search);
        load_view_cetak('alternatif/cetak', $data);
    }
}