<?php include "config.php"; ?>
<html>
	<head>
	<?php

	 ?>
		<title><?php echo ayar('title') ?></title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	<body>
		<div class="tamsayfa">
			<div class="ust"><center><img src='logo.jpg' alt='<?php echo ayar('title') ?>' /></center></div>
			<div class="form-style-6"><center>
				<h1><?php echo ayar('title') ?> Sistemi</h1>
				<?php if(!isset($_POST['tc'])){ ?>
				<form id='form' action='' method='post'>
					<h2>T.C. Kimlik No</h2> <input type='text' class='kutu' name='tc'/><br/>
					<input class='sorgula' type='submit' value=' Sorgula '>
				</form>
				<?php }else{
					$db=new db;
					$db->baglan();
					$say=$db->cek($db->sorgu("SELECT * FROM diploma WHERE tc='".temizle($_POST['tc'])."'"));
					if($say < 1){echo "<center><h3>Aranan T.C. Kimlik No ile ilgili veri bulunamadı.</h2></center>";}else{
					$diploma=$db->cek($db->sorgu("SELECT * FROM diploma WHERE tc='".temizle($_POST['tc'])."'"));
					echo "<div class='tablo'><table align='center'>
						<tr><td align='right'><b>T.C. Kimlik No</b></td><td>".$diploma['tc']."</td></tr>
						<tr><td align='right'><b>Ad</b></td><td>".$diploma['ad']."</td></tr>
						<tr><td align='right'><b>Soyad</b></td><td>".$diploma['soyad']."</td></tr>
						<tr><td align='right'><b>Baba Adı</b></td><td>".$diploma['baba']."</td></tr>
						<tr><td align='right'><b>Ana Adı</b></td><td>".$diploma['ana']."</td></tr>
						<tr><td align='right'><b>Doğum Yeri</b></td><td>".$diploma['dyeri']."</td></tr>
						<tr><td align='right'><b>Doğum Tarihi</b></td><td>".$diploma['dtarihi']."</td></tr>
						<tr><td align='right'><b>Mezun Olunan Okul</b></td><td>".$diploma['oadi']."</td></tr>
						<tr><td align='right'><b>Okul Müdürü</b></td><td>".$diploma['omuduru']."</td></tr>
						<tr><td align='right'><b>Mezuniyet Tarihi</b></td><td>".$diploma['mtarih']."</td></tr>

					</table>
					
					</div>";
				} echo "<br/><a href='index.php'>Yeni Sorgu</a>";
				} ?></center>
			</div>
			<div class="alt"><center><?php echo ayar('footer'); ?></center></div>
		</div>
	</body>
</html>