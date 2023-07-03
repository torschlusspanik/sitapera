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
                       <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add-user"><i class="fas fa-envelope"></i> <b>Tambah petugas</b></button>
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
                                   <th>Nama petugas</th>
                                   <th>Tanggal Lahir</th>
                                   <th>Jenis Kelamin</th>
                                   <th>Status</th>
                                   <th>Opsi</th>
                               </thead>
                               <tbody>
                                   <?php $i = 1; ?>
                                   <?php foreach ($petugas as $lu) : ?>
                                       <tr>
                                           <td><?php echo $i++; ?></td>
                                           <td><?php echo $lu['nama_petugas']; ?></td>
                                           <td><?php echo format_indo($lu['tgl_lahir_petugas']); ?></td>
                                           <td><?php echo $lu['jk_petugas']; ?></td>
                                           <?php if ($lu['status_petugas'] == 1) : ?>
                                               <td class="text-center">Aktif</td>
                                           <?php else : ?>
                                               <td class="text-center text-danger">Tidak Aktif</td>
                                           <?php endif; ?>
                                           <td><a href="#" class="tombol-edit btn btn-info btn-sm" data-id="<?php echo $lu['id_petugas']; ?>" data-toggle="modal" data-target="#detail-warga"><i class="fas fa-edit"></i></a></td>
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

   <!-- Modal -->
   <div class="modal fade" id="add-user">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <h4 class="modal-title">Tambah petugas</h4>
               </div>
               <div class="modal-body">
                   <div class="box-body">
                       <form action="<?php echo base_url('admin/mst_petugas'); ?>" method="post">
                           <div class="form-group">
                               <label>Nama petugas</label>
                               <input type="text" class="form-control form-control-sm" name="nama_petugas" required>
                           </div>
                           <div class="form-group">
                               <label for="jk_lgn">Jenis Kelamin</label>
                               <select class="form-control form-control-sm" name="jk_petugas" required>
                                   <option value="">- Pilih -</option>
                                   <option value="Perempuan">PEREMPUAN</option>
                                   <option value="Laki-Laki">LAKI-LAKI</option>
                               </select>
                           </div>

                           <div class="form-group">
                     <label for="tgl_lahir">Tanggal lahir</label>
                         <input type="date" class="form-control" name="tgl_lahir_petugas"  required>
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

   <div class="modal fade" id="detail-warga">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <h4 class="modal-title">Edit Data</h4>
               </div>
               <div class="modal-body">
                   <div class="box-body">
                       <form action="<?php echo base_url('admin/edit_petugas'); ?>" method="post">
                           <div class="form-group">
                               <label>Nama petugas</label>
                               <input type="text" class="form-control form-control-sm" name="nama_petugas" id="nama_petugas" required>
                           </div>
                           <div class="form-group">
                               <label for="jk_petugas">Jenis Kelamin</label>
                               <select class="form-control form-control-sm" name="jk_petugas" id="jk_petugas" required>
                                   <option value="">- Pilih -</option>
                                   <option value="Perempuan">PEREMPUAN</option>
                                   <option value="Laki-Laki">LAKI-LAKI</option>
                               </select>
                           </div>

                           <div class="form-group">
                     <label for="tgl_lahir">Tanggal lahir</label>
                         <input type="date" class="form-control" name="tgl_lahir_petugas" id="tgl_lahir_petugas"  required>
                     </div>
                           <div class="form-group">
                               <div class="form-check form-check-inline">
                                   <input type="hidden" name="id_petugas" id="id_petugas">
                                   <input class="form-check-input" type="radio" name="status_petugas" id="status_petugas" value="1" checked required>
                                   <label class="form-check-label" for="inlineRadio1">Aktif</label>
                               </div>
                               <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="status_petugas" id="status_petugas" value="0">
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
           const id_petugas = $(this).data('id');
           $.ajax({
               url: '<?php echo base_url('admin/get_petugas'); ?>',
               data: {
                   id_petugas: id_petugas
               },
               method: 'post',
               dataType: 'json',
               success: function(data) {
                   $('#nama_petugas').val(data.nama_petugas);
                   $('#jk_petugas').val(data.jk_petugas);
                   $('#tgl_lahir_petugas').val(data.tgl_lahir_petugas);
                   $('#id_petugas').val(data.id_petugas);
               }
           });
       });
   </script>