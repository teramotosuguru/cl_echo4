<?php

require_once(dirname(__file__) . "/../../system/core/Model.php");
require_once(dirname(__file__) . "/../libraries/text_builder.php");
/**
 * ヒストリーリポジトリー
 */
class HistoryRepository extends CI_Model
{

    function __construct() {}

    /**
     * 登録されたテキストデータを全て取得
     *
     * @return $histories
     */
    public function findAll()
    {
        $sql = "SELECT * FROM t_texts";
        $params = array();
        $object = $this->db->query($sql, $params)->result();
        $histories_tmp = array();
        $builder = new Text_Builder();

        foreach ( $object as $key => $value) {
            $histories_tmp[$value->id]  = new History($value->id,  $builder->build($value->text));
        }
        $histories = new Histories($histories_tmp);

        return $histories->getAll();

    }

    /**
     * 登録されたテキストデータを一件取得
     *
     * @param $id
     * @return $histories
     */
    public function findById($id)
    {
        $sql = "SELECT * FROM t_texts WHERE id = ? ";
        $params = array($id);
        $object = $this->db->query($sql, $params)->result();
        $histories_tmp = array();
        $builder = new Text_Builder();
        foreach ( $object as $key => $value) {
            $histories_tmp[$value->id]  = new History($value->id, $builder->build($value->text));
        }
        $histories = new Histories($histories_tmp);
        return array($histories->getById($id));
    }

    /**
     * 履歴を登録する
     *
     * @param $text
     * @return $boolean
     */
    public function save($text)
    {
//         $sql = "INSERT INTO  `t_texts` (`text` ,`created`) VALUES ( ?, ? ) ";
        $params = array(
                "text" => $text->getText(),
                "created" => date("Y-m-d H:i:s", time())
        );
        return $this->db->insert("t_texts", $params);
//         return $this->db->query($sql, $params);
    }

}

/**
 * ヒストリーズ
 */

class Histories
{
    private $histories;

    public function __construct($histories)
    {
        $this->histories= $histories;
    }

    /**
     * ヒストリーズを一件取得
     *
     * @param $id
     * @return $histories
     */
    public function getById($id)
    {
        return empty($this->histories[$id]) ?  "" : $this->histories[$id];
    }

    /**
     * ヒストリーズを全件取得
     *
     * @return $histories
     */
    public function getAll()
    {
        return $this->histories;
    }

}

/**
 * ヒストリー
 */

class History
{
    private $id;
    private $text;

    public function __construct($id, $text)
    {
        $this->id = $id;
        $this->text = $text;
    }

    /**
     * IDを取得
     *
     * @return $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * テキストを取得
     *
     * @return $text
     */
    public function getText()
    {
        return $this->text;
    }

}