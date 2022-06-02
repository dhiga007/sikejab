<?php

Class Fungsi {

    protected $ci;

    function __construct() {
            $this->ci =& get_instance();
    }

    function user_login() {
        $this->ci->load->model('user_model');
        $user_ID = $this->ci->session->userdata('iduser');
        $user_data = $this->ci->user_model->get($user_ID)->row();
        return $user_data;
    }
   
    public function count_kriteria() {
        $this->ci->load->model('kriteria_model');
        return $this->ci->kriteria_model->get()->num_rows();
    }
    public function count_aspek() {
        $this->ci->load->model('aspek_model');
        return $this->ci->aspek_m->get()->num_rows();
    }
   
    
}