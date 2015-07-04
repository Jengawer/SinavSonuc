<?php 
define('HOST', 'localhost');
define('DBNAME', 'sinavsonuc');
define('DBUSER', 'root');
define('DBPASS', '123456');
class db {
	var $db;
	function baglan() {
		$this->db = @mysql_connect(HOST, DBUSER, DBPASS);
		if (!$this->db) {
			echo "Veritabani baglantisinda sorun var! Hata: ".mysql_error();
			exit();
		}
		$this->sec();
	}
	function sec() {
		if (!mysql_select_db(DBNAME, $this->db)) {
			echo "Veritabani seciminde sorun var! Hata: ".mysql_error();
			exit();
		}
		$this->latin5();
	}
	function latin5() {
		mysql_query("SET NAMES 'utf8'", $this->db);
		mysql_query("SET CHARACTER SET utf8", $this->db);
		mysql_query("SET COLLATION_CONNECTION = 'utf8_turkish_ci'", $this->db);
	}
	function sorgu($cumle) {
		$sonuc = mysql_query($cumle, $this->db);
 
		if (!$sonuc) {
			echo "Sorguda sorun var! Hata: ".mysql_error();
			exit();
		}
		return $sonuc;
	}
	function say($result) {
		$sonuc = mysql_num_rows($result);
		return $sonuc;
	}
	function cek($result) {
		$sonuc = mysql_fetch_array($result);
		return $sonuc;
	}
	function kapat() {
		mysql_close($this->db);
	}
}
function temizle($text){
	return $text;
}
function ayar($ayar){
	$db=new db();
 	$db->baglan(); $db->latin5();
	$ayar = $db->cek($db -> sorgu("SELECT * FROM ayar WHERE ayar='".$ayar."'"));
	return $ayar['deger'];
}
?>