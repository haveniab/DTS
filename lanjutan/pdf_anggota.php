<?php 
    require("vendor/autoload.php");         //load file autoload.php dari composer
    require("koneksi.php");                 //load konfigurasi untuk koneksi ke DB

    use Dompdf\Dompdf;                      //panggil referensi namespace dari library Dompdf
    use Dompdf\Options;


    // $menu = [
    //     ['nama' => 'Jeruk', 'jenis' => 'Buah', 'harga' => 14000],
    //     ['nama' => 'Pisang', 'jenis' => 'Buah', 'harga' => 12000],
    //     ['nama' => 'Nasi Goreng', 'jenis' => 'Manakan', 'harga' => 12000],
    //     ['nama' => 'Mie Goreng', 'jenis' => 'Makanan', 'harga' => 10000],
    //     ['nama' => 'Jus Jambu', 'jenis' => 'Minuman', 'harga' => 6000],
    //     ['nama' => 'Air Mineral', 'jenis' => 'Minuman', 'harga' => 3000],
    //     ['nama' => 'Wortel', 'jenis' => 'Sayur', 'harga' => 9000],
    //     ['nama' => 'Tomat', 'jenis' => 'Sayur', 'harga' => 5000],
    // ];

    $html = '<h3 align="center">Data Anggota Perpustakaan</h3>';
    $html .= '<table width="100%" border="1" cellspacing="0" cellpadding="2">
            <thead> 
                <tr> 
                    <th id="label-tampil-no">No</th> 
                    <th>ID Anggota</th> 
                    <th>Nama</th> 
                    <th>Foto</th> 
                    <th>Jenis Kelamin</th> 
                    <th>Alamat</th> 
                </tr> 
            </thead> 
            <tbody> ';

    $nomor = 1; 
    $query = "SELECT * FROM tbanggota ORDER BY idanggota DESC"; 
    $q_tampil_anggota = mysqli_query($db, $query); 

    if(mysqli_num_rows($q_tampil_anggota) > 0) { 
        // looping semua data pada tabel tbanggota 
        while($r_tampil_anggota=mysqli_fetch_array($q_tampil_anggota)) { 
            if(empty($r_tampil_anggota['foto']) or ($r_tampil_anggota['foto'] == '-')) {
                $foto = "admin-no-photo.jpg";
            } else 
                $foto = $r_tampil_anggota['foto'];

    $html .= '<tr>
                <td>'. $nomor.'</td> 
                <td>'. $r_tampil_anggota['idanggota'].'</td> 
                <td>'. $r_tampil_anggota['nama'].'</td> 
                <td><img src="http://localhost/DTS_Pertemuan11/lanjutan/images/'.$foto.'" width="70px" height="70px"></td>
                <td>'. $r_tampil_anggota['jeniskelamin'].'</td> 
                <td>'. $r_tampil_anggota['alamat'].'</td> 
            </tr> ';
            $nomor++; 
        } // end looping 
    } else {
        $html .= '<tr><td colspan="4" align="center">Tidak Ada Data</td></tr>';
    }     

    $html .= '</tbody></html>';


    $dompdf = new Dompdf();     
    $dompdf->loadHtml($html);                      //isi konten (format HTML) untuk dokumen pdf
    $dompdf->setPaper('a4', 'landscape');           //set ukuran dan orientasi dokumen pdf
    $dompdf->render();                              //render kode HTML menjadi pdf
    $dompdf->stream();                              //stream pdf ke browser
?> 
 


