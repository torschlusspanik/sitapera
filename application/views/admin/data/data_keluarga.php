   <!-- Begin Page Content -->
   <div class="container-fluid">
       <div class="d-sm-flex align-items-center justify-content-between mb-4">
           <h2 class="h4 mb-0 text-gray-800"><?php echo $title; ?></h2>
           <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
           <a href="<?php echo base_url('admin/mst_warga'); ?>" class="btn btn-light btn-sm">Kembali</a>
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
                                   <th>Nama</th>
                                   <th>Status Keluarga</th>
                                   <th>Tempat Lahir</th>
                                   <th>Tgl Lahir</th>
                                   <th>Alamat</th>
                                   <th>No Telp</th>
                                   <th>Opsi</th>
                               </thead>
                               <tbody>
                                   <?php $i = 1; ?>
                                   <?php foreach ($keluarga as $lu) : ?>
                                       <tr>
                                           <td><?php echo $i++; ?></td>
                                           <td><?php echo $lu['nama_keluarga']; ?></td>
                                           <td><?php echo $lu['status_hubungan']; ?></td>
                                           <td><?php echo $lu['tmpt_lahir']; ?></td>
                                           <td><?php echo $lu['tgl_lahir_keluarga']; ?></td>
                                           <td><?php echo $lu['alamat']; ?></td>
                                           <td><?php echo $lu['telp']; ?></td>
                                           <td><a href="#" class="tombol-edit btn btn-primary btn-block btn-sm" data-id="<?php echo $lu['id_keluarga']; ?>" data-toggle="modal" data-target="#detail-warga"><i class="fas fa-edit"></i></a></td>
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
                       <form action="<?php echo base_url('admin/edit_keluarga'); ?>" method="post">
                           <input type="hidden" name="id_keluarga" id="id_keluarga">
                           <div class="form-group">
                               <label>Status Dalam Keluarga</label>
                               <select class="form-control" name="status_hubungan" id="status_hubungan">
                                   <option value="">- Pilih Status -</option>
                                   <option value="Orang Tua">Orang Tua</option>
                                   <option value="Istri">Istri</option>
                                   <option value="Anak">Anak</option>
                                   <option value="Saudara">Saudara</option>
                               </select>
                           </div>
                           <div class="form-group">
                               <label>Nama Orangtua/Anak/Istri/Saudara</label>
                               <input type="text" class="form-control form-control-sm" name="nama_keluarga" id="nama_keluarga" required>
                           </div>
                           <div class="row">
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label>Tempat Lahir</label>
                                       <input type="text" class="form-control form-control-sm" name="tmpt_lahir" id="tmpt_lahir" required>
                                   </div>
                               </div>
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label>Tgl Lahir</label>
                                       <input type="date" class="form-control form-control-sm" name="tgl_lahir_keluarga" id="tgl_lahir_keluarga" required>
                                   </div>
                               </div>
                           </div>
                           <div class="form-group">
                               <label>No Telp/HP</label>
                               <input type="number" class="form-control form-control-sm" name="telp" id="telp" required>
                           </div>

                           <div class="form-group">
                               <label>Alamat Sekarang</label>
                               <textarea class="form-control form-control-sm" name="alamat" rows="2" id="alamat" required></textarea>
                           </div>
                           <!-- /.box-body -->
                           <div class="box-footer">
                               <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                               <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
                           </div>
                       </form>
                       <!-- /.box-body -->
                       <div class="box-footer">

                       </div>
                   </div>
               </div>
               <!-- /.modal-content -->
           </div>
           <!-- /.modal-dialog -->
       </div>
   </div>

   <script>
       $('.tombol-edit').on('click', function() {
           const id_keluarga = $(this).data('id');
           $.ajax({
               url: '<?php echo base_url('admin/get_keluarga'); ?>',
               data: {
                   id_keluarga: id_keluarga
               },
               method: 'post',
               dataType: 'json',
               success: function(data) {
                   $('#status_hubungan').val(data.status_hubungan);
                   $('#nama_keluarga').val(data.nama_keluarga);
                   $('#tmpt_lahir').val(data.tmpt_lahir);
                   $('#tgl_lahir_keluarga').val(data.tgl_lahir_keluarga);
                   $('#telp').val(data.telp);
                   $('#alamat').val(data.alamat);
                   $('#id_keluarga').val(data.id_keluarga);
               }
           });
       });
   </script>