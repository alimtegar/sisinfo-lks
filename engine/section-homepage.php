<section id="homepage">
	<div class="section-container">
		<div id="homepage-slider">
			<ul>
				<li>
					<img src="asset/img/img-1.jpg" alt="Gambar Slider 1">
					<div class="slider-text">
						<img src="asset/icon/info.svg" alt="Selamat Datang">
						<h2>Selamat Datang!</h2>
						<p class="info">Di situs resmi LKS Bidang Web Design DIY</p>
					</div>
				</li>
				<li>
					<img src="asset/img/img-2.jpg" alt="Gambar Slider 2">
					<div class="slider-text">
						<img src="asset/icon/info.svg" alt="Selamat Datang">
						<h2>Telusuri Lebih Lengkap!</h2>
						<p class="info">Telusuri informasi peserta dan nilai lebih lengkap.</p>
					</div>
				</li>
				<li>
					<img src="asset/img/img-3.jpg" alt="Gambar Slider 3">
					<div class="slider-text">
						<img src="asset/icon/info.svg" alt="Selamat Datang">
						<h2>Dan Daftar Sebagai Peserta!</h2>
						<p class="info">Ikuti LKS Bidang Web Design demi kemajuan teknologi bangsa.</p>
					</div>
				</li>
			</ul>
		</div>
		<div id="homepage-form">
			<div class="section-head">
				<img src="asset/icon/reg.svg" alt="Pendaftaran Peserta">
				<h2>Pendaftaran Peserta</h2>
				<p class="info">Untuk LKS bidang Web Design.</p>
			</div>
			<div class="section-body">
				<form method="POST" action="engine/act-reg.php">
					<div class="form-first">
						<label>Bidang Lomba yang Diikuti *</label>
						<input type="text" name="bidang" value="Desain Web" readonly>
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
</section>