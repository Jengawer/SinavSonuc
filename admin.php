<?php ob_start(); session_start(); include "config.php"; ?>
<html>
	<head>
		<title>Diploma Sorgula Yönetim Paneli</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
		<script src="login.js" type="text/javascript"></script>
		<link href="style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
	<?php
		if(!isset($_SESSION['user'])){
			sleep(1);
			if(isset($_POST['user'])){
				if(addslashes(strip_tags(@$_POST['user']))=="admin" && addslashes(strip_tags(@$_POST['password']))=="admin"){
    				$_SESSION['user']="admin";
					echo "<meta http-equiv=\"refresh\" content=\"0;URL=admin.php\">";
				}else{
					echo "Hatalı şifre.";
				} 
			}else{ ?>
				<div id="sayfa"><center>       
				<img src='logo.jpg' width='500'><br/><br/>
				<b>YÖNETİCİ GİRİŞİ</b></br>
    			<?php
				if(!isset($_SESSION["user"])){  ?>
 					<table>
 						<form id="form1" style="display:inline;">
 						<tr><td align='right'> Kullanıcı Adı:</td><td> <input type='text' id="user" name='user'  /><br/></td></tr>
   						<tr><td align='right'>  Şifre:</td><td> <input type='password' id="password" name='password' /><br/></td></tr></form>
						<tr><td colspan='2'><center><input type="submit" id="btn" value="Giriş Yap" onclick="kontrol()" /></center></td></tr>
					</table>
					<div id="yaz" class='icerik'></div></center>
				</div>
	
<?php 			}else {
    				echo "<center>Yönlendiriliyorsunuz...</center><br/>";
    				echo "<meta http-equiv=refresh content=\"0;URL=admin.php\">";
				}
			} 
		}else{ ?>
			<div id="ust"><center><a href='admin.php'>Ana Sayfa</a> | 
			<a href='admin.php?s=diplomaekle'>Diploma Ekle</a> | 
			<a href='admin.php?s=diplomaduzenle'>Diploma Düzenle</a> | 
			<a href='admin.php?s=siteayarlari'>Site Ayarları</a> | 
			<a href='admin.php?s=logout'>Çıkış Yap</a></center></div>
			<div id="icerik">
<?php
	$kod=temizle(@$_GET['s']);
	switch($kod){
	    case 'logout': 
	    	unset($_SESSION['user']);
	    	echo "<meta http-equiv=refresh content=\"0;URL=index.php\">";
	    	break;
	    case 'diplomaekle':
	    	if(isset($_POST['sent']) && $_POST['sent']=="true"){
	    			$db=new db();
	    			$db->baglan();
	    			$ekle=$db->sorgu("INSERT INTO diploma (
	    				`tc`, 
	    				`ad`, 
	    				`soyad`, 
	    				`ana`, 
	    				`baba`, 
	    				`dyeri`, 
	    				`dtarihi`, 
	    				`oadi`, 
	    				`omuduru`, 
	    				`mtarih`) 
	    				VALUES (
	    					'".temizle($_POST['tc'])."', 
	    					'".temizle($_POST['ad'])."', 
	    					'".temizle($_POST['soyad'])."', 
	    					'".temizle($_POST['ana'])."', 
	    					'".temizle($_POST['baba'])."', 
	    					'".temizle($_POST['dyeri'])."', 
	    					'".temizle($_POST['dtarihi'])."', 
	    					'".temizle($_POST['oadi'])."', 
	    					'".temizle($_POST['omuduru'])."', 
	    					'".temizle($_POST['mtarih'])."');");
	    			if($ekle){echo "<center>Diploma başarıyla kaydedildi.</center>";}
	    		
	    	}else{
	    		?>
	    		<form action='' method='POST' enctype="multipart/form-data">
	    		<input type='hidden' value='true' name='sent'>
	    				<div class='tablo'><table align='center'>
						<tr><td align='right'><b>T.C. Kimlik No</b></td><td><input type='text' class='formbox' name='tc'></td></tr>
						<tr><td align='right'><b>Ad</b></td><td><input type='text' class='formbox' name='ad'></td></tr>
						<tr><td align='right'><b>Soyad</b></td><td><input type='text' class='formbox' name='soyad'></td></tr>
						<tr><td align='right'><b>Baba Adı</b></td><td><input type='text' class='formbox' name='baba'></td></tr>
						<tr><td align='right'><b>Ana Adı</b></td><td><input type='text' class='formbox' name='ana'></td></tr>
						<tr><td align='right'><b>Doğum Yeri</b></td><td><input type='text' class='formbox' name='dyeri'></td></tr>
						<tr><td align='right'><b>Doğum Tarihi</b></td><td><input type='text' class='formbox' name='dtarihi'></td></tr>
						<tr><td align='right'><b>Mezun Olunan Okul</b></td><td><input type='text' class='formbox' name='oadi'></td></tr>
						<tr><td align='right'><b>Okul Müdürü</b></td><td><input type='text' class='formbox' name='omuduru'></td></tr>
						<tr><td align='right'><b>Mezuniyet Tarihi</b></td><td><input type='text' class='formbox' name='mtarih'></td></tr>

					</table></div>
					
					</div>
	    		<div id='icerik'>
	    		<table width='100%'>
	    			<tr><td><center><input type='submit' value='Kaydet' style='width:100px;height:50px;'></center></td></tr></table>	    			
	    		</div>
	    		</form>	
	    	<?php
	    	}
	    	break;
	 
	    case 'diplomaduzenle':
	     	$db=new db();
 			$db->baglan(); $db->latin5();
			$talepsorgu = $db -> sorgu("SELECT * FROM diploma ORDER by id DESC");
			?>
			<table align='center'>
			<tr>
				<td><b>No</b></td>
				<td><b>T.C. Kimlik No</b></td>
				<td><b>Adı</b></td>
				<td><b>Soyadı</b></td>
				<td><b>Ana Adı</b></td>
				<td><b>Baba Adı</b></td>
				<td><b>Doğum Yeri</b></td>
				<td><b>Doğum Tarihi</b></td>
				<td><b>Mezun Olunan Okul</b></td>
				<td><b>Okul Müdürü</b></td>
				<td><b>Mezuniyet Tarihi</b></td>
				<td></td>
			</tr>
			<?php
			while($talepler = $db -> cek($talepsorgu)){
			 ?>
			<tr>
				<td><?php echo $talepler['id']; ?></td>
				<td><?php echo $talepler['tc']; ?></td>
				<td><?php echo $talepler['ad']; ?></td>
				<td><?php echo $talepler['soyad']; ?></td>
				<td><?php echo $talepler['ana']; ?></td>
				<td><?php echo $talepler['baba']; ?></td>
				<td><?php echo $talepler['dyeri']; ?></td>
				<td><?php echo $talepler['dtarihi']; ?></td>
				<td><?php echo $talepler['oadi']; ?></td>
				<td><?php echo $talepler['omuduru']; ?></td>
				<td><?php echo $talepler['mtarih']; ?></td>
				<td><a href='admin.php?s=sil&id=<?php echo $talepler['id']; ?>' onclick='onay()'>Sil</a></td>
			</tr>
			<?php
			} 
			?></table> <?php

	    break;
	    case 'sil': 

	     	$db=new db();
 			$db->baglan();
			$talepsorgu = $db -> sorgu("DELETE FROM diploma WHERE id='".temizle($_GET['id'])."'");
			if($talepsorgu){echo "<center>
					Silme işlemi başarıyla tamamlandı.<meta http-equiv=refresh content=\"1;URL=admin.php?s=diplomaduzenle\">
				</center>";}else "<center>
					Bir hata oluştu lütfen tekrar deneyin.</center>";
	    break;
	    case 'siteayarlari': 
	    if(!isset($_POST['title'])){
	    	echo "<form action='' method='POST'><table align='center'>
	    	<tr><td align='right'><b>Site Başlığı</b></td><td><input type='text' name='title' value='".ayar('title')."'></td></tr>
	    	<tr><td align='right'><b>Site Alt Yazısı</b></td><td><input type='text' name='footer' value='".ayar('footer')."'></td></tr>
	    	<tr><td align='center' colspan='2'><input type='submit' value='Kaydet'></td></tr>

	    	</form>";
	    }else{
	     	$db=new db();
 			$db->baglan();
			$update = $db -> sorgu("UPDATE ayar SET deger='".temizle($_POST['title'])."' WHERE ayar='title'");
			$update = $db -> sorgu("UPDATE ayar SET deger='".temizle($_POST['footer'])."' WHERE ayar='footer'");
			if($update){echo "<center>Güncelleme işlemi tamamlandı.</center>";
			    	echo "<meta http-equiv=refresh content=\"1;URL=admin.php?s=siteayarlari\">";
}
	    }

	    break;
	default: echo "<center>Hoşgeldiniz...</center>";
	}
}
?>
</div>
	</body>
</html>