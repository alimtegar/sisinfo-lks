<?php 
	$query_nilai = mysqli_query($mysqli, "SELECT * FROM nilai ORDER BY nilai DESC");
 ?>
<section id="nilai">
	<div class="section-container">
		<div class="section-head">
			<img src="asset/icon/score.svg" alt="Nilai Peserta LKS">
			<h2>Nilai Perolehan Peserta LKS</h2>
			<p class="info">Telusuri lebih lengkap nilai dan peringkat siswa.</p>
			<form>
				<input type="search" name="cari-peserta" placeholder="Cari Informasi Peserta" value="<?php if(isset($cari_peserta)){ echo $cari_peserta; } ?>">
				<!-- <select name="cari-bidang">
					<option value="Semua Bidang Lomba">Semua Bidang Lomba</option>
					<option value="Animasi">Animasi</option>
					<option value="Aplikasi Perangkat Lunak">Aplikasi Perangkat Lunak</option>
					<option value="Desain Grafis">Desain Grafis</option>
					<option value="Desain Web">Desain Web</option>
					<option value="Teknologi Informasi/Jaringan">Teknologi Informasi/Jaringan</option>
				</select> -->
				<button type="button" onclick="window.location = 'nilai.php?cari_peserta=' + document.querySelectorAll('input[name=cari-peserta]')[0].value">CARI</button>
				<button type="button" onclick="window.location = 'peringkat-nilai.php'" style="margin-left: 5px; ">RANK</button>
				<?php if(isset($akses) && $akses == "admin"){ ?>
				<button type="button" style="margin-left: 5px;" onclick="window.location = 'nilai.php?tambah-peserta=1'">TAMBAH</button>
				<?php } ?>
			</form>
		</div>
		<div class="section-body">
			<?php if(isset($akses) && $akses == "admin"){ ?>
			<p class="info">NB: Klik pada nama untuk melihat profil peserta.</p>
			<?php } ?>
			<table>
				<thead>
					<tr>
						<th>No.</th>
						<th>No. Urut</th>
						<th>Nama Lengkap</th>
						<th>Asal SMK</th>
						<th>Bidang Lomba</th>
						<th>Nilai</th>
						<?php if(isset($akses) && $akses == "admin"){ ?>
						<th class="td-option" colspan="2"><img src="asset/icon/settings.svg" alt="Pilihan"></th>
						<?php } ?>
					</tr>
				</thead>
				<tbody>
					<?php
						$no = 1;

						while($result_nilai = mysqli_fetch_array($query_nilai)){
							$id = $result_nilai['id'];
							$nilai = ($result_nilai['nilai'] == NULL || $result_nilai['nilai'] == 0.00) ? "-" : $result_nilai['nilai'];

							$query_peserta = mysqli_query($mysqli, "SELECT * FROM peserta WHERE id='$id'");

							$result_peserta = mysqli_fetch_array($query_peserta);

							
							$nama = $result_peserta['nama'];
							$bidang = $result_peserta['bidang'];
							$asalsmk = $result_peserta['asalsmk'];

							
					?>
						<tr>
							<td><?php if($no < 10){ echo "0".$no."."; }else{ echo $no."."; } ?></td>
							<td><?php echo $id; ?></td>
							<td>
								<?php if(isset($akses) && $akses == "admin"){ ?>
								<a href="nilai.php?sunting-peserta=<?php echo $id; ?>" title="Sunting Profil">
								<?php } ?>
									<?php echo $nama; ?>
								</a>
							</td>
							<td><?php echo $asalsmk; ?></td>
							<td><?php echo $bidang; ?></td>
							<td><?php echo $nilai; ?></td>
							<?php if(isset($akses) && $akses == "admin"){ ?>
							<td class="td-option">
								<img src="asset/icon/pencil.svg" alt="Sunting">
								<a href="nilai.php?sunting-nilai=<?php echo $id; ?>" title="Sunting">Sunting</a>
							</td>
							<td class="td-option">
								<img src="asset/icon/trash.svg" alt="Hapus">
								<a href="nilai.php?hapus-peserta=<?php echo $id; ?>" title="Hapus">Hapus</a>
							</td>
							<?php } ?>
						</tr>
					<?php $no++; } ?>
				</tbody>
			</table>
		</div>
	</div>
