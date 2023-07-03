   <!-- Begin Page Content -->
   <div class="container-fluid">
       <div class="d-sm-flex align-items-center justify-content-between mb-4">
           <h2 class="h4 mb-0 text-gray-800"><?php echo $title; ?></h2>
           <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
           <button type="button" class="btn btn-light btn-sm" onclick="window.history.back()">Kembali</button>
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
                                   <th>Nama Dokumen</th>
                                   <th>Opsi</th>
                               </thead>
                               <tbody>
                                   <?php $i = 1; ?>
                                   <?php foreach ($dokumen as $lu) : ?>
                                       <tr>
                                           <td><?php echo $i++; ?></td>
                                           <td><?php echo $lu['nama_dokumen']; ?></td>
                                           <td><a href="#" class="tombol-edit btn btn-info btn-sm" data-id="<?php echo $lu['id_dokumen']; ?>" data-toggle="modal" data-target="#detail-warga"><i class="fas fa-edit"></i></a></td>
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


   <div class="modal fade" id="detail-warga">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <h4 class="modal-title">Edit Data</h4>
               </div>
               <div class="modal-body">
                   <div class="box-body">
                       <form action="<?php echo base_url('user/pengajuan8'); ?>" method="post">
                           <div class="form-group">
                               <label>Nama Dokumen</label>
                               <input type="text" class="form-control form-control-sm" name="nama_dokumen" id="nama_dokumen" required>
                           </div>
                           <div class="form-group">
                               <div class="form-check form-check-inline">
                                   <input type="hidden" name="id_dokumen" id="id_dokumen">
                                   <input class="form-check-input" type="radio" name="status_dokumen" id="inlineRadio1" value="1" required>
                                   <label class="form-check-label" for="inlineRadio1">Aktif</label>
                               </div>
                               <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="status_dokumen" id="inlineRadio2" value="0">
                                   <label class="form-check-label" for="inlineRadio2">Tidak Aktif</label>
                               </div>
                           </div>
                           <div class="box-footer">
                               <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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

   <script>
       $('.tombol-edit').on('click', function() {
           const id_dokumen = $(this).data('id');
           $.ajax({
               url: '<?php echo base_url('admin/get_dokumen'); ?>',
               data: {
                   id_dokumen: id_dokumen
               },
               method: 'post',
               dataType: 'json',
               success: function(data) {
                   $('#nama_dokumen').val(data.nama_dokumen);
                   $('#id_dokumen').val(data.id_dokumen);
               }
           });
       });
   </script>