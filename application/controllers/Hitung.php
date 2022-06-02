<?php
class Hitung extends CI_Controller
{

    protected $crips = array();
    protected $alternatif = array();
    protected $kriteria = array();
    protected $matriks = array();
    protected $normal = array();
    protected $hasil = array();
    protected $total = array();
    protected $rank = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->model('aspek_model');
        // $this->load->model('hitung_model');
        $this->load->model('kriteria_model');
        $this->load->model('alternatif_model');
        $this->load->model('relasi_model');
    }

    public function index()
    {
        $data['title'] = 'Perhitungan';
        $data['ALTERNATIF'] = $this->alternatif_model->tampil_array();
        $data['ASPEK'] = $this->aspek_model->tampil_array();
        $data['KRITERIA'] = $this->kriteria_model->tampil_array();
        $this->load->view('headerbaru', $data);
        $this->load->view('hitung');
        $this->load->view('footerbaru');
    }

    public function cetak()
    {
        $data['title'] = 'Perhitungan';
        $data['ALTERNATIF'] = $this->alternatif_model->tampil_array();
        $data['ASPEK'] = $this->aspek_model->tampil_array();
        $data['KRITERIA'] = $this->kriteria_model->tampil_array();

        load_view_cetak('hitung_cetak', $data);
    }
}
