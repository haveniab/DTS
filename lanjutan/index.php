<?php
include'koneksi.php';
$tgl=date('Y-m-d');
?>
<!doctype html>
<html>
<head>
	<title>Sistem Informasi Perpustakaan</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="container">
		<div id="header">
			<div id="logo-perpustakaan-container">
				<image id="logo-perpustakaan" src="images/Perpustakaan_Digital_logo.png">
			</div>
			<div id="nama-alamat-perpustakaan-container">
				<div class="nama-alamat-perpustakaan">
					<h1>PERPUSTAKAAN UMUM</h1>
                    <p>Jalan Bina Nusantara No.18, Medan</p>
                    <p>Telpon (061) 887755</p>
				</div>	
			</div>
		</div>
		<div id="header2">
			<div id="nama-user"><b>Hai Admin!</b></div>
		</div>
		<div id="sidebar">
			<a href="index.php?p=beranda">B e r a n d a </a><br><br>
			<p class="label-navigasi">Data Master</p>
			<ul>
				<li><a href="index.php?p=anggota">Data Anggota</a></li>
				<li><a href="index.php?p=buku">Data Buku</a></li>
			</ul>
            <br> <br>

            <p class="label-navigasi">Data Transaksi</p>
			<ul>
				<li><a href="index.php?p=transaksi-peminjaman">Transaksi Peminjaman</a></li>
                <li><a href="index.php?p=transaksi-pengembalian">Pengembalian</a></li>
			</ul>
            <br> <br>


			<p class="label-navigasi">Laporan Transaksi</p>
			<ul>
				<li><a href="pdf_laporan.php" target="_blank">Laporan Peminjaman dan Pengembalian</a></li>
			</ul>
            <br> <br>

			<p class="label-navigasi"></p>
            <ul>
			<li><a href="logout.php" class="fa fa-sign-out">K e l u a r</a></li>
            </ul>
			
		</div>
		<div id="content-container">
		<?php
			$pages_dir='pages';
			if(!empty($_GET['p'])){
				$pages=scandir($pages_dir,0);
				unset($pages[0],$pages[1]);
				$p=$_GET['p'];
				if(in_array($p.'.php',$pages)){
					include($pages_dir.'/'.$p.'.php');
				}else{
					echo'Halaman Tidak Ditemukan';
				}
			}else{
				include($pages_dir.'/beranda.php');
			}
		?>
		</div>
		<div id="footer"><h3> <br> Perpustakaan @havenia</h3></div>
	</div>
</body>
</html>