<?php 
	if(isset($id)){
		$query = mysqli_query($mysqli, "SELECT * FROM peserta WHERE id='$id'");
		$result = mysqli_fetch_array($query);

		$nama = $result['nama'];
		$passwd = $result['passwd'];
		$bidang = $result['bidang'];
		$kelas = $result['kelas'];
		$asalsmk = $result['asalsmk'];
		$umur = $result['umur'];
 ?>
<div id="modal-profil">
	<div class="modal-container">
		<div class="modal-close" onclick="document.querySelectorAll('#modal-profil')[0].style.display = 'none'">
			<img src="asset/icon/close.svg" alt="X">
		</div>
		<div class="section-head">
			<img src="asset/icon/info.svg" alt="Profil Peserta">
			<h2>Profil Peserta</h2>
			<p class="info">Lorem ipsum dolor sit amet.</p>
		</div>
		<div class="section-body">
			<form method="POST" action="engine/act-peserta-edit.php">
					<label>ID/No. Urut</label>
				<input type="text" name="id" placeholder="ID/No. Urut *" value="<?php echo $id; ?>" readonly><br>
				<label>Nama Lengkap</label>
				<input type="text" name="nama" placeholder="Nama Lengkap *" value="<?php echo $nama; ?>"><br>
				<label>Kata Sandi</label>
				<input type="password" name="passwd" placeholder="Kata Sandi *" value="<?php echo $passwd; ?>" onchange="passwdConf()"><br>
				<label>Ulangi Kata Sandi</label>
				<input type="password" name="passwd-conf" placeholder="Ulangi Kata Sandi *" value="<?php echo $passwd; ?>" onchange="passwdConf()"><br>
				<label>Bidang Lomba</label>
				<input type="text" name="bidang" value="Desain Web" readonly><br>
				<label>Kelas/Tingkat Sekolah:</label>
				<select name="kelas" required>
					<option value="X">X</option>
					<option value="XI">XI</option>
					<option value="XII">XII</option>
				</select><br>
				<label>Asal SMK</label>
				<input type="text" name="asalsmk" placeholder="Asal SMK" value="<?php echo $asalsmk; ?>"><br>
				<label>Umur (Tahun)</label>
				<input type="number" name="umur" placeholder="Umur Anda *" value="<?php echo $umur; ?>"><br>
				<p class="info">NB: Yang berwarna abu - abu tidak bisa diubah.</p>
				<button type="submit" name="submit-sunting-peserta" value="1">SUNTING PESERTA</button>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	var kelas = "<?php if(isset($kelas)){ echo $kelas; }else{ echo ''; } ?>";
	var kelasOption = document.querySelectorAll('#modal-profil select[name=kelas] option');

	for(var i = 0; i < kelasOption.length; i++){
		kelasOption[i].selected = false;

		if(kelasOption[i].value == kelas){
			kelasOption[i].selected = true;
		}
	}
</script>
<?php } ?>
