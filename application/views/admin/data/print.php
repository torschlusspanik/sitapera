<!DOCTYPE html>
<html><head>
	<title>contoh surat pengunguman</title>
	<style type="text/css">
		table {
			width:100%;
               border-style:double;
			border-color: white;
               margin-left: 35px;
		}
          table tr .nomor{
               text-align:center;
               font-size:15px;
          }
          table tr .namasurat{
               text-align:center;
               font-size:19px;
          }
		table tr .text2 {
			font-size: 15px;
               
          }
		table tr .text {
			text-align: center;
			font-size: 13px;
		}
		table tr td {
			font-size: 13px;
		}
          center{   
               margin-right: 120px;
          }
          td .border{
               width:100%;
          }
          table tr .nama{
               text-transform: uppercase;
               text-align: left;
               font-size: 16px;

          }

	</style>
</head><body>
	<center>
	<table>
			<tr>
				<td><img src="assets/img/logo.png" width="110" height="90"></td>
				<td>
				<center>
					<font size="3">KABUPATEN JOMBANG</font><br>
					<font size="3">KECAMATAN JOMBANG</font><br>
					<font size="4"><b>KELURAHAN JOMBATAN</b></font><br>
					<font size="2"><i>Jl. Ki Hajar Dewantara No.1, Kode pos 61419</i></font>
				</center>
				</td>
			</tr>
			<tr>
				<td class="border" colspan="10"><hr></td>
			</tr>
		<table width="110%">
			<tr>
				<td class="namasurat"><b><u><?php echo $detail['nama_dokumen'] ; ?> : </u></b></td>
			</tr>
               <tr>
                    <td class="nomor"><?php echo $detail['no_dokumen']; ?></td>
               <br><br>
		</table>
	</table>

		<table width="100%">
			<tr>
		       <td>
			       <p style="font-size:14px"> Yang bertanda tangan dibawah ini kami, Kepala lurah Jombatan, Kecamatan Jombang, Kabupaten Jombang, dengan ini menerangkan bahwa:</p>
		       </td>
		    </tr>
		</table>
          <br><br>


          <?php if ($detail['nama_dokumen'] == "SURAT KEPEMILIKAN KENDARAAN") : ?>
               <table width="100%">
			<tr>
				<td class="text2"><b> Nama</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['pembuat']; ?></td>
			</tr>
			<tr>
				<td class="text2"><b> NIK</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['nik']; ?></td>
			</tr>
               <tr>
				<td class="text2"><b> Alamat</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['alamat_pembuat']; ?></td>
			</tr>
               <table width="100%">
			<tr>
		       <td>
			       <p style="font-size:14px">Bahwa orang tersebut benar benar memiliki kendaraan dengan keterangan sebagai berikut :</p>
		       </td>
		    </tr>
		</table>
     </table>
          <table width="100%">
                    <tr>
				<td class="text2"><b> No Polisi</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['no_polisi']; ?></td>
			     </tr>
                    <tr>
				<td class="text2"><b> Atas nama</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['atn']; ?></td>
			     </tr>
                    <tr>
				<td class="text2"><b> Jenis</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['jns']; ?></td>
			     </tr>
                    <tr>
				<td class="text2"><b> Tahun</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['tahun']; ?></td>
			     </tr>
                    <tr>
				<td class="text2"><b> Warna</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['wrn']; ?></td>
			     </tr>
                    <tr>
				<td class="text2"><b> No Rangka</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['no_rgk']; ?></td>
			     </tr>
                    <tr>
				<td class="text2"><b> No Mesin</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['no_msn']; ?></td>
			     </tr>
                    <tr>
				<td class="text2"><b> No BPKB</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['no_bpkb']; ?></td>
			     </tr>
          </table>

                    <?php elseif ($detail['nama_dokumen'] == "SURAT DOMISILI TEMPAT USAHA") : ?>
                         <table width="100%">
                         <tr>
				<td class="text2"><b> Nama</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['pembuat']; ?></td>
			</tr>
			<tr>
				<td class="text2"><b> NIK</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['nik']; ?></td>
			</tr>
               <tr>
				<td class="text2"><b> Alamat</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['alamat_pembuat']; ?></td>
			</tr>
               <tr>
				<td class="text2"><b> No HP</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['no_hp']; ?></td>
			</tr>
                </table>
               <table width="100%">
			<tr>
		       <td>
			       <p style="font-size:14px">Bahwa orang tersebut benar benar memilik usaha yang berdomisili di wilayah kelurahan Jombatan dengan keterangan sebagai berikut :</p>
		       </td>
		    </tr>
		</table>
          <table width="100%">  
                <tr>
				<td class="text2"><b> Nama Usaha</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['nama_usaha']; ?></td>
			</tr>
               <tr>
				<td class="text2"><b> Alamat Usaha</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['alamat_usaha']; ?></td>
			</tr>
                    </table>

               <?php elseif ($detail['nama_dokumen'] == "SURAT DOMISILI UMUM") : ?>
                    <table width="100%">
               <tr>
				<td class="text2"><b> Nama</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['pembuat']; ?></td>
			</tr>
			<tr>
				<td class="text2"><b> NIK</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['nik']; ?></td>
			</tr>
               <tr>
				<td class="text2"><b> Jenis Kelamin</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['jk']; ?></td>
			</tr>
               <tr>
				<td class="text2"><b> Alamat</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['alamat_pembuat']; ?></td>
			</tr>
               <tr>
				<td class="text2"><b> Tempat, Tanggal lahir</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['tmp_lhr']; ?>, <?php echo format_indo($detail['tgl_lahir']); ?> </td>
			</tr>
               <table width="100%">
			<tr>
		       <td>
			       <p style="font-size:14px">Bahwa orang tersebut benar benar berada di alamat <?php echo $detail['alamat_pembuat']; ?> sehingga masih masuk dengan wilayah kelurahan kami. </p>
		       </td>
		    </tr>
		</table></table>

          <?php elseif ($detail['nama_dokumen'] == "SURAT KEMATIAN") : ?>
                         <table width="100%">
                         <tr>
				<td class="text2"><b> Nama</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['pembuat']; ?></td>
			</tr>
			<tr>
				<td class="text2"><b> NIK</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['nik']; ?></td>
			</tr>
               <tr>
				<td class="text2"><b> Alamat</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['alamat_pembuat']; ?></td>
			</tr>
               <tr>
				<td class="text2"><b> Jenis Kelamin</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['jk']; ?></td>
			</tr>
               <tr>
				<td class="text2"><b> Tempat, Tanggal lahir</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['tmp_lhr']; ?>, <?php echo format_indo($detail['tgl_lahir']); ?> </td>
			</tr>
                </table>
               <table width="100%">
			<tr>
		       <td>
			       <p style="font-size:14px">Bahwa orang tersebut Telah meninggal dunia pada :</p>
		       </td>
		    </tr>
		</table>
          <table width="100%">  
                <tr>
				<td class="text2"><b>Tanggal</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo format_indo($detail['tgl_mgl']); ?></td>
			</tr>
                    </table>
                    <table width="100%">
			<tr>
		       <td>
			       <p style="font-size:14px">Dilaporkan oleh :</p>
		       </td>
		    </tr>
		</table>
          <table width="100%">  
                <tr>
				<td class="text2"><b>Nama Pelapor</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['nama_pelapor']; ?></td>
			</tr>
               <tr>
				<td class="text2"><b>NIK Pelapor</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['nik_pelapor']; ?></td>
			</tr>
               <tr>
				<td class="text2"><b>Hubungan dengan alm/almh</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['hub']; ?></td>
			</tr>
                    </table>

                    <?php elseif ($detail['nama_dokumen'] == "SURAT PINDAH PENDUDUK") : ?>
                         <table width="100%">
                         <tr>
				<td class="text2"><b> Nama</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['pembuat']; ?></td>
			</tr>
			<tr>
				<td class="text2"><b> NIK</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['nik']; ?></td>
			</tr>
               <tr>
				<td class="text2"><b> Alamat</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['alamat_pembuat']; ?></td>
			</tr>
               <tr>
				<td class="text2"><b> Jenis Kelamin</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['jk']; ?></td>
			</tr>
               <tr>
				<td class="text2"><b> Tempat, Tanggal lahir</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['tmp_lhr']; ?>, <?php echo format_indo($detail['tgl_lahir']); ?> </td>
			</tr>
                </table>
               <table width="100%">
			<tr>
		       <td>
			       <p style="font-size:14px">Bahwa orang tersebut memohon untuk pindah ke :</p>
		       </td>
		    </tr>
		</table>
          <table width="100%">  
                <tr>
				<td class="text2"><b>Alamat Tujuan</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['alamat_tujuan']; ?></td>
			</tr>
                    </table>

                    <?php elseif ($detail['nama_dokumen'] == "SURAT KETERANGAN TIDAK MAMPU") : ?>
                         <table width="100%">
                         <tr>
				<td class="text2"><b> Nama</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['pembuat']; ?></td>
			</tr>
			<tr>
				<td class="text2"><b> NIK</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['nik']; ?></td>
			</tr>
               <tr>
				<td class="text2"><b> Alamat</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['alamat_pembuat']; ?></td>
			</tr>
               <tr>
				<td class="text2"><b> Jenis Kelamin</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['jk']; ?></td>
			</tr>
               <tr>
				<td class="text2"><b> Tempat, Tanggal lahir</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['tmp_lhr']; ?>, <?php echo format_indo($detail['tgl_lahir']); ?> </td>
			</tr>
                </table>
               <table width="100%">
			<tr>
		       <td>
			       <p style="font-size:14px">Setelah dilaksanakannya peninjauan terhadap yang bersangkutan sehingga telah dikeluarkan surat keterangan ini bahwa yang bersangkutan tergolong Tidak Mampu</p>
		       </td>
		    </tr>
		</table>

          <?php elseif ($detail['nama_dokumen'] == "SURAT PENGANTAR SKCK") : ?>
                         <table width="100%">
                         <tr>
				<td class="text2"><b> Nama</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['pembuat']; ?></td>
			</tr>
			<tr>
				<td class="text2"><b> NIK</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['nik']; ?></td>
			</tr>
               <tr>
				<td class="text2"><b> Alamat</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['alamat_pembuat']; ?></td>
			</tr>
               <tr>
				<td class="text2"><b> Jenis Kelamin</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['jk']; ?></td>
			</tr>
               <tr>
				<td class="text2"><b> Tempat, Tanggal lahir</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['tmp_lhr']; ?>, <?php echo format_indo($detail['tgl_lahir']); ?> </td>
			</tr>
               <tr>
				<td class="text2"><b> No HP</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['no_hp']; ?></td>
			</tr>
                </table>
               <table width="100%">
			<tr>
		       <td>
			       <p style="font-size:14px">Adalah benar benar warga kelurahan Jombatan yang berdomisili di alamat tersebut. Berdasarkan catatan kami yang bersangkutan :  </p>
		       </td>
		    </tr>
              <tr>
              <td class="text2"> 1. Berkelakuan dan beristiadat baik.</td>
		    </tr>
              <tr>
              <td class="text2"> 2. Tidak ketergantungan pada obat terlarang.</td>
		    </tr>
              <tr>
              <td class="text2"> 3. Tidak dalam perkara kriminal</td>
		    </tr>
              <tr>
              <td class="text2"> 4. Tidak sedang dicabut hak pilihnya</td>
		    </tr>
		</table>

          <?php elseif ($detail['nama_dokumen'] == "SURAT KETERANGAN USAHA") : ?>
                         <table width="100%">
                         <tr>
				<td class="text2"><b> Nama</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['pembuat']; ?></td>
			</tr>
			<tr>
				<td class="text2"><b> NIK</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['nik']; ?></td>
			</tr>
               <tr>
				<td class="text2"><b> Alamat</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['alamat_pembuat']; ?></td>
			</tr>
               <tr>
				<td class="text2"><b> Jenis Kelamin</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['jk']; ?></td>
			</tr>
               <tr>
				<td class="text2"><b> Tempat, Tanggal lahir</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['tmp_lhr']; ?>, <?php echo format_indo($detail['tgl_lahir']); ?> </td>
			</tr>
               <tr>
				<td class="text2"><b> No HP</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['no_hp']; ?></td>
			</tr>
                </table>
               <table width="100%">
			<tr>
		       <td>
			       <p style="font-size:14px">sesuai dengan keterangan yang bersangkutan benar atas nama tersebut mempunyai usaha sebagai berikut :</p>
		       </td>
		    </tr>
		</table>
          <table width="100%">  
                <tr>
				<td class="text2"><b>Nama Usaha</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['nama_usaha']; ?></td>
			</tr>
               <tr>
				<td class="text2"><b>Alamat Usaha</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['alamat_usaha']; ?></td>
			</tr>
                    </table>

                    <?php elseif ($detail['nama_dokumen'] == "SURAT KELAHIRAN") : ?>
                         <table width="100%">
                         <tr>
				<td class="text2"><b> Nama</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['pembuat']; ?></td>
			</tr>
               <tr>
				<td class="text2"><b> Agama</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['agama']; ?></td>
			</tr>
               <tr>
				<td class="text2"><b> Jenis Kelamin</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['jk']; ?></td>
			</tr>
               <tr>
				<td class="text2"><b> Tempat, Tanggal lahir</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['tmp_lhr']; ?>, <?php echo format_indo($detail['tgl_lahir']); ?> </td>
			</tr>
                </table>
               <table width="100%">
			<tr>
		       <td>
			       <p style="font-size:14px">Adalah anak dari :</p>
		       </td>
		    </tr>
		</table>
          <table width="100%">  
                <tr>
				<td class="text2"><b>Ayah</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['ayah']; ?></td>
			</tr>
               <tr>
				<td class="text2"><b>Ibu</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['ibu']; ?></td>
			</tr>
               <tr>
				<td class="text2"><b>Anak Ke</b></td>
                    <td width="40"> : </td>
                    <td width ="100%" class="nama"><?php echo $detail['anakke']; ?></td>
			</tr>
                    </table>
               <?php endif; ?>
          <table width="100%">
			<tr>
		       <td>
			       <p style="font-size:14px"> Demikian surat ini kami buat dengan sebenarnya untuk dipergunakan sebagaimana mestinya</p>
		       </td>
		    </tr>
		</table>
		</table>
          <br>
          <br>
          <br>
		<table width="100%">
			<tr>
				<td width="70%"><br><br><br><br></td>
				<td class="text2"><?php echo tanggal() ?><br>Kepala Lurah<br><br><br><br><br><?php echo $kepdes['penanggung_jawab']; ?></td>
			</tr>
	     </table>
	</center>
</body></html>