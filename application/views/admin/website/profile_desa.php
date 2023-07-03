   <!-- Begin Page Content -->
   <div class="container-fluid">
       <div class="row">
           <div class="col-xl-12 col-lg-5">
               <div class="card shadow mb-4">
                   <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                       <?php echo $title; ?>
                       <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                       <?php echo $this->session->flashdata('msg'); ?>
                       <?php if (validation_errors()) { ?>
                           <div class="alert alert-danger">
                               <strong><?php echo strip_tags(validation_errors()); ?></strong>
                               <a href="" class="float-right text-decoration-none" data-dismiss="alert"><i class="fas fa-times"></i></a>
                           </div>
                       <?php } ?>
                   </div>
                   <div class="card-body">
                       <div class="row">
                           <div class="col-md-1">
                           </div>
                           <div class="card card-body col-md-10">
                               <form action="<?php echo base_url('admin/profile_desa'); ?>" method="post">
                                   <input type="hidden" name="id_profile" value="<?php echo $profile['id_profile']; ?>">
                                   <div class="form-group">
                                       <labe>Nama Website</labe>
                                       <input type="text" class="form-control" name="nama_website" value="<?php echo $profile['nama_website']; ?>" required>
                                   </div>
                                   <div class="form-group">
                                       <labe>Nama Desa</labe>
                                       <input type="text" class="form-control" name="nama_desa" value="<?php echo $profile['nama_desa']; ?>" required>
                                   </div>
                                   <div class="form-group">
                                       <labe>Alamat</labe>
                                       <textarea class="form-control" name="alamat_desa" rows="3"><?php echo $profile['alamat_desa']; ?></textarea>
                                   </div>
                                   <div class="form-group">
                                       <labe>Email</labe>
                                       <input type="email" class="form-control" name="email_desa" value="<?php echo $profile['email_desa']; ?>" required>
                                   </div>
                                   <div class=" form-group">
                                       <labe>Kepala desa</labe>
                                       <input type="text" class="form-control" name="penanggung_jawab" value="<?php echo $profile['penanggung_jawab']; ?>" required>
                                   </div>
                                   <div class="form-group">
                                       <labe>No Telpon</labe>
                                       <input type="text" class="form-control" name="telp_desa" value="<?php echo $profile['telp_desa']; ?>" required>
                                   </div>
                                   <div class="form-group">
                                       <label>Peta Area</label>
                                       <textarea class="form-control" name="map_desa" rows="3"><?php echo $profile['map_desa']; ?></textarea>
                                   </div>
                                   <button type="submit" class="btn btn-primary">Simpan Data</button>
                               </form>
                           </div>
                           <div class="col-md-1">
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>