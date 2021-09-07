
<?php
include "../koneksi.php";
$id_transaksi=$_GET['id'];
$q_tampil_transaksi=mysqli_query($db, "SELECT * FROM tbtransaksi WHERE idtransaksi='$id_transaksi'");
$r_tampil_transaksi=mysqli_fetch_array($q_tampil_transaksi);

?>
<div id="label-page" style="color: blue;"><h3>Nota Peminjaman</h3></div>
<div id="content">
	<table id="tabel-input">
        <tr>
            <td class="label-formulir"> <b> ID Transaksi&ensp; &ensp; &ensp; </b></td>
            <td class="isian-formulir"><?php echo $r_tampil_transaksi['idtransaksi']; ?>
            </td>
        </tr>
        <tr>
        <tr>
            <td class="label-formulir"> <b> ID Anggota&ensp; &ensp; &ensp; </b></td>
            <td class="isian-formulir"><?php echo $r_tampil_transaksi['idanggota']; ?>
            </td>
        </tr>
        <tr>
            <td class="label-formulir"> <b> ID Buku&ensp; &ensp;</b></td>
            <td class="isian-formulir"><?php echo $r_tampil_transaksi['idbuku']; ?>
            </td>
        </tr>
        <tr>
            <td class="label-formulir"> <b> Tanggal Pinjam&ensp; &ensp;&ensp; &ensp; &ensp;&ensp;</b></td>
            <td class="isian-formulir"><?php echo $r_tampil_transaksi['tglpinjam']; ?> 
            </td>
        </tr>
    </table>
</div>
<script>
    window.print();
</script>