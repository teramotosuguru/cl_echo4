<?php

class Check_test extends CI_Controller {

    public function normal_echo($str="")
    {
        $this->load->library('checker');
        $checker = new Checker($str);

        var_dump($checker->check_empty());
        var_dump($checker->check_num());
        var_dump($checker->check_alphanumeric());

        $this->load->view('welcome_message');
    }
}