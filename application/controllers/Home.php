<?php
class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Hasil_model');   
        $this->load->model('Alternatif_model'); 
        $this->load->model('Aspek_model');
        $this->load->model('Kriteria_model'); 
    }

    public function index()
    {
        $data['title'] = 'Home';
        $data['alternatif']= $this->Alternatif_model->tampil($this->input->get('search'));
        $data['aspek']= $this->Aspek_model->tampil_array($this->input->get('search'));
        $data['kriteria']= $this->Kriteria_model->tampil_array($this->input->get('search'));
        $data['rows'] = $this->Hasil_model->tampil($this->input->get('search'));
       
        $this->load->view('headerbaru', $data);
        $this->load->view('home');
        $this->load->view('footerbaru');
    }
}
