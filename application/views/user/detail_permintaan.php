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
                                   <?php if ($detail['nama_unit'] == "") : ?>
                                            <td style="visibility:hidden;">
                                            <?php else : ?>
                                            <th>Nama Unit </th>
                                            <th> : </th>
                                            <th><?php echo $detail['nama_unit']; ?></th>
                                            <?php endif; ?>
                                            </tr>
                                   <tr>
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
                                           <?php elseif ($detail['status_db_permintaan'] == 7) : ?>
                                           <th class="text-primary"><i class="fas fa-hourglass-start"></i> Menunggu Verifikasi </th>
                                           <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#verifikasi">Verifikasi Selesai</button>
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

   <div class="modal fade" id="verifikasi">
       <div class="modal-dialog modal-lg">
           <div class="modal-content">
               <div class="modal-header">
                   <h4 class="modal-title">Verifikasi Selesai</h4>
               </div>
               <div class="modal-body">
                   <div class="box-body">
                   <?php echo form_open_multipart('user/ubah_verifikasi/' . $detail['id_db_permintaan']); ?>
                <br>
                <input type="hidden" class="form-control form-control-sm" name="tgl_verif" value="<?php echo date('Y/m/d'); ?>">

            <div class="row">
                <div class="col-md-12">
                     <div class="form-group">
                        <label>Upload Scan Tanda Tangan Ka ruangan</label>
                            <input type="file" class="form-control-file" name="signature" required>
                    </div>  
                    <div class="text-muted mb-1">
                           * Ekstensi file jpg, png, dan jpeg
                           <br>
                           * Ukuran file tidak lebih dari 5 MB
                       </div>    
                               </div>   
                       </div>         
                       <hr>         
                       <div class="box-footer">
                           <button type="submit" class="btn btn-primary" >Simpan Data</button>
                       </div>
                       </form>
                       <div class="box-footer">
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
