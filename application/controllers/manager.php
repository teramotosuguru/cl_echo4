<?php

use libraries\checker;
require_once(dirname(__file__) . "/../libraries/checker.php");
require_once(dirname(__file__) . "/../libraries/text_builder.php");
require_once(dirname(__file__) . "/../models/history_repository.php");

class Manager extends CI_Controller {

    /**
     * トップページ
     */
    public function top()
    {
        $this->view['data'] = $histores;
        $this->load->view('top', $this->view);
    }

    /**
     * 文字列をそのまま吐き出す
     */
    public function normal($str="")
    {
        // チェック
        $checker = new libraries\checker\Checker($str);
        if(!$checker->checkEmpty($str)){
            return $this->load->view('error', "");
        }

        // Textクラスを生成
        $builder = new Text_Builder();

        // リポジトリクラス作成
        $repository = new HistoryRepository();

        // 変換処理
        $text = $builder->build($str, __FUNCTION__);

        // 保存
        $repository->save($text);

        $this->view['data'] = $text;
        $this->load->view('result', $this->view);

    }

    /**
     * 大文字に変換
     */
    public function bigecho($str="")
    {
        // チェック
        $checker = new libraries\checker\Checker($str);

        if(!$checker->checkEmpty($str) || !$checker->checkWithNum($str) || !$checker->checkAlphanumeric($str)){
            return $this->load->view('error', "");
        }

        // Textクラスを生成
        $builder = new Text_Builder();

        // リポジトリクラス作成
        $repository = new HistoryRepository();

        // 変換処理
        $text = $builder->build($str, __FUNCTION__);

        // 保存
        $repository->save($text);

        $this->view['data'] = $text;
        $this->load->view('result', $this->view);
    }

    /**
     * 小文字に変換
     */
    public function smallecho($str="")
    {
        // チェック
        $checker = new libraries\checker\Checker($str);

        if(!$checker->checkEmpty($str) || !$checker->checkWithNum($str) || !$checker->checkAlphanumeric($str)){
            return $this->load->view('error', "");
        }

        // Textクラスを生成
        $builder = new Text_Builder();

        // リポジトリクラス作成
        $repository = new HistoryRepository();

        // 変換処理
        $text = $builder->build($str, __FUNCTION__);

        // 保存
        $repository->save($text);

        $this->view['data'] = $text;
        $this->load->view('result', $this->view);
    }

    /**
     * キャメルに変換
     */
    public function camelecho($str="")
    {
        // チェック
        $checker = new libraries\checker\Checker($str);
        if(!$checker->checkEmpty($str) || !$checker->checkWithNum($str) || !$checker->checkAlphanumeric($str)){
            return $this->load->view('error', "");
        }

        // Textクラスを生成
        $builder = new Text_Builder();

        // リポジトリクラス作成
        $repository = new HistoryRepository();

        // 変換処理
        $text = $builder->build($str, __FUNCTION__);

        // 保存
        $repository->save($text);

        $this->view['data'] = $text;
        $this->load->view('result', $this->view);
    }

    /**
     * スネークに変換
     */
    public function snakeecho($str="")
    {
        // チェック
        $checker = new libraries\checker\Checker($str);
        if(!$checker->checkEmpty($str) || !$checker->checkWithNum($str) || !$checker->checkAlphanumeric($str)){
            return $this->load->view('error', "");
        }

        // Textクラスを生成
        $builder = new Text_Builder();

        // リポジトリクラス作成
        $repository = new HistoryRepository();

        // 変換処理
        $text = $builder->build($str, __FUNCTION__);

        // 保存
        $repository->save($text);

        $this->view['data'] = $text;
        $this->load->view('result', $this->view);
    }

    /**
     * 履歴を表示
     */
    public function history()
    {
        // リポジトリクラス作成
        $repository = new HistoryRepository();
        // 履歴全件取得
        $histores = $repository->findAll();

        $this->view['data'] = $histores;
        $this->load->view('results', $this->view);
    }

    /**
     * 入力履歴を表示
     */
    public function historyecho($no = "")
    {

        // チェック
        $checker = new libraries\checker\Checker($no);
        if( !$checker->checkNum($no)){
            return $this->load->view('error', "");
        }

        // リポジトリクラス作成
        $repository = new HistoryRepository();

        // 履歴を一件取得
        $histores = $repository->findById($no);

        $this->view['data'] = $histores;
        $this->load->view('results', $this->view);

    }
}