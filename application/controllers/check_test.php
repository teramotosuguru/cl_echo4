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

        // ビルダーを生成
        $tex = new Text_Builder($str);
        // 関数名をセット
        $tex->set_param(__FUNCTION__);　// normalechoの場合はこいつを呼ばない

        var_dump($tex->get_text());


        $this->load->view('welcome_message');
    }
}