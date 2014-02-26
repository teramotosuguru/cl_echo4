<?php 

/**
* テキストビルダー
*/
class Text_Builder 
{
	public function __construct($str) {
        return new Tex($str);
    }

	// function build($input_text) {
	// 	// テキストクラスを生成して返す
	// 	return new Tex($input_text);
	// }
}

/**
* テキストクラス
*/
class Tex
{
	private $text;  // 文字列
	private $param; // 関数名

	// コンストラクタ(文字列をセットするよ)
	function __construct($t) {
		$this->text = $t;
	}

	//　関数名のセッター
	public function set_param($p) {
		$this->param = $p;

		// 関数名がセットされたら文字列を変換するよ
		$this->convert_text($p);
	}

	// 文字列のゲッター
	public function get_text() {
		return $this->text;
	}

	// 関数名のゲッター
	public function get_param() {
		return $this->param;
	}

	// 大文字に変換
	private function convert_big() {
		$this->text = strtoupper($this->text);
	}

	// 小文字に変換
	private function convert_small() {
		$this->text = strtolower($this->text);
	}

	// キャメルに変換(snake → camel)
	private function convert_camel() {
		$tmp_text = str_replace("_", " ", $this->text); // アンダーバーを空白に変換
		$tmp_text = ucwords($tmp_text);                 // 空白で区切られた単語の先頭を大文字に変換
		$this->text = str_replace(" ", "", $tmp_text);  // 空白をつめる
	}

	// スネークに変換(camel → snake)
	private function convert_snake() {
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

	// 呼び出す関数を決定する
	private function convert_text($param) {
		switch ($param) {
			// ノーマル(そのままリターン)
			case 'normalecho':
				// なにもしない(一応作成)
				break;

			// 大文字に変換
			case 'bigecho':
				$this->convert_big();
				break;

			// 小文字に変換
			case 'smallecho':
				$this->convert_small();
				break;

			// キャメルに変換
			case 'camelecho':
				$this->convert_camel();
				break;

			// スネークに変換
			case 'snakeecho':
				$this->convert_snake();
				break;
				
			default:
				$this->text = 'error';
				break;
		}
	}

}