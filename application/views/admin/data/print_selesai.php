<!DOCTYPE html>
<html><head>
	<title>FORM SURAT PERMINTAAN PERBAIKAN</title>
	<style type="text/css">
td{
     text-align : center;
}
h1{
     text-align : center;
}
	</style>
</head><body>
<p style="text-align: center;"><strong>FORM SURAT PERMINTAAN PERBAIKAN</strong></p>
<table style="height: 70px; width: 100%;" border="2">
<tr>
<td style="width: 40%; text-align: center;">
<p><strong>RUMAH SAKIT UMUM DAERAH PLOSO KABUPATEN JOMBANG</strong></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</td>
<td style="width: 40%; text-align: center;">
<p><strong>SURAT PERMINTAAN PERBAIKAN (SPP)</strong></p>
<p><strong>BAGIAN</strong></p>
<p>&nbsp;</p>
<p><strong><?php echo $detail['nama_unit'] ; ?></strong></p>
</td>
<td style="width: 40%; text-align: center;">
<p><strong>PERMINTAAN</strong></p>
<p>&nbsp;</p>
<p style="text-align: left;"><strong>NO. URUT&nbsp;: <?php echo $detail['id_db_permintaan'] ; ?></strong></p>
<p style="text-align: left;"><strong>TANGGAL&nbsp;: <?php echo format_indo ($detail['tgl_permintaan']) ; ?></strong></p>
<p style="text-align: left;"><strong>JAM&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : <?php echo $detail['jam_permintaan'] ; ?></strong></p>
</td>
</tr>
<tr>
<td style="width: 100% text-align: center;" colspan="3">
<p><strong>URAIAN TUGAS</strong></p>
<p style="text-align: left;"><strong><?php echo $detail['urgas'] ; ?></strong></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 40% text-align: center;">
<p><strong>DISPOSISI KA IPRS</strong></p>
<p>&nbsp;</p>
<p><img src="<?php echo ('assets/signature_iprs/' . $detail['signature_iprs']); ?>" width="70px" height="70px"></p>
</td>
<td style="width: 50% text-align: center;">
<p><strong>WAKTU</strong></p>
<p style="text-align: left;"><strong>Tanggal mulai&nbsp; &nbsp;: <?php echo format_indo($detail['tgl_mulai']) ; ?></strong></p>
<p style="text-align: left;"><strong>Waktu Mulai&nbsp; &nbsp; &nbsp; : <?php echo $detail['jam_mulai'] ; ?></strong></p>
<p style="text-align: left;"><strong>Tanggal Selesai : <?php echo format_indo($detail['tgl_selesai']) ; ?></strong></p>
<p style="text-align: left;"><strong>Waktu Selesai&nbsp; &nbsp;: <?php echo $detail['jam_selesai'] ; ?></strong></p>
<hr />
<p style="text-align: left;"><strong>Pelaksana&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: <?php echo $detail['nama_petugas'] ; ?></strong></p>
</td>
<td style="width: 40%; text-align: center;">
<p style="text-align: left;"><strong>Jombang,</strong></p>
<p><strong>Disetujui</strong></p>
<p><strong>Ka. Ruang/Poli/Instalasi/Bagian</strong></p>
<p>&nbsp;</p>
<p>&nbsp;<img src="<?php echo ('assets/signatures/' . $detail['signature']); ?>" width="70px" height="70px"></p>
</td>
</tr>
<tr>
<td style="width: 70% text-align: center;" colspan="2">
<p style="text-align: left;"><strong>Laporan Hasil Pelaksanaan Pekerjaan:</strong></p>
<p style="text-align: left;"><strong>Kegiatan:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong></p>
<p style="text-align: left;"><strong><?php echo $detail['hasil_kgt'] ; ?></strong></p>
<p style="text-align: left;"><strong>Bahan:</strong></p>
<p style="text-align: left;"><strong><?php echo $detail['bhn_hasil'] ; ?>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong></p>
<p>&nbsp;</p>
</td>
<td style="width: 40% text-align: center;">
<p><strong>Pekerjaan Selesai Mengetahui</strong></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><strong><img src="<?php echo ('assets/signature_mengetahui/' . $detail['signature_mengetahui']); ?>" width="70px" height="70px"></strong></p>
</td>
</tr>
</table>
          
















</body></html>