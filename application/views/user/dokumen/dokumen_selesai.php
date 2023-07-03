   <!-- Begin Page Content -->
   <div class="container-fluid">
       <div class="d-sm-flex align-items-center justify-content-between mb-1">
           <h5 class="h5 mb-0 text-gray-800"><?php echo $title; ?></h5>
       </div>
       <div class="row">
           <div class="col-xl-12 col-lg-5">
               <div class="card shadow mb-4">
                   <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                   </div>
                   <div class="card-body">
                       <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                       <?php echo $this->session->flashdata('msg'); ?>
                       <?php if (validation_errors()) { ?>
                           <div class="alert alert-danger">
                               <strong><?php echo strip_tags(validation_errors()); ?></strong>
                               <a href="" class="float-right text-decoration-none" data-dismiss="alert"><i class="fas fa-times"></i></a>
                           </div>
                       <?php } ?>
                       <div class="table-responsive">
                           <table class="table table-bordered" id="table-id" style="font-size:13px;">
                               <thead>
                                   <th>#</th>
                                   <th>Tgl</th>
                                   <th>Jenis Dokumen</th>
                                   <th>Status</th>
                                   <th>Opsi</th>
                               </thead>
                               <tbody>
                                   <?php $i = 1; ?>
                                   <?php foreach ($dokumen_saya as $lu) : ?>
                                    <?php if ($lu['status_db_dokumen'] == 0) : ?>
                                       <tr>
                                           <td><?php echo $i++; ?></td>
                                           <td><?php echo format_indo($lu['tgl_dokumen']); ?></td>
                                           <td><?php echo $lu['nama_dokumen']; ?></td>
                                           <td class="text-center text-success font-weight-bolder"><i class="far fa-check-circle fa-2x"></i></td>

                                           <?php else : ?>
                                               
                                           <?php endif; ?>
                                           <?php if ($lu['status_db_dokumen'] == 0) : ?>
                                            <td><a href="<?php echo base_url('user/detail_dokumen/' . $lu['id_db_dokumen']); ?>" class="btn btn-dark btn-sm btn-block">Detail</a></td>
                                           <?php endif; ?>


                                       </tr>
                                   <?php endforeach; ?>
                               </tbody>
                           </table>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
   </div>

   <!-- Modal -->
   <div class="modal fade" id="add-user">
       <div class="modal-dialog modal-lg">
           <div class="modal-content">
               <div class="modal-header">
                   <h4 class="modal-title">Tambah Pengajuan Dokumen</h4>
               </div>
               <div class="modal-body">
                   <div class="box-body">
                       <?php echo form_open_multipart('user/dokumen'); ?>
                       <div class="row">
                           <input type="hidden" class="form-control form-control-sm" name="no_dokumen" value="<?php echo 'jombatan/' . date('Ymd/His'); ?>">

                           <div class="col-md-6">
                               <div class="form-group">
                                   <label>Tanggal</label>
                                   <input type="date" class="form-control form-control-sm" name="tgl_dokumen" value="<?php echo date('Y/m/d'); ?>" required>
                               </div>
                           </div>
                           <div class="col-md-6">
                               <div class="form-group">
                                   <label>No NIK</label>
                                   <input type="text" class="form-control form-control-sm" name="nik" required>
                               </div>
                           </div>
                       </div>
                       <div class="form-group">
                           <label>Nama Dokumen</label>
                           <select class="form-control form-control-sm" name="dokumen_id" required>
                               <option>- Pilih -</option>
                               <?php foreach ($list_dokumen as $l) : ?>
                                   <option value="<?php echo $l['id_dokumen']; ?>"><?php echo $l['nama_dokumen']; ?></option>
                               <?php endforeach; ?>
                           </select>
                       </div>
                       <div class="form-group">
                           <label>Pembuat Dokumen</label>
                           <input type="text" class="form-control form-control-sm" name="pembuat" value="<?php echo $user['nama']; ?>" required>
                       </div>
                       <div class="form-group">
                           <label>Keterangan Permintaan Dokumen</label>
                           <textarea class="form-control" name="keterangan" rows="3" required></textarea>
                       </div>
                       <div class="box-footer">
                           <button type="submit" class="btn btn-primary">Simpan Data</button>
                           <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
                       </div>
                       </form>
                   </div>
               </div>
               <!-- /.modal-content -->
           </div>
           <!-- /.modal-dialog -->
       </div>
   </div>