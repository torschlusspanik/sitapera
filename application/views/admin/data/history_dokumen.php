   <!-- Begin Page Content -->
   <div class="container-fluid">
       <div class="d-sm-flex align-items-center justify-content-between mb-4">
           <h2 class="h4 mb-0 text-gray-800"><?php echo $title; ?></h2>
           <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
       </div>
       <div class="row">
           <div class="col-xl-12 col-lg-5">
               <div class="card shadow mb-4">
                   <div class="card-header">
                       <form class="form-inline" action="<?php echo base_url('admin/filter_dokumen'); ?>" method="post">
                           <label class="mb-2 mr-sm-2">Periode : </label>
                           <input type="date" class="form-control form-control-sm mb-2 mr-sm-2" name="tgl_awal" required>
                           <label class="mb-2 mr-sm-2"> - </label>
                           <input type="date" class="form-control form-control-sm mb-2 mr-sm-2" name="tgl_akhir" required>
                           <button type="submit" class="btn btn-primary btn-sm mb-2">Submit</button>
                       </form>
                   </div>
                   <div class="card-body">
                       <div class="table-responsive">
                           <table class="table table-bordered" id="table-id" style="font-size:13px;">
                               <thead>
                                   <th>#</th>
                                   <th>Tgl Pengajuan</th>
                                   <th>Nama Dokumen</th>
                                   <th>Pembuat Dokumen</th>
                                   <th>Tgl Respon</th>
                                   <th>Status</th>
                                   <th>Opsi</th>
                               </thead>
                               <tbody>
                                   <?php $i = 1; ?>
                                   <?php foreach ($dokumen as $lu) : ?>
                                    <?php if ($lu['status_db_dokumen'] == 1) : ?>
                                        <?php else : ?>
                                       <tr>
                                           <td><?php echo $i++; ?></td>
                                           <td><?php echo format_indo($lu['tgl_dokumen']); ?></td>
                                           <td><?php echo $lu['nama_dokumen']; ?></td>
                                           <td><?php echo $lu['pembuat']; ?></td>
                                           <?php if ($lu['tgl_upload'] == 0) : ?>
                                            <td><?php echo format_indo ($lu['tgl_respon']); ?></td>
                                            <?php else : ?>  
                                           <td><?php echo format_indo ($lu['tgl_upload']); ?></td>
                                           <?php endif; ?>
                                               <?php if ($lu['status_db_dokumen'] == 2) : ?>
                                               <td>Proses</td>
                                           <?php elseif ($lu['status_db_dokumen'] == 3) : ?>
                                               <td>Tidak Lengkap</td>
                                           <?php else : ?>
                                               <td>Selesai</td>
                                           <?php endif; ?>
                                           <td><a href="<?php echo base_url('admin/info_history/' . $lu['id_db_dokumen']); ?>" class="tombol-edit btn btn-info btn-block btn-sm"><i class="fas fa-edit"></i></a></td>
                                       </tr>
                                       <?php endif; ?>
                                   <?php endforeach; ?>
                               </tbody>
                           </table>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>