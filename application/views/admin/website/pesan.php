   <!-- Begin Page Content -->
   <div class="container-fluid">
       <div class="row">
           <div class="col-xl-12 col-lg-5">
               <div class="card shadow mb-4">
                   <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                       <?php echo $title; ?>
                       <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                       <?php echo $this->session->flashdata('msg'); ?>
                       <?php if (validation_errors()) { ?>
                           <div class="alert alert-danger">
                               <strong><?php echo strip_tags(validation_errors()); ?></strong>
                               <a href="" class="float-right text-decoration-none" data-dismiss="alert"><i class="fas fa-times"></i></a>
                           </div>
                       <?php } ?>
                   </div>
                   <div class="card-body">
                       <div class="table-responsive">
                           <table class="table table-bordered" id="table-id">
                               <thead>
                                   <th>#</th>
                                   <th>Tgl Masuk</th>
                                   <th>Nama</th>
                                   <th>Email</th>
                                   <th>Subyek</th>
                                   <th>Isi Pesan</th>
                                   <th>Opsi</th>
                               </thead>
                               <tbody>
                                   <?php $i = 1; ?>
                                   <?php foreach ($pesan as $lu) : ?>
                                       <tr>
                                           <td><?php echo $i++; ?></td>
                                           <td><?php echo format_indo($lu['tgl_pesan']); ?></td>
                                           <td><?php echo $lu['nama_pesan']; ?></td>
                                           <td><?php echo $lu['email_pesan']; ?></td>
                                           <td><?php echo $lu['subyek_pesan']; ?></td>
                                           <td><?php echo $lu['pesan']; ?></td>
                                           <td>
                                               <a href="<?php echo base_url('admin/del_pesan/') . $lu['id_pesan']; ?>" class="tombol-hapus btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
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