<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 11/26/2017
 * Time: 10:22 PM
 */
class Downpayment extends CI_Controller{

}


//cari selisih antara bulan dan tahun pembayaran dengan tahun dan bulan saat ini, lalu gunakan perulangan untuk menampilkan data bulan tunggakan

/*

SELECT tmst_pelanggan.no_registrasi FROM tmst_pelanggan LEFT JOIN tran_pembayaran ON tmst_pelanggan.no_registrasi=tran_pembayaran.no_registrasi WHERE MONTH(tanggal_bayar)=MONTH(CURRENT_DATE)



1. pendaftaran tidak insert ke tbl pembayaran (bagus ini)

2. pendaftaran masuk ke tbl pembayaran, apabila paralel cek terlebi dahulu apakah yg non paralel sudah bayar atau belum

<?php
$date = date("Y-m-d");
$timeStart = strtotime("2017-10-17");
$timeEnd = strtotime("$date");
// Menambah bulan ini + semua bulan pada tahun sebelumnya
$numBulan = (date("Y",$timeEnd)-date("Y",$timeStart))*12;
// menghitung selisih bulan
$numBulan += date("m",$timeEnd)-date("m",$timeStart);

echo $numBulan;

?>
 */