<?php 
	if(isset($id)){
		if($akses == "admin"){
			$query = mysqli_query($mysqli, "SELECT * FROM admin WHERE id='$id'");
		}elseif($akses == "peserta"){
			$query = mysqli_query($mysqli, "SELECT * FROM peserta WHERE id='$id'");
		}

		$result = mysqli_fetch_array($query);

		$nama = $result['nama'];
	}
 ?>
<nav id="nav-top">
	<div class="nav-container">
		<div class="nav-head">
			<a href="index.php" title="Beranda">
				<img src="asset/img/head-lks.png" alt="Sistem Informasi LKS DIY">
			</a>
		</div>
		<?php if(isset($id)){ ?>
		<div class="nav-account">
			<p>Hai, <a href="javascript:void(0)" onclick="document.querySelectorAll('#modal-profil')[0].style.display = 'block'" title="Profil"><?php echo $nama; ?></a>!</p>
			<button onclick="window.location = 'engine/act-logout.php'">KELUAR</button>
		</div>
		<?php }else{ ?>
		<div class="nav-form">
			<form method="POST" action="engine/act-login.php">
				<input type="text" name="id" placeholder="ID/No. Urut" required>
				<input type="password" name="passwd" placeholder="Kata Sandi" required>
				<button type="submit" name="submit-masuk" value="1">MASUK</button>
			</form>
		</div>
		<?php } ?>
	</div>
</nav>
<nav id="nav-bottom">
	<div class="nav-container">
		<div class="nav-menu">
			<ul>
				<?php if(!isset($id)){ ?>
				<li><a href="index.php" title="Beranda">BERANDA</a></li>
				<?php } ?>
				<li><a href="web-design.php" title="Web Design">WEB DESIGN</a></li>
				<li><a href="nilai.php" title="Nilai">NILAI</a></li>
				<li><a href="kisi.php" title="Kisi - Kisi">KISI - KISI</a></li>
				<li><a href="ketentuan.php" title="Ketentuan">KETENTUAN</a></li>
				<li><a href="tempat.php" title="Tempat">TEMPAT</a></li>
			</ul>
		</div>
	</div>
</nav>
<script type="text/javascript">
	var pageTitle = "<?php echo $page_title ?>";
	pageTitle = pageTitle.toUpperCase();
	var navBottomMenuLi = document.querySelectorAll('#nav-bottom .nav-menu ul li');
	var navBottomMenuLiA = document.querySelectorAll('#nav-bottom .nav-menu ul li a');

	for(var i = 0; i < navBottomMenuLi.length; i++){
		if(navBottomMenuLiA[i].innerHTML == pageTitle){
			navBottomMenuLi[i].setAttribute('class','li-active');
		}
	}
</script>