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
                       <form class="form-inline" action="<?php echo base_url('admin/filter_permintaan'); ?>" method="post">
                           <label class="mb-2 mr-sm-2">Periode : </label>
                           <input type="date" class="form-control form-control-sm mb-2 mr-sm-2" name="tgl_awal" required>
                           <label class="mb-2 mr-sm-2"> - </label>
                           <input type="date" class="form-control form-control-sm mb-2 mr-sm-2" name="tgl_akhir" required>
                           <button type="submit" class="btn btn-primary btn-sm mb-2">Submit</button>
                       </form>
                   </div>
                   <div class="card-body">
                       <div class="table-responsive">
                           <table class="table table-bordered" id="table-table">
                               <thead>
                                   <th>#</th>
                                   <th>Tgl Pengajuan</th>
                                   <th>Nama permintaan</th>
                                   <th>Nama Unit</th>
                                   <th>Tgl Selesai</th>
                                   <th>Petugas</th>
                                   <th>Status</th>
                               </thead>
                               <tbody>
                                   <?php $i = 1; ?>
                                   <?php foreach ($anjay as $lu) : ?>
                                       <tr>
                                           <td><?php echo $i++; ?></td>
                                           <td><?php echo format_indo($lu['tgl_permintaan']); ?></td>
                                           <td><?php echo $lu['nama_kategori']; ?></td>
                                           <td><?php echo $lu['nama_unit']; ?></td>
                                           <?php if ($lu['tgl_selesai'] == '0000-00-00') : ?>
                                               <td>belum / Proses</td>
                                           <?php else : ?>
                                            <td><?php echo format_indo($lu['tgl_selesai']); ?></td>
                                            <?php endif; ?>
                                            <td><?php echo $lu['nama_petugas']; ?> </td>
                                           <?php if ($lu['status_db_permintaan'] == 1) : ?>
                                               <td>Waiting</td>
                                           <?php elseif ($lu['status_db_permintaan'] == 2) : ?>
                                               <td>Proses</td>
                                           <?php else : ?>
                                               <td>Selesai</td>
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