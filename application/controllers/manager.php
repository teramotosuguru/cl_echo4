<?php

class Manager extends CI_Controller {

    /**
    * 文字列をそのまま吐き出す
    */
    public function normal($str="")
    {
        $this->load->library('checker');
        $this->load->library('text_builder');
        
        $checker = new Checker($str);

        var_dump($checker->check_empty());
        var_dump($checker->check_num());
        var_dump($checker->check_alphanumeric());

        // Textクラスを生成
        $builder = new Text_Builder();
        $builder->build($str, __FUNCTION__);
        var_dump($builder->get_text());


        $this->load->view('welcome_message');
    }

    /**
    * 大文字に変換
    */
    public function bigecho($str="")
    {
        $this->load->library('checker');
        $this->load->library('text_builder');
        
        $this->load->view('welcome_message');
    }

    /**
    * 小文字に変換
    */
    public function smallecho($str="")
    {
        $this->load->library('checker');
        $this->load->library('text_builder');
 
        $this->load->view('welcome_message');
    }

    /**
    * キャメルに変換
    */
    public function camelecho($str="")
    {
        $this->load->library('checker');
        $this->load->library('text_builder');
 
        $this->load->view('welcome_message');
    }

    /**
    * スネークに変換
    */
    public function snakeecho($str="")
    {
        $this->load->library('checker');
        $this->load->library('text_builder');
 
        $this->load->view('welcome_message');
    }

    /**
    * 履歴を表示
    */
    public function history($str="")
    {
        $this->load->library('checker');
        $this->load->library('text_builder');
 
        $this->load->view('welcome_message');
    }


    /**
    * 入力履歴を表示
    */
    public function historyecho($no)
    {
        $this->load->library('checker');
        $this->load->library('text_builder');
 
        $this->load->view('welcome_message');
    }
}