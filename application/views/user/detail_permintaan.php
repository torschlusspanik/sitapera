   <!-- Begin Page Content -->
   <div class="container-fluid">
       <div class="d-sm-flex align-items-center justify-content-between mb-4">
           <h2 class="h4 mb-0 text-gray-800"><?php echo $title; ?></h2>
           <a href="<?php echo base_url('user/permintaan_terkirim'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-light shadow-sm">Kembali</a>
       </div>
       <div class="row">
           <div class="col-xl-12 col-lg-5">
               <div class="card shadow mb-4">
                   <div class="card-body">
                       <div class="row">
                           <div class="col-md-8">
                               <table>
                               <tr>
                                       <th>Nama kategori</th>
                                       <th> : </th>
                                       <th><?php echo $detail['nama_kategori']; ?></th>
                                   </tr>
                                   <tr>
                                       <th>Tanggal permintaan</th>
                                       <th> : </th>
                                       <th><?php echo format_indo($detail['tgl_permintaan']); ?></th>
                                   </tr>
                                   <tr>
                                       <th>Jam permintaan</th>
                                       <th> : </th>
                                       <th><?php echo ($detail['jam_permintaan']); ?></th>
                                   </tr>
                                   <tr>
                                       <th>Nama Unit</th>
                                       <th> : </th>
                                       <th><?php echo $detail['nama_unit']; ?></th>
                                   </tr>
                                   <tr>
                                       <th>Nama Unit</th>
                                       <th> : </th>
                                       <th><?php echo $detail['nama_unit']; ?></th>
                                   </tr>
                                   <tr>
                                   <?php if ($detail['urgas'] == "") : ?>
                                            <td style="visibility:hidden;">
                                            <?php else : ?>
                                            <th>Uraian Tugas </th>
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
                                           <th class="text-danger">Waiting...|
                                           </th>
                                       <?php elseif ($detail['status_db_permintaan'] == 2) : ?>
                                           <th class="text-primary"><i class="fas fa-hourglass-start"></i> Proses </th>
                                       <?php else : ?>
                                           <th class="text-success"><i class="fas fa-check-square"></i> Selesai</th>
                                       <?php endif; ?>
                                   </tr>
                               </table>