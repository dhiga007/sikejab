<?php
class Relasi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
                    
        $this->load->model('aspek_model');
        $this->load->model('relasi_model');
        $this->load->model('alternatif_model');            
        $this->load->model('kriteria_model');            
    }

    public function index()
    {                          
        $data['kode_aspek'] = $this->input->get('kode_aspek');
        $data['alternatif'] = $this->alternatif_model->tampil_array($this->input->get('search'));
        $data['kriteria'] = $this->kriteria_model->tampil_array();
        $data['relasi'] = $this->relasi_model->tampil($data['kode_aspek'], $this->input->get('search'));                                  
       

        load_view('relasi', $data);
    }
                    
    public function ubah( $ID = null )
    {
        $data['kode_aspek'] = $this->input->get('kode_aspek');           

        $this->form_validation->set_rules( 'nilai[]', 'Nilai', 'required|is_natural' );            
        $data['title'] = 'Ubah profil ';
        
        if ($this->form_validation->run() === FALSE)
        {
            $data['rows'] = $this->relasi_model->get_relasi($data['kode_aspek'], $ID);
            
            if($data['rows']) 
            {                    
                $data['title'] .= $data['rows'][0]->nama_alternatif;
            }
            
            load_view('relasi_ubah', $data);     
        }
        else
        {
            $this->relasi_model->ubah( $this->input->post('nilai') );
            redirect('relasi?kode_aspek='.$data['kode_aspek']);
        }            
    }
}