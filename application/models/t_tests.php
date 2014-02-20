<?php
class T_tests extends CI_Model
{

    public function get_text()
    {
        return "はろー！はろー！はろーわーるど！";
    }

    public function get_count() {
        $sql = "SELECT * FROM t_tests";

        $params = array();
        $res = $this->db->query($sql, $params)->result();

        return $res;
    }

}