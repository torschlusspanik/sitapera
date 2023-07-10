   <!-- Begin Page Content -->
   <div class="container-fluid">
       <div class="d-sm-flex align-items-center justify-content-between mb-4">
           <h2 class="h4 mb-0 text-gray-800"><b>Detail Pengajuan Permintaan</b>
           <!-- <?php echo $title; ?> --></h2> 
           <a href="<?php echo base_url('user/permintaan_terkirim'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm">Kembali</a>
       </div>
       <div class="row">
           <div class="col-xl-12 col-lg-5">
               <div class="card shadow mb-4">
                   <div class="card-body">
                       <div class="row">
                           <div class="col-md-8">
                               <table>
                               <tr>
                                       <th>Nama Kategori</th>
                                       <th> : </th>
                                       <th><?php echo $detail['nama_kategori']; ?></th>
                                   </tr>
                                   <tr>
                                       <th>Tanggal Permintaan</th>
                                       <th> : </th>
                                       <th><?php echo format_indo($detail['tgl_permintaan']); ?></th>
                                   </tr>
                                   <tr>
                                       <th>Jam Permintaan</th>
                                       <th> : </th>
                                       <th><?php echo ($detail['jam_permintaan']); ?></th>
                                   </tr>
                                   <tr>
                                   <tr>
<<<<<<< HEAD
                                   <?php if ($detail['nama_unit'] == "") : ?>
                                            <td style="visibility:hidden;">
                                            <?php else : ?>
                                            <th>Nama Unit </th>
                                            <th> : </th>
                                            <th><?php echo $detail['nama_unit']; ?></th>
                                            <?php endif; ?>
                                            </tr>
                                   <tr>
=======
>>>>>>> b317f729ffc62703f7ef682f8ed2ae6f5d235709
                                   <?php if ($detail['urgas'] == "") : ?>
                                            <td style="visibility:hidden;">
                                            <?php else : ?>
                                            <th>Keterangan Tambahan</th>
                                            <th> : </th>
                                            <th><?php echo $detail['urgas']; ?></th>
                                            <?php endif; ?>
                                            </tr>
                                   <?php if ($detail['tgl_selesai'] == "0000-00-00") : ?>
                                            <td style="visibility:hidden;">
                                            <?php else : ?>
                                            <th>Tanggal Selesai </th>
                                            <th> : </th>
                                            <th><?php echo format_indo($detail['tgl_selesai']); ?></th>
                                            <?php endif; ?>
                                            </tr>
                                            <?php if ($detail['jam_selesai'] == "00:00:00") : ?>
                                            <td style="visibility:hidden;">
                                            <?php else : ?>
                                            <th>Jam Selesai </th>
                                            <th> : </th>
                                            <th><?php echo $detail['jam_selesai']; ?></th>
                                            <?php endif; ?>
                                   <tr>
                                   <tr>
                                       <th>Nama Petugas</th>
                                       <th> : </th>
                                       <th><?php echo $detail['nama_petugas']; ?></th>
                                   </tr>
                                   <tr>
                                       <th>Status</th>
                                       <th> : </th>
                                       <?php if ($detail['status_db_permintaan'] == 1) : ?>
                                           <th class="text-danger">Menunggu...
                                           </th>
                                       <?php elseif ($detail['status_db_permintaan'] == 2) : ?>
                                           <th class="text-primary"><i class="fas fa-hourglass-start"></i> Proses </th>
                                       <?php else : ?>
                                           <th class="text-success"><i class="fas fa-check-square"></i> Selesai</th>
                                       <?php endif; ?>
                                   </tr>
                               </table>
                               <div class="box-footer">
                               </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>