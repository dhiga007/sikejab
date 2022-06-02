<?php
class Aspek extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('aspek_model');           
    }

    public function index()
    {      
        $data['rows'] = $this->aspek_model->tampil($this->input->get('search'));
        $data['title'] = 'Data aspek';

        load_view('aspek/tampil', $data);
    }
    
    public function tambah() 
    {            
        $this->form_validation->set_rules( 'kode_aspek', 'Kode', 'required|is_unique[tb_aspek.kode_aspek]' );
        $this->form_validation->set_rules( 'nama_aspek', 'Nama', 'required' );
        $this->form_validation->set_rules( 'persen', 'Persentase', 'required' );
        
        $data['title'] = 'Tambah aspek';
        
        if ($this->form_validation->run() === FALSE)
        {
            load_view('aspek/tambah', $data);     
        }
        else
        {
            $fields = array(
                'kode_aspek' => $this->input->post('kode_aspek'),
                'nama_aspek' => $this->input->post('nama_aspek'),
                'persen' => $this->input->post('persen'),
            );
            $this->aspek_model->tambah($fields);
            redirect('aspek');
        }                        
    }
            
    public function ubah( $ID = null )
    {                     
        $this->form_validation->set_rules( 'nama_aspek', 'Nama', 'required' );
        $this->form_validation->set_rules( 'persen', 'Persentase', 'required' );  
        
        $data['title'] = 'Ubah aspek';
        
        if ($this->form_validation->run() === FALSE)
        {
            $data['row'] = $this->aspek_model->get_aspek($ID);
            load_view('aspek/ubah', $data);      
        }
        else
        {
            $fields = array(                    
                'nama_aspek' => $this->input->post('nama_aspek'),
                'persen' => $this->input->post('persen'),
            );
            $this->aspek_model->ubah($fields, $ID);
            redirect('aspek');
        }            
    }
    
    public function hapus( $ID = null )
    {
        $this->aspek_model->hapus($ID);
        redirect('aspek');
    }
    
    public function cetak( $search ='' )
    {
        $data['rows'] = $this->aspek_model->tampil($search);
        load_view_cetak('aspek/cetak', $data);
    }
}