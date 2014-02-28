<?php

use libraries\checker;
require_once(dirname(__file__) . "/../libraries/checker.php");

class Manager extends CI_Controller {

    /**
    * 文字列をそのまま吐き出す
    */
    public function normal($str="")
    {
        /*チェックするよお*/
        $checker = new libraries\checker\Checker();
        var_dump($checker->checkEmpty());
        var_dump($checker->checkNum());
        var_dump($checker->checkAlphanumeric());


        $this->load->library('text_builder');
        // Textクラスを生成
        $builder = new Text_Builder();
        $tex = $builder->build($str, __FUNCTION__);
        var_dump($tex->get_text());

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