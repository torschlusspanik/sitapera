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
                           <table class="table table-bordered" id="table-table">
                               <thead>
                                   <th>#</th>
                                   <th>Tgl Pengajuan</th>
                                   <th>Nama Dokumen</th>
                                   <th>Pembuat Dokumen</th>
                                   <th>Tgl Respon</th>
                                   <th>Status</th>
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
                                           <?php if ($lu['status_db_dokumen'] == 1) : ?>
                                               <td>Waiting</td>
                                           <?php elseif ($lu['status_db_dokumen'] == 2) : ?>
                                               <td>Proses</td>
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
       <div class="row">
       <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-primary shadow h-100 py-2">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                             <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Dokumen</div>
                             <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jml_dokumen; ?></div>
                         </div>
                         <div class="col-auto">
                             <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-primary shadow h-100 py-2">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                             <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Domisili Tempat Usaha</div>
                             <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jml_dtu; ?></div>
                         </div>
                         <div class="col-auto">
                             <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-primary shadow h-100 py-2">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                             <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Surat Kelahiran</div>
                             <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jml_sk; ?></div>
                         </div>
                         <div class="col-auto">
                             <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-primary shadow h-100 py-2">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                             <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Surat Keterangan Usaha</div>
                             <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jml_sku; ?></div>
                         </div>
                         <div class="col-auto">
                             <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-primary shadow h-100 py-2">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                             <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">SKCK</div>
                             <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jml_skck; ?></div>
                         </div>
                         <div class="col-auto">
                             <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-primary shadow h-100 py-2">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                             <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">SKTM</div>
                             <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jml_sktm; ?></div>
                         </div>
                         <div class="col-auto">
                             <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-primary shadow h-100 py-2">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                             <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pindah Penduduk</div>
                             <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jml_pp; ?></div>
                         </div>
                         <div class="col-auto">
                             <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-primary shadow h-100 py-2">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                             <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Surat Kematian</div>
                             <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jml_kmt; ?></div>
                         </div>
                         <div class="col-auto">
                             <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-primary shadow h-100 py-2">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                             <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Domisili Umum</div>
                             <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jml_du; ?></div>
                         </div>
                         <div class="col-auto">
                             <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-primary shadow h-100 py-2">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                             <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Kepemilikan Kendaraan</div>
                             <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jml_kpk; ?></div>
                         </div>
                         <div class="col-auto">
                             <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>


   </div>