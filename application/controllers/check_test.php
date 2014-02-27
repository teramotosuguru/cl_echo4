<?php

class Check_test extends CI_Controller {

    public function normal_echo($str="")
    {
        $this->load->library('checker');
        $this->load->library('text_builder');
        
        $checker = new Checker($str);

        var_dump($checker->check_empty());
        var_dump($checker->check_num());
        var_dump($checker->check_alphanumeric());

        // テキストクラスを生成
        $builder = new Text_Builder();
        $builder->build($str, __FUNCTION__);
        var_dump($builder->get_text());

        $this->load->view('welcome_message');
    }
}