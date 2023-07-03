 <!-- Begin Page Content -->
 <div class="container-fluid">
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h2 class="h4 mb-0 text-gray-800"><?php echo $title; ?></h2>
         <!-- <a href="#" class="btn btn-sm btn-primary shadow-sm float-right" data-toggle="modal" data-target="#edit-profile"><i class="fas fa-download fa-sm text-white-50"></i> Edit Profile</a> -->
     </div>
     <div class="alert alert-primary" role="alert">
         <h6>Selamat Datang, <strong><?php echo $user['nama']; ?></strong></h6>
     </div>
     <!-- Content Row -->
     <div class="row">
         <!-- Area Chart -->
         <div class="col-xl-4 col-lg-7">
             <div class="card shadow mb-4">
                 <div class="card-header">
                     <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
                 </div>
                 <!-- Card Body -->
                 <div class="card-body">
                     <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                     <?php echo $this->session->flashdata('msg'); ?>
                     <?php if (validation_errors()) { ?>
                         <div class="alert alert-danger">
                             <strong><?php echo strip_tags(validation_errors()); ?></strong>
                             <a href="" class="float-right text-decoration-none" data-dismiss="alert"><i class="fas fa-times"></i></a>
                         </div>
                     <?php } ?>
                     <div class="text-center">
                         <img class="profile-user-img img-fluid rounded-circle" src="<?php echo base_url('assets/dist/img/profile/' . $user['image']); ?>" alt="User profile picture" style="width:120px;height:120px;">
                     </div>
                     <h5 class="profile-username text-center mt-1 mb-1"><?php echo $user['nama']; ?></h5>
                     <ul class="list-group list-group-unbordered mb-3">
                         <li class="list-group-item">
                             <b>Tgl Register</b> <a class="float-right"><?php echo format_indo($user['date_created']); ?></a>
                         </li>
                         <li class="list-group-item">
                             <b>Level</b> <a class="float-right"><?php echo $user['level']; ?></a>
                         </li>
                         <li class="list-group-item">
                             <b>Jenis kelamin </b> <a class="float-right"><?php echo $user['jk_lgn']; ?></a>
                         </li>
                         <li class="list-group-item">
                             <b>Email</b> <a class="float-right"><?php echo $user['email']; ?></a>
                         </li>
                         <li class="list-group-item">
                             <b>No HP</b> <a class="float-right"><?php echo $user['hp']; ?></a>
                         </li>
                         <li class="list-group-item">
                             <b>Tgl Lahir</b> <a class="float-right"><?php echo format_indo($user['tanggal_lahir_lgn']); ?></a>
                         </li>
                     </ul>
                     <button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#edit-profile"><b>Ubah Profile</b></button>
                     <button type="button" class="btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#edit-pass"><b>Ubah Password</b></button>
                 </div>
             </div>
         </div>

         <!-- Pie Chart -->
         <div class="col-xl-8">
             <div class="card shadow mb-4">
                 <!-- Card Header - Dropdown -->
                 <div class="card-header ">
                     <h6 class="m-0 font-weight-bold text-primary">Dokumen Saya</h6>
                 </div>
                 <!-- Card Body -->
                 <div class="card-body">
                     <div class="table-responsive">
                         <table class="table table-bordered" id="table-id" style="font-size:13px;">
                             <thead>
                                 <th>#</th>
                                 <th>Tgl</th>
                                 <th>Jenis Dokumen</th>
                                 <th>Pembuat</th>
                                 <th>Keterangan</th>
                                 <th>Status</th>
                             </thead>
                             <tbody>
                                 <?php $i = 1; ?>
                                 <?php foreach ($dokumen_saya as $lu) : ?>
                                     <tr>
                                         <td><?php echo $i++; ?></td>
                                         <td><?php echo format_indo($lu['tgl_dokumen']); ?></td>
                                         <td><?php echo $lu['nama_dokumen']; ?></td>
                                         <td><?php echo $lu['pembuat']; ?></td>
                                         <td><?php echo $lu['keterangan']; ?></td>
                                         <?php if ($lu['status_db_dokumen'] == 1) : ?>
                                             <td class="text-center text-warning font-weight-bolder">PENDING</td>
                                         <?php elseif ($lu['status_db_dokumen'] == 2) : ?>
                                             <td class="text-center text-info font-weight-bolder">PROSES</td>
                                         <?php else : ?>
                                             <td class="text-center text-success font-weight-bolder"><i class="far fa-check-circle fa-2x"></i></td>
                                         <?php endif; ?>
                                     </tr>
                                 <?php endforeach; ?>
                             </tbody>
                         </table>
                     </div>
                     <div class="mt-4 text-center small">
                         <!-- <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Direct
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Social
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> Referral
                        </span> -->
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <div class="modal fade" id="edit-profile">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title">Edit Profile</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <?php echo form_open_multipart('user/index'); ?>
                 <div class="form-group row">
                     <label for="username" class="col-sm-2 col-form-label">Username</label>
                     <div class="col-sm-10">
                         <input type="hidden" name="id_user" value="<?php echo $user['id_user']; ?>">
                         <input type="text" class="form-control" id="username" value="<?php echo $user['username']; ?>" readonly>
                     </div>
                 </div>
                 <div class="form-group row">
                     <label for="name" class="col-sm-2 col-form-label">Nama</label>
                     <div class="col-sm-10">
                         <input type="text" class="form-control" name="nama" value="<?php echo $user['nama']; ?>" required>
                     </div>
                 </div>
                 <div class="form-group row">
                            <label for="jk_lgn" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                             <select class="form-control form-control-sm" name="jk_lgn" value="<?php echo $user['jk_lgn']; ?>" required>
                             <option value="" selected disabled hidden>Pilih</option>
                                   <option value="Perempuan"> Perempuan</option>
                                   <option value="Laki-Laki"> Laki-Laki</option>
                           </select>
                       </div>
                 </div>
                 <div class="form-group row">
                     <label for="name" class="col-sm-2 col-form-label">Email</label>
                     <div class="col-sm-10">
                         <input type="text" class="form-control" name="email" value="<?php echo $user['email']; ?>" required>
                     </div>
                 </div>
                 <div class="form-group row">
                     <label for="name" class="col-sm-2 col-form-label">No HP</label>
                     <div class="col-sm-10">
                         <input type="number" class="form-control" name="hp" value="<?php echo $user['hp']; ?>" required>
                     </div>
                 </div>
                 <div class="form-group row">
                     <label for="name" class="col-sm-2 col-form-label">Tanggal lahir</label>
                     <div class="col-sm-10">
                         <input type="date" class="form-control" name="tanggal_lahir_lgn" value="<?php echo $user['tanggal_lahir_lgn']; ?>" required>
                     </div>
                 </div>
                 <div class="form-group row">
                     <div class="col-sm-2"><label>Photo</label></div>
                     <div class="col-sm-10">
                         <div class="row">
                             <div class="col-sm-3">
                                 <img src="<?php echo base_url('assets/dist/img/profile/') . $user['image']; ?>" class="img-thumbnail" >
                             </div>
                             <div class="col-sm-9">
                                 <div class="form-group">
                                     <label for="exampleFormControlFile1">Upload Photo</label>
                                     <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <button type="button" class="btn btn-default float-right ml-1" data-dismiss="modal">Tutup</button>
                 <button type="submit" class="btn btn-primary float-right">Simpan Perubahan</button>
                 </form>
             </div>
             <div class="modal-footer">

             </div>
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
 </div>

 <div class="modal fade" id="edit-pass">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title">Ubah Password</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form action="<?php echo base_url('user/ubah_password'); ?>" method="post">
                     <div class="form-group">
                         <label for="current_password">Password Lama</label>
                         <input type="password" class="form-control" id="current_password" name="current_password">
                     </div>
                     <div class="form-group">
                         <label for="new_password1">Password Baru</label>
                         <input type="password" class="form-control" id="new_password1" name="new_password1">
                     </div>
                     <div class="form-group">
                         <label for="new_password2">Ulang Password Baru</label>
                         <input type="password" class="form-control" id="new_password2" name="new_password2" placeholder="Ketik ulang password baru">
                     </div>
                     <button type="button" class="btn btn-default float-right ml-1" data-dismiss="modal">Tutup</button>
                     <button type="submit" class="btn btn-primary float-right">Simpan Perubahan</button>
                 </form>
             </div>
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
 </div>