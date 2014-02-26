<?php

require_once(dirname(__file__) . "../../../system/core/Model.php");
require_once(dirname(__file__) . "../../libraries/text_builder.php");

/**
 * ヒストリーリポジトリー
 */
class HistoryRepository extends CI_Model
{

    function __construct()
    {
    }

    /**
     * 登録されたテキストデータを全て取得
     *
     * @return $objectArray
     */
    public function findAll()
    {
        $sql = "SELECT * FROM t_texts";
        $params = array();
        $object =  $this->db->query($sql, $params)->result();
        $objectArray = array();
        foreach ( $object as $key => $value) {
            $objectArray["id"] = $value->id;
            $objectArray["text"] = $value->text;
        }
        return $objectArray;
    }

    /**
     * 登録されたテキストデータを一件取得
     *
     * @param $id
     * @return $objectArray
     */
    public function findById($id)
    {
        $sql = "SELECT * FROM t_texts WHERE id = ? ;";
        $params = array($id);
        $object = $this->db->query($sql, $params)->result();
        $objectArray = array();
        foreach ( $object as $key => $value) {
            $objectArray["id"] = $value->id;
            $objectArray["text"] = $value->text;
        }
        return $objectArray;
    }

    public function save($tex)
    {
        $data = array(
                "text" => $tex,
                "created" => date("Y-m-d H:i:s", time())
        );
        return $this->db->insert("t_texts", $data);
    }

}

class Histories
{
    private $histories;

    public function __construct($histories)
    {

    }

    public function getById($id)
    {

    }

    public function getAll()
    {

    }

}

class History extends text_builder
{
    private $id;
    private $text;

    public function __construct($input_text)
    {

    }

    public function getId($id)
    {

    }

    public function getText($text)
    {

    }

}