</section>
<?php 
	if(isset($_GET['sunting-nilai'])){ 
		$id_peserta = $_GET['sunting-nilai'];

		$query_peserta = mysqli_query($mysqli, "SELECT * FROM peserta WHERE id='$id_peserta'");
		$result_peserta = mysqli_fetch_array($query_peserta);

		$nama = $result_peserta['nama'];
		$bidang = $result_peserta['bidang'];
		$asalsmk = $result_peserta['asalsmk'];

		$query_nilai = mysqli_query($mysqli, "SELECT * FROM nilai WHERE id='$id_peserta'"); 
		$result_nilai = mysqli_fetch_array($query_nilai);

		$nilai = ($result_nilai['nilai'] == NULL || $result_nilai['nilai'] == 0.00) ? "-" : $result_nilai['nilai'];

?>
<div id="modal-nilai-edit">
	<div class="modal-container">
		<div class="modal-close" onclick="window.location = 'nilai.php'">
			<img src="asset/icon/close.svg" alt="X">
		</div>
		<table> 
			<thead>
				<tr>
					<th>No. Urut</th>
					<th>Nama Lengkap</th>
					<th>Asal SMK</th>
					<th>Bidang Lomba</th>
					<th>Nilai</th>
					<th class="td-option" colspan="2"><img src="asset/icon/settings.svg" alt="Pilihan"></th>
				</tr>
			</thead>
			<tbody>
				<form method="POST" action="engine/act-nilai-edit.php">
				<tr>
					<td><input type="text" name="id" value="<?php echo $id_peserta; ?>" hidden><?php echo $id_peserta; ?></td>
					<td><?php echo $nama; ?></td>
					<td><?php echo $asalsmk; ?></td> 
					<td><?php echo $bidang; ?></td>
					<td><input type="text" name="nilai" value="<?php echo $nilai; ?>" style="width: 40px; text-align: center;"></td>
					<td class="td-option">
						<img src="asset/icon/save.svg" alt="Simpan">
						<button type="submit" name="submit-sunting-nilai" value="1">Simpan</button>
					</td>
					<!-- <td class="td-option">
						<img src="asset/icon/user-shape.svg" alt="Profil">
						<button type="submit" name="submit-sunting-nilai" value="1">Profil</button>
					</td> -->
				</tr>
				</form>
			</tbody>
		</table>
	</div>
</div>
<?php } ?>
<?php if(isset($_GET['tambah-peserta'])){ ?>
<div id="modal-peserta-add">
	<div class="modal-container">
		<div class="modal-close" onclick="window.location = 'nilai.php'">
			<img src="asset/icon/close.svg" alt="X">
		</div>
		<div class="section-head">
			<img src="asset/icon/reg.svg" alt="Pendaftaran Peserta">
			<h2>Pendaftaran Peserta</h2>
			<p class="info">Lorem ipsum dolor sit amet.</p>
		</div>
		<div class="section-body">
			<form method="POST" action="engine/act-peserta-add.php">
				<div class="form-first">
					<label>Bidang Lomba yang Diikuti *</label>
					<input type="text" name="bidang" value="Desain Web" readonly><br>
					<input type="text" name="id" placeholder="ID/No. Urut *" required><br>
					<input type="text" name="nama" placeholder="Nama Lengkap *" required><br>
					<input type="password" name="passwd" placeholder="Kata Sandi *" required onchange="passwdConf()"><br>
					<input type="password" name="passwd-conf" placeholder="Ulangi Kata Sandi *" required onchange="passwdConf()"><br>
					<p class="info">*) Wajib untuk diisi.</p>
					<button type="button" onclick="showForm('second')">SELANJUTNYA</button>
				</div>
				<div class="form-second">
					<label>Kelas/Tingkat Sekolah *</label>
					<select name="kelas" required>
						<option value="X">X</option>
						<option value="XI">XI</option>
						<option value="XII">XII</option>
					</select><br>
					<textarea name="asalsmk" placeholder="Asal Sekolah *" required></textarea>
					<input type="number" name="umur" placeholder="Umur (Tahun) *" required>
					<p class="info">*) Wajib untuk diisi.</p>
					<button type="submit" name="submit-daftar" value="1">DAFTARKAN PESERTA</button>
					<button type="button" onclick="showForm('first')">KEMBALI</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php } ?>

<?php 
	if(isset($_GET['sunting-peserta'])){ 
		$id_peserta = $_GET['sunting-peserta'];

		$query = mysqli_query($mysqli, "SELECT * FROM peserta WHERE id='$id_peserta'");
		$result = mysqli_fetch_array($query);

		$nama = $result['nama'];
		$passwd = $result['passwd'];
		$bidang = $result['bidang'];
		$kelas = $result['kelas'];
		$asalsmk = $result['asalsmk'];
		$umur = $result['umur'];
?>

<div id="modal-peserta-edit">
	<div class="modal-container">
		<div class="modal-close" onclick="window.location = 'nilai.php'">
			<img src="asset/icon/close.svg" alt="X">
		</div>
		<div class="section-head">
			<img src="asset/icon/reg.svg" alt="Profil Peserta">
			<h2>Profil Peserta</h2>
			<p class="info">Lorem ipsum dolor sit amet.</p>
		</div>
		<div class="section-body">
			<form method="POST" action="engine/act-peserta-edit.php">
				<label>ID/No. Urut</label>
				<input type="text" name="id" placeholder="ID/No. Urut *" value="<?php echo $id_peserta; ?>" readonly><br>
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
<?php 
	if(isset($_GET['hapus-peserta'])){ 
		$id_peserta = $_GET['hapus-peserta'];
?>
<div id="modal-peserta-delete">
	<div class="modal-container">
		<p>Apakah Anda yakin ingin menghapus akun peserta ini?</p>
		<button onclick="window.location = 'engine/act-peserta-delete.php?id-peserta=<?php echo $id_peserta; ?>'">YA</button>
		<button onclick="window.location = 'nilai.php'">TIDAK</button>
	</div>
</div>
<?php } ?>