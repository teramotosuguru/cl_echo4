<?php

class Welcome2 extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        $this->load->database();
        $this->load->model('T_tests');
        $test_text = $this->T_tests->get_text();
        $test_count = $this->T_tests->get_count();
        var_dump($test_count);
        $this->view['_'] = array('message' => $test_text);
        $this->load->view('welcome2', $this->view);
    }
}


function __destruct(){
    $this->db->close();
}