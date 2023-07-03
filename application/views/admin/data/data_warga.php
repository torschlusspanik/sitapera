   <!-- Begin Page Content -->
   <div class="container-fluid">
       <div class="d-sm-flex align-items-center justify-content-between mb-4">
           <h2 class="h4 mb-0 text-gray-800"><?php echo $title; ?></h2>
           <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
       </div>
       <div class="row">
           <div class="col-xl-12 col-lg-5">
               <div class="card shadow mb-4">
                   <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                       <!-- <h6 class="m-0 font-weight-bold text-primary"><?php echo $title; ?></h6> -->
                       <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add-user"><i class="fas fa-user-plus"></i> <b>Tambah Warga</b></button>
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
                                   <th>Register</th>
                                   <th>Nama</th>
                                   <th>Alamat</th>
                                   <th>No KK</th>
                                   <th>No Telp</th>
                                   <th>Opsi</th>
                               </thead>
                               <tbody>
                                   <?php $i = 1; ?>
                                   <?php foreach ($list_warga as $lu) : ?>
                                       <tr>
                                           <td><?php echo $i++; ?></td>
                                           <td><?php echo format_indo($lu['tgl_register']); ?></td>
                                           <td><?php echo $lu['nama_warga']; ?></td>
                                           <td><?php echo $lu['alamat_sekarang']; ?></td>
                                           <td><?php echo $lu['no_kk']; ?></td>
                                           <td><?php echo $lu['no_telp']; ?></td>
                                           <td>
                                               <a href="#" class="tombol-edit btn btn-secondary btn-sm" data-id="<?php echo $lu['id_warga']; ?>" data-toggle="modal" data-target="#detail-warga"><i class="fas fa-info-circle"></i></a>
                                               <a href="<?php echo base_url('admin/data_keluarga/' . $lu['id_warga']); ?>" class="btn btn-dark btn-sm"><i class="far fa-eye"></i></a>
                                               <a href="#" class="tombol-edit btn btn-primary btn-sm" data-id="<?php echo $lu['id_warga']; ?>" data-toggle="modal" data-target="#edit-user"><i class="fas fa-edit"></i></a>
                                               <a href="<?php echo base_url('admin/del_warga/') . $lu['id_warga']; ?>" class="tombol-hapus btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
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
                   <h4 class="modal-title">Tambah Warga</h4>
               </div>
               <div class="modal-body">
                   <div class="box-body">
                       <form action="<?php echo base_url('admin/data_warga'); ?>" method="post">
                           <div class="form-group">
                               <label>Nama Lengkap</label>
                               <input type="text" class="form-control form-control-sm" name="nama_warga" required>
                           </div>
                           <div class="row">
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label>Tempat Lahir</label>
                                       <input type="text" class="form-control form-control-sm" name="tempat_lahir" required>
                                   </div>
                               </div>
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label>Tgl Lahir</label>
                                       <input type="date" class="form-control form-control-sm" name="tgl_lahir" required>
                                   </div>
                               </div>
                           </div>
                           <div class="row">
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label>No Kartu Keluarga</label>
                                       <input type="number" class="form-control form-control-sm" name="no_kk" required>
                                   </div>
                               </div>
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label>No NIK</label>
                                       <input type="number" class="form-control form-control-sm" name="no_nik" required>
                                   </div>
                               </div>
                           </div>
                           <div class="row">
                               <div class="col-md-3">
                                   <div class="form-group">
                                       <label>Jml Keluarga</label>
                                       <input type="number" class="form-control form-control-sm" name="jml_keluarga" required>
                                   </div>
                               </div>
                               <div class="col-md-4">
                                   <div class="form-group">
                                       <label>No Telp/HP</label>
                                       <input type="number" class="form-control form-control-sm" name="no_telp" required>
                                   </div>
                               </div>
                               <div class="col-md-5">
                                   <div class="form-group">
                                       <label>Status Pernikahan</label>
                                       <select class="form-group" id="add-user" name="status_nikah" required>
                                        <option>Kawin</option>
                                        <option>Belum Kawin</option>
                                        </select>
                                   </div>
                               </div>
                           </div>
                           <div class="form-group">
                               <label>Alamat Sekarang</label>
                               <textarea class="form-control form-control-sm" name="alamat_sekarang" rows="2" required></textarea>
                           </div>
                           <div class="form-group">
                               <label>Alamat Asal</label>
                               <textarea class="form-control form-control-sm" name="alamat_asal" rows="2" required></textarea>
                           </div>
                           <!-- /.box-body -->
                           <div class="box-footer">
                               <button type="submit" class="btn btn-primary pull-right">Simpan Data</button>
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

   <div class="modal fade" id="edit-user">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <h4 class="modal-title">Edit Warga</h4>
               </div>
               <div class="modal-body">
                   <div class="box-body">
                       <form action="<?php echo base_url('admin/edit_warga'); ?>" method="post">
                           <input type="hidden" name="id_warga" id="id_warga">
                           <div class="form-group">
                               <label>Nama Lengkap</label>
                               <input type="text" class="form-control form-control-sm" name="nama_warga" id="nama_warga" required>
                           </div>
                           <div class="row">
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label>Tempat Lahir</label>
                                       <input type="text" class="form-control form-control-sm" name="tempat_lahir" id="tempat_lahir" required>
                                   </div>
                               </div>
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label>Tgl Lahir</label>
                                       <input type="date" class="form-control form-control-sm" name="tgl_lahir" id="tgl_lahir" required>
                                   </div>
                               </div>
                           </div>
                           <div class="row">
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label>No Kartu Keluarga</label>
                                       <input type="number" class="form-control form-control-sm" name="no_kk" id="no_kk" required>
                                   </div>
                               </div>
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label>No NIK</label>
                                       <input type="number" class="form-control form-control-sm" name="no_nik" id="no_nik" required>
                                   </div>
                               </div>
                           </div>
                           <div class="row">
                               <div class="col-md-3">
                                   <div class="form-group">
                                       <label>Jml Keluarga</label>
                                       <input type="number" class="form-control form-control-sm" name="jml_keluarga" id="jml_keluarga" required>
                                   </div>
                               </div>
                               <div class="col-md-4">
                                   <div class="form-group">
                                       <label>No Telp/HP</label>
                                       <input type="number" class="form-control form-control-sm" name="no_telp" id="no_telp" required>
                                   </div>
                               </div>
                               <div class="col-md-5">
                                   <div class="form-group">
                                       <label>Satus Pernikahan</label>
                                       <input type="text" class="form-control form-control-sm" name="status_nikah" id="status_nikah" required>
                                   </div>
                               </div>
                           </div>
                           <div class="form-group">
                               <label>Alamat Sekarang</label>
                               <textarea class="form-control form-control-sm" name="alamat_sekarang" rows="2" id="alamat_sekarang" required></textarea>
                           </div>
                           <div class="form-group">
                               <label>Alamat Asal</label>
                               <textarea class="form-control form-control-sm" name="alamat_asal" rows="2" id="alamat_asal" required></textarea>
                           </div>
                           <!-- /.box-body -->
                           <div class="box-footer">
                               <button type="submit" class="btn btn-primary pull-right">Simpan Data</button>
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
       <div class="modal-dialog modal-xl">
           <div class="modal-content">
               <div class="modal-header">
                   <h4 class="modal-title">Detail Warga</h4>
               </div>
               <div class="modal-body">
                   <div class="box-body">
                       <div class="row">
                           <div class="col-md-6">
                               <div class="card">
                                   <div class="card-header">
                                       Detail Warga
                                   </div>
                                   <div class="card-body">
                                       <input type="hidden" name="id_warga" id="id_warga_detail">
                                       <div class="form-group row mt-0 mb-0">
                                           <label class="col-sm-3 col-form-label">Register</label>
                                           <div class="col-sm-9">
                                               <input type="text" readonly class="form-control-plaintext font-weight-bolder" id="tgl_register_detail">
                                           </div>
                                       </div>
                                       <div class="form-group row mt-0 mb-0">
                                           <label class="col-sm-3 col-form-label">Nama</label>
                                           <div class="col-sm-9">
                                               <input type="text" readonly class="form-control-plaintext font-weight-bolder" id="nama_warga_detail">
                                           </div>
                                       </div>
                                       <div class="form-group row mt-0 mb-0">
                                           <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                                           <div class="col-sm-9">
                                               <input type="text" readonly class="form-control-plaintext font-weight-bolder" id="tempat_lahir_detail">
                                           </div>
                                       </div>
                                       <div class="form-group row mt-0 mb-0">
                                           <label class="col-sm-3 col-form-label">Tgl Lahir</label>
                                           <div class="col-sm-9">
                                               <input type="text" readonly class="form-control-plaintext font-weight-bolder" id="tgl_lahir_detail">
                                           </div>
                                       </div>
                                       <div class="form-group row mt-0 mb-0">
                                           <label class="col-sm-3 col-form-label">No KK</label>
                                           <div class="col-sm-9">
                                               <input type="text" readonly class="form-control-plaintext font-weight-bolder" id="no_kk_detail">
                                           </div>
                                       </div>
                                       <div class="form-group row mt-0 mb-0">
                                           <label class="col-sm-3 col-form-label">No NIK</label>
                                           <div class="col-sm-9">
                                               <input type="text" readonly class="form-control-plaintext font-weight-bolder" id="no_nik_detail">
                                           </div>
                                       </div>
                                       <div class="form-group row mt-0 mb-0">
                                           <label class="col-sm-3 col-form-label">Jml. Keluarga</label>
                                           <div class="col-sm-9">
                                               <input type="text" readonly class="form-control-plaintext font-weight-bolder" id="jml_keluarga_detail">
                                           </div>
                                       </div>
                                       <div class="form-group row mt-0 mb-0">
                                           <label class="col-sm-3 col-form-label">Status Nikah</label>
                                           <div class="col-sm-9">
                                               <input type="text" readonly class="form-control-plaintext font-weight-bolder" id="status_nikah_detail">
                                           </div>
                                       </div>
                                       <div class="form-group row mt-0 mb-0">
                                           <label class="col-sm-3 col-form-label">Alamat Skrg</label>
                                           <div class="col-sm-9">
                                               <input type="text" readonly class="form-control-plaintext font-weight-bolder" id="alamat_sekarang_detail">
                                           </div>
                                       </div>
                                       <div class="form-group row mt-0 mb-0">
                                           <label class="col-sm-3 col-form-label">Alamat Asal</label>
                                           <div class="col-sm-9">
                                               <input type="text" readonly class="form-control-plaintext font-weight-bolder" id="alamat_asal_detail">
                                           </div>
                                       </div>
                                       <div class="form-group row mt-0 mb-0">
                                           <label class="col-sm-3 col-form-label">No Telp/HP</label>
                                           <div class="col-sm-9">
                                               <input type="text" readonly class="form-control-plaintext font-weight-bolder" id="no_telp_detail">
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="col-md-6">
                               <div class="card">
                                   <div class="card-header">
                                       Masukkan Data Keluarga
                                   </div>
                                   <div class="card-body">
                                       <form action="<?php echo base_url('admin/add_keluarga'); ?>" method="post">
                                           <input type="hidden" name="id_warga" id="id_warga_keluarga">
                                           <div class="form-group">
                                               <label>Status Dalam Keluarga</label>
                                               <select class="form-control" name="status_hubungan">
                                                   <option value="">- Pilih Status -</option>
                                                   <option value="Orang Tua">Orang Tua</option>
                                                   <option value="Istri">Istri</option>
                                                   <option value="Anak">Anak</option>
                                                   <option value="Saudara">Saudara</option>
                                               </select>
                                           </div>
                                           <div class="form-group">
                                               <label>Nama Orangtua/Anak/Istri/Saudara</label>
                                               <input type="text" class="form-control form-control-sm" name="nama_keluarga" required>
                                           </div>
                                           <div class="row">
                                               <div class="col-md-6">
                                                   <div class="form-group">
                                                       <label>Tempat Lahir</label>
                                                       <input type="text" class="form-control form-control-sm" name="tmpt_lahir" required>
                                                   </div>
                                               </div>
                                               <div class="col-md-6">
                                                   <div class="form-group">
                                                       <label>Tgl Lahir</label>
                                                       <input type="date" class="form-control form-control-sm" name="tgl_lahir_keluarga" required>
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="form-group">
                                               <label>No Telp/HP</label>
                                               <input type="number" class="form-control form-control-sm" name="telp" required>
                                           </div>

                                           <div class="form-group">
                                               <label>Alamat Sekarang</label>
                                               <textarea class="form-control form-control-sm" name="alamat" rows="2" required></textarea>
                                           </div>
                                           <!-- /.box-body -->
                                           <div class="box-footer">
                                               <button type="submit" class="btn btn-primary">Simpan Data</button>
                                               <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
                                           </div>
                                       </form>
                                   </div>
                               </div>
                           </div>
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
           const id_warga = $(this).data('id');
           $.ajax({
               url: '<?php echo base_url('admin/get_warga'); ?>',
               data: {
                   id_warga: id_warga
               },
               method: 'post',
               dataType: 'json',
               success: function(data) {
                   $('#nama_warga').val(data.nama_warga);
                   $('#tempat_lahir').val(data.tempat_lahir);
                   $('#tgl_lahir').val(data.tgl_lahir);
                   $('#no_kk').val(data.no_kk);
                   $('#no_nik').val(data.no_nik);
                   $('#jml_keluarga').val(data.jml_keluarga);
                   $('#no_telp').val(data.no_telp);
                   $('#status_nikah').val(data.status_nikah);
                   $('#alamat_sekarang').val(data.alamat_sekarang);
                   $('#alamat_asal').val(data.alamat_asal);
                   $('#id_warga').val(data.id_warga);
                   $('#nama_warga_detail').val(data.nama_warga);
                   $('#tgl_register_detail').val(data.tgl_register);
                   $('#tgl_lahir_detail').val(data.tgl_lahir);
                   $('#tempat_lahir_detail').val(data.tempat_lahir);
                   $('#no_kk_detail').val(data.no_kk);
                   $('#no_nik_detail').val(data.no_nik);
                   $('#jml_keluarga_detail').val(data.jml_keluarga);
                   $('#no_telp_detail').val(data.no_telp);
                   $('#status_nikah_detail').val(data.status_nikah);
                   $('#alamat_sekarang_detail').val(data.alamat_sekarang);
                   $('#alamat_asal_detail').val(data.alamat_asal);
                   $('#id_warga_detail').val(data.id_warga);
                   $('#id_warga_keluarga').val(data.id_warga);
               }
           });
       });
   </script>