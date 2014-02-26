<?php
/**
 * チェッカークラス
 */
class Checker
{
    private $str;

    public function __construct($str="") {
        $this->str = $str;
    }

    public function check_empty() {
        $checker = new empty_check_builder($this->str);
        return $checker->check($this->str);
    }

    public function check_num() {
        $checker = new num_check_builder($this->str);
        return $checker->check($this->str);
    }

    public function check_alphanumeric() {
        $checker = new alphanumeric_check_builder($this->str);
        return $checker->check($this->str);
    }
}

/**
 * チェッカービルダー（抽象クラス）
 */
abstract class Check_builder
{
    abstract protected function check($str);
}

/**
 * 空チェック（問題なければtrue/空ならfalse）
 */
class Empty_check_builder extends check_builder
{
    public function check($str) {
        if(!empty($str)) {
            return true;
        } else {
            return false;
        }
    }
}

/**
 * 数字チェック（問題なければtrue/数字が含まれていればfalse）
 */
class Num_check_builder extends check_builder
{
    public function check($str)
    {
        if(preg_match("/[0-9]/", $str)){
            return false;
        } else {
            return true;
        }
    }
}

/**
 * 英数字チェック（問題なければtrue/記号等が含まれていればfalse）
 */
class Alphanumeric_check_builder extends check_builder
{
    public function check($str)
    {
        if(!preg_match("/[^a-zA-Z0-9]/", $str)){
            return true;
        } else {
            return false;
        }
    }
}

