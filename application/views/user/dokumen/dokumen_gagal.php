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
                                    <?php if ($lu['status_db_dokumen'] == 3) : ?>
                                       <tr>
                                           <td><?php echo $i++; ?></td>
                                           <td><?php echo format_indo($lu['tgl_dokumen']); ?></td>
                                           <td><?php echo $lu['nama_dokumen']; ?></td>
                                           <td class="text-center text-danger font-weight-bolder">SURAT TIDAK LENGKAP</td>

                                           <?php else : ?>
                                               
                                           <?php endif; ?>
                                           <?php if ($lu['status_db_dokumen'] == 3) : ?>

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

           </div>
           <!-- /.modal-dialog -->
       </div>
   </div>