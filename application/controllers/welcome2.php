<?php

class Welcome2 extends CI_Controller {

    public function index()
    {

        $this->load->model('T_tests');
        $test_text = $this->T_tests->get_text();
        $test_count = $this->T_tests->get_count();

        $this->view['_'] = array('message' => $test_text);
        $this->load->view('welcome2', $this->view);
    }
}