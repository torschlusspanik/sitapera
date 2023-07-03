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
                       <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add-user"><i class="fas fa-envelope"></i> <b>Tambah sub_kategori</b></button>
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
                                   <th>Nama Sub kategori</th>
                                   <th>Opsi</th>
                               </thead>
                               <tbody>
                                   <?php $i = 1; ?>
                                   <?php foreach ($sub_kategori as $lu) : ?>
                                       <tr>
                                           <td><?php echo $i++; ?></td>
                                           <td><?php echo $lu['nama_sub_kategori']; ?></td>
                                           <td>
                                               <a href="#" class="tombol-edit btn btn-primary btn-sm" data-id="<?php echo $lu['id_sub_kategori']; ?>" data-toggle="modal" data-target="#detail-warga"><i class="fas fa-edit"></i></a>
                                               <a href="<?php echo base_url('admin/del_sub_kategori/') . $lu['id_sub_kategori']; ?>" class="tombol-hapus btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
                                           </td>
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
                   <h4 class="modal-title">Tambah sub_kategori</h4>
               </div>
               <div class="modal-body">
                   <div class="box-body">
                       <form action="<?php echo base_url('admin/mst_sub_kategori'); ?>" method="post">
                           <div class="form-group">
                               <label>Nama sub_kategori</label>
                               <input type="text" class="form-control form-control-sm" name="nama_sub_kategori" required>
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
                       <form action="<?php echo base_url('admin/edit_sub_kategori'); ?>" method="post">
                           <div class="form-group">
                               <label>Nama sub_kategori</label>
                               <input type="text" class="form-control form-control-sm" name="nama_sub_kategori" id="nama_sub_kategori" required>
                           </div>
                           <input type="hidden" name="id_sub_kategori" id="id_sub_kategori">
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
           const id_sub_kategori = $(this).data('id');
           $.ajax({
               url: '<?php echo base_url('admin/get_sub_kategori'); ?>',
               data: {
                   id_sub_kategori: id_sub_kategori
               },
               method: 'post',
               dataType: 'json',
               success: function(data) {
                   $('#nama_sub_kategori').val(data.nama_sub_kategori);
                   $('#id_sub_kategori').val(data.id_sub_kategori);
               }
           });
       });
   </script>