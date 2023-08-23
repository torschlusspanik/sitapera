   <!-- Begin Page Content -->
   <div class="container-fluid">
       <div class="d-sm-flex align-items-center justify-content-between mb-4">
           <h2 class="h4 mb-0 text-gray-800"><b>Histori Permintaan</b>
           <!-- <?php echo $title; ?> --></h2> 
           <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
       </div>
       <div class="row">
           <div class="col-xl-12 col-lg-5">
               <div class="card shadow mb-4">
                   <div class="card-header">
                       <form class="form-inline" action="<?php echo base_url('admin/history_permintaan2'); ?>" method="post">
                           <label class="mb-2 mr-sm-2">Periode : </label>
                           <input type="date" class="form-control form-control-sm mb-2 mr-sm-2" name="tgl_awal" required>
                           <label class="mb-2 mr-sm-2"> - </label>
                           <input type="date" class="form-control form-control-sm mb-2 mr-sm-2" name="tgl_akhir" required>
                           <button type="submit" class="btn btn-primary btn-sm mb-2">Tampilkan</button>
                       </form>
                   </div>
                   <div class="card-body">
                       <div class="table-responsive">
                           <table class="table table-bordered" id="table-id" style="font-size:13px;">
                               <thead>
                                   <th>#</th>
                                   <th>Tanggal Permintaan</th>
                                   <th>Jam Pengajuan</th>
                                   <th>Nama Unit</th>
                                   <th>Kategori Permintaan</th>
                                   <th>Sub Kategori Permintaan</th>
                                   <th>Keterangan</th>
                                   <th>Petugas</th>
                                   <th>Tanggal Selesai</th>
                                   <th>Status</th>
                                   <th>Opsi</th>
                               </thead>
                               <tbody>
                                   <?php $i = 1; ?>
                                   <?php foreach ($history as $lu) : ?>
                                    <?php if ($lu['status_db_permintaan'] == 1) : ?>
                                        <?php else : ?>
                                       <tr>
                                           <td><?php echo $i++; ?></td>
                                           <td><?php echo format_indo($lu['tgl_permintaan']); ?></td>
                                           <td><?php echo $lu['jam_permintaan']; ?></td>
                                           <td><?php echo $lu['nama_unit']; ?></td>
                                           <td><?php echo $lu['nama_kategori']; ?></td>
                                           <td><?php echo $lu['nama_sub_kategori']; ?></td>
                                           <td><?php echo $lu['urgas']; ?></td>
                                           <?php if ($lu['nama_petugas'] == "") : ?>
                                            <td> <?php echo "";?></td>
                                            <?php else : ?>
                                            <td><?php echo $lu['nama_petugas']; ?></td>
                                            <?php endif; ?>
                                           <?php if ($lu['tgl_selesai'] == "0000-00-00") : ?>
                                            <td><?php echo "Proses"; ?></td>
                                            <?php else : ?>  
                                           <td><?php echo format_indo ($lu['tgl_selesai']); ?></td>
                                           <?php endif; ?>
                                               <?php if ($lu['status_db_permintaan'] == 2) : ?>
                                               <td>Proses</td>
                                           <?php elseif ($lu['status_db_permintaan'] == 3) : ?>
                                               <td>Tidak Lengkap</td>
                                           <?php else : ?>
                                               <td>Selesai</td>
                                           <?php endif; ?>
                                           <td>
                                           <a href="<?php echo base_url('admin/info_history/' . $lu['id_db_permintaan']); ?>" class="tombol-edit btn btn-info "><i class="fa fa-info"></i></a>
                                          </td>
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