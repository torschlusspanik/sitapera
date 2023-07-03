   <!-- Begin Page Content -->
   <div class="container-fluid">
       <div class="d-sm-flex align-items-center justify-content-between mb-4">
           <h2 class="h4 mb-0 text-gray-800"><?php echo $title; ?></h2>
           <a href="<?php echo base_url('user/dokumen'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-light shadow-sm">Kembali</a>
       </div>
       <div class="row">
           <div class="col-xl-12 col-lg-5">
               <div class="card shadow mb-4">
                   <div class="card-body">
                       <div class="row">
                           <div class="col-md-8">
                               <table>
                                   <tr>
                                       <td>Nama Dokumen</td>
                                       <td> : </td>
                                       <td><?php echo $detail['nama_dokumen']; ?></td>
                                   </tr>
                                   <tr>
                                       <td>No Dokumen</td>
                                       <td> : </td>
                                       <td><?php echo $detail['no_dokumen']; ?></td>
                                   </tr>
                                   <tr>
                                       <td>Tgl Dokumen</td>
                                       <td> : </td>
                                       <td><?php echo $detail['tgl_dokumen']; ?></td>
                                   </tr>
                                   <tr>
                                       <td>Pembuat Dokumen</td>
                                       <td> : </td>
                                       <td><?php echo $detail['pembuat']; ?></td>
                                   </tr>
                                   <tr>
                                       <td>Keterangan</td>
                                       <td> : </td>
                                       <td><?php echo $detail['ket_db_dok']; ?></td>
                                   </tr>
                                   <tr>
                                       <th>Status</th>
                                       <th> : </th>
                                       <?php if ($detail['status_db_dokumen'] == 1) : ?>
                                           <th class="text-danger">Waiting...</th>
                                       <?php elseif ($detail['status_db_dokumen'] == 2) : ?>
                                           <th class="text-danger">Proses...</th>
                                           <?php elseif ($detail['status_db_dokumen'] == 3) : ?>
                                           <th class="text-danger">Dokumen tidak lengkap!</th>
                                       <?php else : ?>
                                           <th>Selesai</th>
                                       <?php endif; ?>
                                   </tr>
                               </table>
                           </div>
                           <div class="row">
                           <div class="col-md-10">
                           <div class="card-body">
                               <div class="table-responsive">
                                   <table class="table table-bordered" id="table">
                                       <thead>
                                           <th>KTP</th>
                                           <th>KK</th>
                                           <th>Pengantar RT RW</th>

                                            <?php if ($detail['lampiran2'] == "") : ?>
                                            <td style="visibility:hidden;">
                                            <?php else : ?>
                                            <th>Lampiran</th>
                                            <?php endif; ?>

                                             <?php if ($detail['lampiran3'] == "") : ?>
                                            <td style="visibility:hidden;">
                                            <?php else : ?>
                                            <th>Lampiran2</th>
                                            <?php endif; ?>
                                            
                                            <?php if ($detail['lampiran4'] == "") : ?>
                                            <td style="visibility:hidden;">
                                            <?php else : ?>
                                            <th>Lampiran3</th>
                                            <?php endif; ?>
                                       </thead>
                                       <tr>
                                            <td> <embed src="<?php echo base_url('assets/files/' . $detail['ktp']); ?>" class="img-thumbnail" alt=""></td>
                                            <td> <embed src="<?php echo base_url('assets/files/' . $detail['kk']); ?>" class="img-thumbnail" alt=""></td>
                                            <td> <embed src="<?php echo base_url('assets/files/' . $detail['pengantar']); ?>" class="img-thumbnail" alt=""></td>

                                            <?php if ($detail['lampiran2'] == "") : ?>
                                            <td style="visibility:hidden;">
                                            <?php else : ?>>
                                            <td> <embed src="<?php echo base_url('assets/files/' . $detail['lampiran2']); ?>" class="img-thumbnail" alt=""></td>
                                            <?php endif; ?>

                                            <?php if ($detail['lampiran3'] == "") : ?>
                                            <td style="visibility:hidden;">
                                            <?php else : ?>>
                                            <td> <embed src="<?php echo base_url('assets/files/' . $detail['lampiran3']); ?>" class="img-thumbnail" alt=""></td>
                                            <?php endif; ?>

                                            <?php if ($detail['lampiran3'] == "") : ?>
                                            <td style="visibility:hidden;">
                                            <?php else : ?>>
                                            <td> <embed src="<?php echo base_url('assets/files/' . $detail['lampiran4']); ?>" class="img-thumbnail" alt=""></td>
                                            <?php endif; ?>
                                      </tr>
                                      </table>
                                       </div>
                                       </div>
                                       </div>
                                       </div>
                   <div class="card-footer">
                       <?php if ($detail['status_db_dokumen'] == 0) : ?>
                        <a href="<?php echo base_url('user/unduh_dokumen/' . $detail['id_db_dokumen']); ?>" class="btn btn-primary btn-sm"><i class="fas fa-download"></i> Unduh Data <?php echo $detail['nama_dokumen']; ?></a>
                       <?php else : ?>
                       <?php endif; ?>
                   </div>
               </div>
           </div>
       </div>
   </div>