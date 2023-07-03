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
                                       <tr>
                                           <td><?php echo $i++; ?></td>
                                           <td><?php echo format_indo($lu['tgl_dokumen']); ?></td>
                                           <td><?php echo $lu['nama_dokumen']; ?></td>
                                           <td><?php echo $lu['pembuat']; ?></td>
                                           <?php if ($lu['status_db_dokumen'] == 1) : ?>
                                               <td><button class="btn btn-warning btn-sm btn-block text-dark">WAITING</button></td>
                                           <?php elseif ($lu['status_db_dokumen'] == 2) : ?>
                                               <td class="text-center text-info font-weight-bolder">PROSES</td>
                                           <?php else : ?>
                                               <td><button class="btn btn-light btn-sm btn-block text-dark">SELESAI</button></td>
                                           <?php endif; ?>
                                           <td><a href="<?php echo base_url('admin/info_dokumen/' . $lu['id_db_dokumen']); ?>" class="tombol-edit btn btn-info btn-block btn-sm"><i class="fas fa-edit"></i></a></td>
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