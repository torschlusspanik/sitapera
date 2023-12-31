   <!-- Begin Page Content -->
   <div class="container-fluid">
       <div class="d-sm-flex align-items-center justify-content-between mb-4">
           <h2 class="h4 mb-0 text-gray-800"><?php echo $title; ?></h2>
           <a href="<?php echo base_url('admin/penanganan'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-light shadow-sm">Kembali</a>
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
                               <th>Nama Unit</th>
                                       <th> : </th>
                                       <th><?php echo $detail['nama_unit']; ?></th>
                                   </tr>
                                   <tr>
                                       <th>Nama Kategori</th>
                                       <th> : </th>
                                       <th><?php echo $detail['nama_kategori']; ?></th>
                                   </tr>
                                   <tr>
                                       <th>Nama Sub Kategori</th>
                                       <th> : </th>
                                       <th><?php echo $detail['nama_sub_kategori']; ?></th>
                                   </tr>
                                   <tr>
                                       <th>Keterangan</th>
                                       <th> : </th>
                                       <th><?php echo $detail['urgas']; ?></th>
                                   </tr>
                                   <tr>
                                       <th>Tanggal Permintaan </th>
                                       <th> : </th>
                                       <th><?php echo format_indo($detail['tgl_permintaan']); ?></th>
                                   </tr>
                                   <tr>
                                       <th>Jam Permintaan</th>
                                       <th> : </th>
                                       <th><?php echo ($detail['jam_permintaan']); ?></th>
                                   </tr>
                                   <tr>
                                   <?php if ($detail['tgl_mulai'] == "0000-00-00") : ?>
                                            <td style="visibility:hidden;">
                                            <?php else : ?>
                                            <th>Tanggal Mulai </th>
                                            <th> : </th>
                                            <th><?php echo format_indo($detail['tgl_mulai']); ?></th>
                                            <?php endif; ?>
                                            </tr>
                                            <?php if ($detail['jam_mulai'] == "00:00:00") : ?>
                                            <td style="visibility:hidden;">
                                            <?php else : ?>
                                            <th>Jam Mulai </th>
                                            <th> : </th>
                                            <th><?php echo $detail['jam_mulai']; ?></th>
                                            <?php endif; ?>
                                   <tr>
                                   <tr>
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
                                   <?php if ($detail['nama_petugas'] == "") : ?>
                                            <td style="visibility:hidden;">
                                            <?php else : ?>
                                            <th>Pelaksana </th>
                                            <th> : </th>
                                            <th><?php echo $detail['nama_petugas']; ?></th>
                                            <?php endif; ?>
                                            </tr>
                                            <tr>
                                   <?php if ($detail['hasil_kgt'] == "") : ?>
                                            <td style="visibility:hidden;">
                                            <?php else : ?>
                                            <th>Hasil Kegiatan </th>
                                            <th> : </th>
                                            <th><?php echo $detail['hasil_kgt']; ?></th>
                                            <?php endif; ?>
                                            </tr>
                                            <tr>
                                   <?php if ($detail['bhn_hasil'] == "") : ?>
                                            <td style="visibility:hidden;">
                                            <?php else : ?>
                                            <th>Bahan Hasil  </th>
                                            <th> : </th>
                                            <th><?php echo $detail['bhn_hasil']; ?></th>
                                            <?php endif; ?>
                                            </tr>
                                   <tr>
                                       <th>Status</th>
                                       <th> : </th>
                                       <?php if ($detail['status_db_permintaan'] == 1) : ?>
                                           <th class="text-danger">Menunggu...
                                           </th>
                                           <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#proses">Proses Permintaan</button>
                                       <?php elseif ($detail['status_db_permintaan'] == 2) : ?>
                                           <th class="text-primary"><i class="fas fa-hourglass-start"></i> Proses </th>
                                           <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#selesai">Selesaikan Permintaan</button>
                                           <?php elseif ($detail['status_db_permintaan'] == 7) : ?>
                                           <th class="text-primary"><i class="fas fa-share"></i> Menunggu Verifikasi </th>
                                           <a href="<?php echo base_url('admin/print/' . $detail['id_db_permintaan']); ?>" class="tombol-edit btn btn-danger "><i class="fas fa-print"></i> Cetak Permintaan</a>
                                       <?php else : ?>
                                           <th class="text-success"><i class="fas fa-check-square"></i> Selesai</th>
                                           <a href="<?php echo base_url('admin/print_selesai/' . $detail['id_db_permintaan']); ?>" class="tombol-edit btn btn-danger "><i class="fas fa-print"></i> Cetak Permintaan</a>
                                       <?php endif; ?>

                                   </tr>
                               
                           </div>
                           <div class="row">
                           <div class="col-md-10">
                           <div class="card-body">
                               <div class="table-responsive">
                                   <table class="table table-bordered" id="table">
                                       <thead>
                                       
                                      </tr>
                                      </table>
                                       </div>
                                       </div>
                                       </div>
                                       </div>

                                       
   <div class="modal fade" id="proses">
       <div class="modal-dialog modal-sm">
           <div class="modal-content">
               <div class="modal-header">
                   <h4 class="modal-title">Proses Permintaan</h4>
               </div>
               <div class="modal-body">
                   <div class="box-body">
                       <form action="<?php echo base_url('admin/ubah_proses'); ?>" method="post">
                           <input type="hidden" name="id_db_permintaan" value="<?php echo $detail['id_db_permintaan']; ?>">
                           <div class="form-check form-check-inline">
                           <input type="hidden" name="status_db_permintaan" value="2">
                           </div>
                           <label> PILIH Petugas</label>
                           <select class="form-control form-control" name="petugas_id" required>
                           <?php foreach ($petugas as $petugas1) : ?>
                                <option value="" selected disabled hidden>- Pilih -</option>
                                   <option value="<?php echo $petugas1['id_petugas']; ?>"><?php echo $petugas1['nama_petugas']; ?></option>
                                   <?php endforeach; ?>
                           </select>
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
   <div class="modal fade" id="selesai">
       <div class="modal-dialog modal-sm">
           <div class="modal-content">
               <div class="modal-header">
                   <h4 class="modal-title">Selesaikan Permintaan?</h4>
               </div>
               <div class="modal-body">
                   <div class="box-body">
                       <form action="<?php echo base_url('admin/ubah_selesai'); ?>" method="post">
                           <input type="hidden" name="id_db_permintaan" value="<?php echo $detail['id_db_permintaan']; ?>">
                           <div class="form-check form-check-inline">
                           <input type="hidden" name="status_db_permintaan" value="2">
                           </div>
                           <div class="form-group">
                               <label>Nama Petugas</label>
                               <input type="text" class="form-control form-control-sm" name="petugas_id" value="<?php echo $petugas1['nama_petugas']; ?>" readonly>
                           </div>
                           <hr>
                           <div class="box-footer">
                               <button type="submit" class="btn btn-success">Selesai</button>
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