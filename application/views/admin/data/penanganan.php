   <!-- Begin Page Content -->
   <div class="container-fluid">
       <div class="d-sm-flex align-items-center justify-content-between mb-4">
           <h2 class="h4 mb-0 text-gray-800"><b>Penanganan Permintaan</b>
           <!-- <?php echo $title; ?> --></h2> 
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
                                   <th>Tanggal Pengajuan</th>
                                   <th>Jam Pengajuan</th>
                                   <th>Unit Kerja </th>
                                   <th>Kategori Permintaan</th>
                                   <th>Sub Kategori Permintaan</th>
                                   <th>Keterangan</th>
                                   <th>Petugas</th>
                                   <th>Status</th>
                                   <th>Opsi</th>
                               </thead>
                               <tbody>
                                   <?php $i = 1; ?>
                                   <?php foreach ($penanganan as $lu) : ?>

                                    <?php if ($lu['status_db_permintaan'] == 1) : ?>
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
                                           <td><button class="btn btn-warning btn-sm btn-block text-dark">PENGAJUAN</button></td>
                                            <td>
                                            <a href="<?php echo base_url('admin/info_permintaan/' . $lu['id_db_permintaan']); ?>" class="tombol-edit btn btn-info "><i class="fas fa-edit"></i></a>
                                           
                                           <?php elseif ($lu['status_db_permintaan'] == 2) : ?>
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
                                           <td class="text-center text-info font-weight-bolder">Proses</td>
                                           <td>
                                           <a href="<?php echo base_url('admin/info_permintaan/' . $lu['id_db_permintaan']); ?>" class="tombol-edit btn btn-info "><i class="fas fa-edit"></i></a>
                                          </td>
                                           
                                          <?php elseif ($lu['status_db_permintaan'] == 7) : ?>
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
                                           <td class="text-center text-info font-weight-bolder">Menunggu Verifikasi</td>
                                           <td>
                                           <a href="<?php echo base_url('admin/info_permintaan/' . $lu['id_db_permintaan']); ?>" class="tombol-edit btn btn-info "><i class="fas fa-edit"></i></a>
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