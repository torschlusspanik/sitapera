   <!-- Begin Page Content -->
   <div class="container-fluid">
       <div class="d-sm-flex align-items-center justify-content-between mb-4">
           <h2 class="h4 mb-0 text-gray-800"><?php echo $title; ?></h2>
           <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
       </div>
       <div class="row">
           <div class="col-xl-12 col-lg-5">
               <div class="card shadow mb-4">
                   <div class="card-body">
                       <div class="table-responsive">
                           <table class="table table-bordered" id="table-id" style="font-size:13px;">
                               <thead>
                                   <th>#</th>
                                   <th>Tgl Pengajuan</th>
                                   <th>Nama Dokumen</th>
                                   <th>Pembuat Dokumen</th>
                                   <th>Status</th>
                                   <th>Opsi</th>
                               </thead>
                               <tbody>
                                   <?php $i = 1; ?>
                                   <?php foreach ($dokumen as $lu) : ?>

                                    <?php if ($lu['status_db_dokumen'] == 1) : ?>
                                       <tr>
                                           <td><?php echo $i++; ?></td>
                                           <td><?php echo format_indo($lu['tgl_dokumen']); ?></td>
                                           <td><?php echo $lu['nama_dokumen']; ?></td>
                                           <td><?php echo $lu['pembuat']; ?></td>
                                           <td><button class="btn btn-warning btn-sm btn-block text-dark">PENGAJUAN</button></td>
                                           <td>
                                            <a href="<?php echo base_url('admin/info_dokumen/' . $lu['id_db_dokumen']); ?>" class="tombol-edit btn btn-info "><i class="fas fa-edit"></i></a>
                                            <a href="<?php echo base_url('admin/print/' . $lu['id_db_dokumen']); ?>" class="tombol-edit btn btn-info"><i class="fas fa-print"></i></a>
                                           </td>
                                           
                                           <?php elseif ($lu['status_db_dokumen'] == 2) : ?>
                                           <td><?php echo $i++; ?></td>
                                           <td><?php echo format_indo($lu['tgl_dokumen']); ?></td>
                                           <td><?php echo $lu['nama_dokumen']; ?></td>
                                           <td><?php echo $lu['pembuat']; ?></td>
                                           <td class="text-center text-info font-weight-bolder">PROSES</td>
                                           <td>
                                            <a href="<?php echo base_url('admin/info_dokumen/' . $lu['id_db_dokumen']); ?>" class="tombol-edit btn btn-info "><i class="fas fa-edit"></i></a>
                                            <a href="<?php echo base_url('admin/print/' . $lu['id_db_dokumen']); ?>" class="tombol-edit btn btn-info "><i class="fas fa-print"></i></a>
                                          </td>
                                           
                                           <?php else : ?>
                                           
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