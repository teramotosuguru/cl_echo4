<?php
/**
 * チェッカークラス
 */

namespace libraries\checker;

class Checker
{
    private $str;

    public function __construct($str="") {
        $this->str = $str;
    }

    public function checkEmpty() {
        $checker = new EmptyCheckBuilder($this->str);
        return $checker->check($this->str);
    }

    public function checkNum() {
        $checker = new NumCheckBuilder($this->str);
        return $checker->check($this->str);
    }

    public function checkAlphanumeric() {
        $checker = new AlphanumericCheckBuilder($this->str);
        return $checker->check($this->str);
    }
}

/**
 * チェッカービルダー（抽象クラス）
 */
abstract class CheckBuilder
{
    abstract protected function check($str);
}

/**
 * 空チェック（問題なければtrue/空ならfalse）
 */
class EmptyCheckBuilder extends CheckBuilder
{
    public function check($str) {
        if (!empty($str)) {
            return true;
        } else {
            return false;
        }
    }
}

/**
 * 数字チェック（問題なければtrue/数字が含まれていればfalse）
 */
class NumCheckBuilder extends CheckBuilder
{
    public function check($str)
    {
        if (preg_match("/[0-9]/", $str)) {
            return false;
        } else {
            return true;
        }
    }
}

/**
 * 英数字チェック（問題なければtrue/記号等が含まれていればfalse）
 */
class AlphanumericCheckBuilder extends CheckBuilder
{
    public function check($str)
    {
        if (!preg_match("/[^a-zA-Z0-9]/", $str)) {
            return true;
        } else {
            return false;
        }
    }
}

