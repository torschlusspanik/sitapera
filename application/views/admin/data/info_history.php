   <!-- Begin Page Content -->
   <div class="container-fluid">
       <div class="d-sm-flex align-items-center justify-content-between mb-4">
           <h2 class="h4 mb-0 text-gray-800"><?php echo $title; ?></h2>
           <a href="<?php echo base_url('admin/dokumen'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-light shadow-sm">Kembali</a>
       </div>
       <div class="row">
           <div class="col-xl-12 col-lg-5">
               <div class="card shadow mb-4">
                   <div class="card-body">
                       <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                       <?php echo $this->session->flashdata('msg'); ?>
                       <?php if (validation_errors()) { ?>
                           <div class="alert alert-danger">
                               <strong><?php echo strip_tags(validation_errors()); ?></strong>
                           </div>
                       <?php } ?>
                       <div class="row">
                           <div class="col-md-8">
                               <table>
                                   <tr>
                                       <th>Nama Dokumen</th>
                                       <th> : </th>
                                       <th><?php echo $detail['nama_dokumen']; ?></th>
                                   </tr>
                                   <tr>
                                       <th>No Dokumen</th>
                                       <th> : </th>
                                        <th><?php echo $detail['no_dokumen']; ?></th>
                                   </tr>
                                   <tr>
                                       <th>Tgl Dokumen</th>
                                       <th> : </th>
                                       <th><?php echo format_indo($detail['tgl_dokumen']); ?></th>
                                   </tr>
                                   <tr>
                                   <?php if ($detail['nik'] == "") : ?>
                                        <td style="visibility:hidden;">
                                        <?php else : ?>
                                       <th>NIK</th>
                                       <th> : </th>
                                       <th><?php echo $detail['nik']; ?></th>
                                       <?php endif; ?>
                                   </tr>
                                   <tr>
                                       <th>Pembuat Dokumen</th>
                                       <th> : </th>
                                       <th><?php echo $detail['pembuat']; ?></th>
                                   </tr>
                                   <tr>
                                   <?php if ($detail['tgl_lahir'] == "") : ?>
                                        <td style="visibility:hidden;">
                                        <?php else : ?>
                                       <th>Tgl Lahir</th>
                                       <th> : </th>
                                       <th><?php echo format_indo($detail['tgl_lahir']); ?></th>
                                       <?php endif; ?>
                                   </tr>
                                   <tr>
                                   <?php if ($detail['no_hp'] == "") : ?>
                                        <td style="visibility:hidden;">
                                        <?php else : ?>
                                       <th>No HP</th>
                                       <th> : </th>
                                       <th><?php echo $detail['no_hp']; ?></th>
                                       <?php endif; ?>
                                   </tr>
                                   <tr>
                                   <?php if ($detail['keterangan'] == "") : ?>
                                        <td style="visibility:hidden;">
                                        <?php else : ?>
                                        <th>Keterangan</th>
                                       <th> : </th>
                                       <th><?php echo $detail['keterangan']; ?></th>    
                                        <?php endif; ?>
                                   </tr>
                                   <tr>
                                   <?php if ($detail['alamat_usaha'] == "") : ?>
                                        <td style="visibility:hidden;">
                                        <?php else : ?>
                                        <th>Alamat Usaha</th>
                                       <th> : </th>
                                       <th><?php echo $detail['alamat_usaha']; ?></th>    
                                        <?php endif; ?>
                                   </tr>
                                   <tr>
                                   <?php if ($detail['alamat_pembuat'] == "") : ?>
                                        <td style="visibility:hidden;">
                                        <?php else : ?>
                                        <th>Alamat Pembuat</th>
                                       <th> : </th>
                                       <th><?php echo $detail['alamat_pembuat']; ?></th>    
                                        <?php endif; ?>
                                   </tr>
                                   <tr>
                                   <?php if ($detail['nama_usaha'] == "") : ?>
                                        <td style="visibility:hidden;">
                                        <?php else : ?>
                                        <th>Nama Usaha</th>
                                       <th> : </th>
                                       <th><?php echo $detail['nama_usaha']; ?></th>    
                                        <?php endif; ?>
                                   </tr>
                                   <tr>
                                       <th>Status</th>
                                       <th> : </th>
                                       <?php if ($detail['status_db_dokumen'] == 1) : ?>
                                           <th class="text-danger">Waiting...| <button class="badge badge-primary btn-sm text-large" data-toggle="modal" data-target="#detail-warga">Ubah Status Dokumen</button>
                                           </th>
                                       <?php elseif ($detail['status_db_dokumen'] == 2) : ?>
                                           <th class="text-danger"><i class="fas fa-hourglass-start"></i> Proses | <button class="badge badge-primary btn-sm" data-toggle="modal" data-target="#detail-warga">Ubah Status Dokumen</button></th>
                                           <?php elseif ($detail['status_db_dokumen'] == 3) : ?>
                                           <th class="text-danger"><i class="fas fa-hourglass-start"></i> Tidak lengkap | <button class="badge badge-primary btn-sm" data-toggle="modal" data-target="#detail-warga">Ubah Status Dokumen</button></th>
                                       <?php else : ?>
                                           <th><i class="fas fa-check-square"></i> Selesai</th>
                                       <?php endif; ?>
                                   </tr>
                                   <tr>
                                       <th>File Upload</th>
                                       <th> : </th>
                                       <th><?php echo $detail['file_dokumen']; ?> | <?php echo $detail['tgl_upload']; ?></th>
                                   </tr>
                                   <hr>
                               
                           </div>
                           <div class="row">
                           <div class="col-md-4">
                           <div class="card-body">
                               <div class="table-responsive">
                                   <table class="table table-bordered" id="table">
                                       <thead>
                                           <th>KTP</th>
                                           <th>KK</th>
                                           <th>Pengantar RT RW</th>

                                           <?php if ($detail['lampiran2'] == "") : ?>
                                            <td style="visibility:hidden;">
                                            <?php else : ?>
                                            <th>Lampiran</th>
                                            <?php endif; ?>

                                             <?php if ($detail['lampiran3'] == "") : ?>
                                            <td style="visibility:hidden;">
                                            <?php else : ?>
                                            <th>Lampiran2</th>
                                            <?php endif; ?>
                                            
                                           <th>lampiran3</th>
                                       </thead>
                                       <tr>
                                            <td> <embed src="<?php echo base_url('assets/files/' . $detail['ktp']); ?>" class="img-thumbnail" alt=""></td>
                                            <td> <embed src="<?php echo base_url('assets/files/' . $detail['kk']); ?>" class="img-thumbnail" alt=""></td>
                                            <td> <embed src="<?php echo base_url('assets/files/' . $detail['pengantar']); ?>" class="img-thumbnail" alt=""></td>
                                            <td> <embed src="<?php echo base_url('assets/files/' . $detail['lampiran2']); ?>" class="img-thumbnail" alt=""></td>
                                            <td> <embed src="<?php echo base_url('assets/files/' . $detail['lampiran3']); ?>" class="img-thumbnail" alt=""></td>
                                            <td> <embed src="<?php echo base_url('assets/files/' . $detail['lampiran4']); ?>" class="img-thumbnail" alt=""></td>
                                      </tr>
                                      </table>
                                       </div>
                                       </div>
                                       </div>
                                       </div>
   <div class="modal fade" id="detail-warga">
       <div class="modal-dialog modal-sm">
           <div class="modal-content">
               <div class="modal-header">
                   <h4 class="modal-title">Status Dokumen</h4>
               </div>
               <div class="modal-body">
                   <div class="box-body">
                       <form action="<?php echo base_url('admin/ubah_status_dokumen'); ?>" method="post">
                           <input type="hidden" name="id_db_dokumen" value="<?php echo $detail['id_db_dokumen']; ?>">
                           <div class="form-group">
                               <label>No Dokumen</label>
                               <input type="text" class="form-control form-control-sm" name="no_dokumen" value="<?php echo $detail['no_dokumen']; ?>" readonly>
                           </div>
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" name="status_db_dokumen" id="inlineRadio1" value="2" checked>
                               <label class="form-check-label" for="inlineRadio1">Proses</label>
                           </div>
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" name="status_db_dokumen" id="inlineRadio2" value="0">
                               <label class="form-check-label" for="inlineRadio2">Selesai</label>
                           </div>
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" name="status_db_dokumen" id="inlineRadio2" value="3">
                               <label class="form-check-label" for="inlineRadio2">Tidak lengkap</label>
                           </div>
                           <hr>
                           <div class="box-footer">
                               <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                               <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
                           </div>
                       </form>
                       
                       <div class="box-footer">
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>

   <div class="modal fade" id="upload">
       <div class="modal-dialog modal-sm">
           <div class="modal-content">
               <div class="modal-body">
                   <div class="box-body">
                       <?php echo form_open_multipart('admin/upload_dokumen/' . $detail['id_db_dokumen']); ?>
                       <input type="hidden" name="db_dokumen_id" value="<?php echo $detail['id_db_dokumen']; ?>">
                       <input type="hidden" name="no_dokumen_upload" value="<?php echo $detail['no_dokumen']; ?>">
                       <div class="form-group">
                           <label for="exampleFormControlFile1">Upload File</label>
                           <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file_dokumen" required>
                       </div>
                       <div class="box-footer">
                           <button type="submit" class="btn btn-primary">Unggah</button>
                           <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
                       </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
   </div>