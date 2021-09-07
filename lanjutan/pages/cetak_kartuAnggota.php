
<?php
include "../koneksi.php";
$id_anggota=$_GET['id'];
$q_tampil_anggota=mysqli_query($db, "SELECT * FROM tbanggota WHERE idanggota='$id_anggota'");
$r_tampil_anggota=mysqli_fetch_array($q_tampil_anggota);
if(empty($r_tampil_anggota['foto']) or ($r_tampil_anggota['foto'] == '-')) {
    $foto = "admin-no-photo.jpg";
} else 
    $foto = $r_tampil_anggota['foto'];
?>
<div id="label-page"><h3>Kartu Anggota</h3></div>
<div id="content">
	<table id="tabel-input">
        <tr>
            <td class="label-formulir"> <b> FOTO&ensp; &ensp;  </b></td>
            <td class="isian-formulir">
            <img src="../images/<?php echo $foto; ?>" width="70px" height="75px" >
            </td>
        </tr>
        <tr>
            <td class="label-formulir"> <b> ID Anggota&ensp; &ensp; &ensp; </b></td>
            <td class="isian-formulir"><?php echo $r_tampil_anggota['idanggota']; ?>
            </td>
        </tr>
        <tr>
            <td class="label-formulir"> <b> Nama&ensp; &ensp; &ensp; &ensp; &ensp;&ensp;</b></td>
            <td class="isian-formulir"><?php echo $r_tampil_anggota['nama']; ?>
            </td>
        </tr>
        <tr>
            <td class="label-formulir"> <b> Jenis Kelamin&ensp; &ensp;</b></td>
            <td class="isian-formulir"><?php echo $r_tampil_anggota['jeniskelamin']; ?>
            </td>
        </tr>
        <tr>
            <td class="label-formulir"> <b> Alamat&ensp; &ensp;&ensp; &ensp; &ensp;&ensp;</b></td>
            <td class="isian-formulir"><?php echo $r_tampil_anggota['alamat']; ?> 
            </td>
        </tr>
    </table>
</div>
<script>
    window.print();
</script>