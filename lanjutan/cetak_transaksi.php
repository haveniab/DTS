<?php
include 'koneksi.php';
require_once("vendor/autoload.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($db,"SELECT tbtransaksi.*,tbanggota.*,tbbuku.*
FROM tbtransaksi,tbanggota,tbbuku
WHERE tbtransaksi.idanggota=tbanggota.idanggota
AND tbtransaksi.idbuku=tbbuku.idbuku
AND tbtransaksi.tglkembali='0000-00-00'
ORDER BY tbtransaksi.idtransaksi DESC");

$html = '<div id="label-page"><h3>Transaksi Peminjaman</h3></div>';
$html .= '<table id="tabel-tampil">
<tr>
    <th id="label-tampil-no">No</td>
    <th>ID Transaksi</th>
    <th>ID Anggota</th>
    <th>Nama</th>
    <th>ID Buku</th>
    <th>Judul Buku</th>
    <th>Tanggal Pinjam</th>
    <th id="label-opsi3">Opsi</th>
</tr>';
$nomor=1;
		while($r_transaksi=mysqli_fetch_array($q_transaksi)){
$html .= "<tr>
<td>".$nomor++ ."</td>
<td>".$r_transaksi['idtransaksi']."</td>
<td>" . $r_transaksi['idanggota']. "?></td>
<td>" .$r_transaksi['nama']. "</td>
<td>" .$r_transaksi['idbuku']. "?></td>
<td>" .$r_transaksi['judulbuku']. "?></td>
<td>" .$r_transaksi['tglpinjam']. "?></td>
</tr>";
        }
        
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('transaksi.pdf');
?>