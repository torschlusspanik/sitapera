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
                       <form class="form-inline" action="<?php echo base_url('admin/filter_utilitas'); ?>" method="post">
                           <label class="mb-2 mr-sm-2">Periode : </label>
                           <input type="date" class="form-control form-control-sm mb-2 mr-sm-2" name="tgl_awal" required>
                           <label class="mb-2 mr-sm-2"> - </label>
                           <input type="date" class="form-control form-control-sm mb-2 mr-sm-2" name="tgl_akhir" required>
                           <label>Kategori Perbaikan</label>
                           <select class="form-control form-control-sm" name="kategori_id" required>
                               <?php foreach ($kategori as $kategori1) : ?>
                                <option value="" selected disabled hidden>- Pilih -</option>  
                                   <option value="<?php echo $kategori1['id_kategori']; ?>"><?php echo $kategori1['nama_kategori']; ?></option  required>
                               <?php endforeach; ?>
                           </select>
                           <button type="submit" class="btn btn-primary btn-sm mb-2">Submit</button>
                       </form>
                   </div>
                   <div class="card-body">
                       <div class="table-responsive">
                           <table class="table table-bordered" id="table-table" style="font-size:13px;">
                           <thead>
                                   <th>No</th>
                                   <th>Tanggal</th>
                                   <th>Unit Kerja</th>
                                   <th>Perbaikan</th>
                                   <th>Status</th>
                               </thead>
                               <tbody>
                                   <?php $i = 1; ?>
                                   <?php foreach ($history as $lu) : ?>
                                    <?php if ($lu['status_db_permintaan'] == 1) : ?>
                                        <?php else : ?>
                                       <tr>
                                           <td><?php echo $i++; ?></td>
                                           <td><?php echo format_indo($lu['tgl_permintaan']); ?></td>
                                           <td><?php echo $lu['nama_unit']; ?></td>
                                           <td><?php echo $lu['nama_sub_kategori'] ?></td>
                                           <?php if ($lu['status_db_permintaan'] == 2) : ?>
                                               <td>Proses</td>
                                           <?php elseif ($lu['status_db_permintaan'] == 3) : ?>
                                               <td>Tidak Lengkap</td>
                                           <?php else : ?>
                                               <td>Selesai</td>
                                           <?php endif; ?>
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