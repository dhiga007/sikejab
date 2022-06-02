<?php
class Kriteria extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kriteria_model');   
        $this->load->model('aspek_model');           
    }

    public function index()
    {      
        $data['rows'] = $this->kriteria_model->tampil($this->input->get('search'));
        $data['title'] = 'Data kriteria';

        load_view('kriteria/tampil', $data);
    }
    
    public function tambah() 
    {            
        $this->form_validation->set_rules( 'kode_aspek', 'Aspek', 'required' );
        $this->form_validation->set_rules( 'kode_kriteria', 'Kode', 'required|is_unique[tb_kriteria.kode_kriteria]' );
        $this->form_validation->set_rules( 'nama_kriteria', 'Nama kriteria', 'required' );
        $this->form_validation->set_rules( 'nilai_kriteria', 'Nilai', 'required|is_natural_no_zero' );
        $this->form_validation->set_rules( 'factor', 'Factor', 'required' );
        
        $data['title'] = 'Tambah kriteria';
        
        if ($this->form_validation->run() === FALSE)
        {
            load_view('kriteria/tambah', $data);     
        }
        else
        {
            $fields = array(
                'kode_aspek' => $this->input->post('kode_aspek'),
                'kode_kriteria' => $this->input->post('kode_kriteria'),
                'nama_kriteria' => $this->input->post('nama_kriteria'),
                'nilai_kriteria' => $this->input->post('nilai_kriteria'),
                'factor' => $this->input->post('factor'),
            );
            $this->kriteria_model->tambah($fields);
            redirect('kriteria');
        }                        
    }
            
    public function ubah( $ID = null )
    {                     
        $this->form_validation->set_rules( 'kode_aspek', 'Aspek', 'required' );
        $this->form_validation->set_rules( 'nama_kriteria', 'Nama kriteria', 'required' );
        $this->form_validation->set_rules( 'nilai_kriteria', 'Nilai', 'required|is_natural_no_zero' );
        $this->form_validation->set_rules( 'factor', 'Factor', 'required' );
        
        $data['title'] = 'Ubah kriteria';
        
        if ($this->form_validation->run() === FALSE)
        {
            $data['row'] = $this->kriteria_model->get_kriteria($ID);
            load_view('kriteria/ubah', $data);      
        }
        else
        {
            $fields = array(
                'kode_aspek' => $this->input->post('kode_aspek'),
                'kode_aspek' => $this->input->post('kode_aspek'),
                'nama_kriteria' => $this->input->post('nama_kriteria'),
                'nilai_kriteria' => $this->input->post('nilai_kriteria'),
                'factor' => $this->input->post('factor'),
            );
            $this->kriteria_model->ubah($fields, $ID);
            redirect('kriteria');
        }            
    }
    
    public function hapus( $ID = null )
    {
        $this->kriteria_model->hapus($ID);
        redirect('kriteria');
    }
    
    public function cetak( $search ='' )
    {
        $data['rows'] = $this->kriteria_model->tampil($search);
        load_view_cetak('kriteria/cetak', $data);
    }
}