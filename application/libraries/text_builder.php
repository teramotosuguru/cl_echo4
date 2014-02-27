<?php 

/**
* テキストビルダー
*/
class Text_Builder 
{
	public function build($s,$p) {
        return new Text($s,$p);
    }
}

/**
* テキストクラス
*/
class Text
{
	private $text;  // 文字列
	private $param; // 関数名

	// コンストラクタ(文字列をセットするよ)
	public function __construct($txt, $func_name) {
		$this->text = $txt;
		$this->param = $func_name;

		// 文字列を変換
		$this->$func_name();
	}

	// 文字列のゲッター
	public function get_text() {
		return $this->text;
	}

	// 関数名のゲッター
	public function get_param() {
		return $this->param;
	}

	// そのまま出力
	private function normal() {
		return;
	}

	// 大文字に変換
	private function bigecho() {
		$this->text = strtoupper($this->text);
	}

	// 小文字に変換
	private function smallecho() {
		$this->text = strtolower($this->text);
	}

	// キャメルに変換(snake → camel)
	private function camelecho() {
		$tmp_text = str_replace("_", " ", $this->text); // アンダーバーを空白に変換
		$tmp_text = ucwords($tmp_text);                 // 空白で区切られた単語の先頭を大文字に変換
		$this->text = str_replace(" ", "", $tmp_text);  // 空白をつめる
	}

	// スネークに変換(camel → snake)
	private function snakeecho() {
		$snake_text = NULL;
		// 1文字ずつ区切って配列にする　その配列をforeachでくるくるまわすよ～
		foreach(str_split($this->text) as $key => $value) {
			// 大文字かどうか
			if(ctype_upper($value) == TRUE) {
				
				// 小文字に変換
				$value = strtolower($value);

				// 先頭以外の大文字はアンダーバーをくっつける
				if($key != 0 ) {
					$value = "_".$value;
				}
			}
			$snake_text = $snake_text.$value;
		}
	
		$this->text = $snake_text;
	}

}