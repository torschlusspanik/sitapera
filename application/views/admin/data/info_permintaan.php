   <!-- Begin Page Content -->
   <div class="container-fluid">
       <div class="d-sm-flex align-items-center justify-content-between mb-4">
           <h2 class="h4 mb-0 text-gray-800"><b>Detail Penanganan Permintaan</b>
           <!-- <?php echo $title; ?> --></h2> 
           <a href="<?php echo base_url('admin/penanganan'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm">Kembali</a>
       </div>
       <div class="row">
           <div class="col-xl-12 col-lg-5">
               <div class="card shadow mb-4">
                   <div class="card-body">
                       <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                       <?php echo $this->session->flashdata('msg'); ?>
                       <?php if (validation_errors()) { ?>
                           <div class="alert alert-danger">
                               <strong><?php echo strip_tags(validation_errors()); ?></strong>
                           </div>
                       <?php } ?>
                       <div class="row">
                           <div class="col-md-8">
                               <table>
                               <tr>
                                       <th>Nama Unit</th>
                                       <th> : </th>
                                       <th><?php echo $detail['nama_unit']; ?></th>
                                   </tr>
                                   <tr>
                                       <th>Nama Kategori</th>
                                       <th> : </th>
                                       <th><?php echo $detail['nama_kategori']; ?></th>
                                   </tr>
                                   <tr>
                                       <th>Tanggal Permintaan </th>
                                       <th> : </th>
                                       <th><?php echo format_indo($detail['tgl_permintaan']); ?></th>
                                   </tr>
                                   <tr>
                                       <th>Jam Permintaan</th>
                                       <th> : </th>
                                       <th><?php echo ($detail['jam_permintaan']); ?></th>
                                   </tr>
                                   <tr>
                                   <?php if ($detail['tgl_mulai'] == "0000-00-00") : ?>
                                            <td style="visibility:hidden;">
                                            <?php else : ?>
                                            <th>Tanggal Mulai </th>
                                            <th> : </th>
                                            <th><?php echo format_indo($detail['tgl_mulai']); ?></th>
                                            <?php endif; ?>
                                            </tr>
                                            <?php if ($detail['jam_mulai'] == "00:00:00") : ?>
                                            <td style="visibility:hidden;">
                                            <?php else : ?>
                                            <th>Jam Mulai </th>
                                            <th> : </th>
                                            <th><?php echo $detail['jam_mulai']; ?></th>
                                            <?php endif; ?>
                                   <tr>
                                   <tr>
                                   <?php if ($detail['tgl_selesai'] == "0000-00-00") : ?>
                                            <td style="visibility:hidden;">
                                            <?php else : ?>
                                            <th>Tanggal Selesai </th>
                                            <th> : </th>
                                            <th><?php echo format_indo($detail['tgl_selesai']); ?></th>
                                            <?php endif; ?>
                                            </tr>
                                            <?php if ($detail['jam_selesai'] == "00:00:00") : ?>
                                            <td style="visibility:hidden;">
                                            <?php else : ?>
                                            <th>Jam Selesai </th>
                                            <th> : </th>
                                            <th><?php echo $detail['jam_selesai']; ?></th>
                                            <?php endif; ?>
                                            <tr>
                                   <?php if ($detail['nama_petugas'] == "") : ?>
                                            <td style="visibility:hidden;">
                                            <?php else : ?>
                                            <th>Pelaksana </th>
                                            <th> : </th>
                                            <th><?php echo $detail['nama_petugas']; ?></th>
                                            <?php endif; ?>
                                            </tr>
                                            <tr>
                                   <?php if ($detail['hasil_kgt'] == "") : ?>
                                            <td style="visibility:hidden;">
                                            <?php else : ?>
                                            <th>Hasil Kegiatan </th>
                                            <th> : </th>
                                            <th><?php echo $detail['hasil_kgt']; ?></th>
                                            <?php endif; ?>
                                            </tr>
                                            <tr>
                                   <?php if ($detail['bhn_hasil'] == "") : ?>
                                            <td style="visibility:hidden;">
                                            <?php else : ?>
                                            <th>Bahan Hasil  </th>
                                            <th> : </th>
                                            <th><?php echo $detail['bhn_hasil']; ?></th>
                                            <?php endif; ?>
                                            </tr>
                                   <tr>
                                       <th>Status</th>
                                       <th> : </th>
                                       <?php if ($detail['status_db_permintaan'] == 1) : ?>
                                           <th class="text-danger">Menunggu...
                                           </th>
                                           <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#proses">Proses Permintaan</button>
                                       <?php elseif ($detail['status_db_permintaan'] == 2) : ?>
                                           <th class="text-primary"><i class="fas fa-hourglass-start"></i> Proses </th>
                                           <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#selesai">Selesaikan Permintaan</button>
                                           <?php elseif ($detail['status_db_permintaan'] == 7) : ?>
                                           <th class="text-primary"><i class="fas fa-share"></i> Menunggu Verifikasi </th>
                                           <a href="<?php echo base_url('admin/print/' . $detail['id_db_permintaan']); ?>" class="tombol-edit btn btn-danger "><i class="fas fa-print"></i> Cetak Permintaan</a>
                                       <?php else : ?>
                                           <th class="text-success"><i class="fas fa-check-square"></i> Selesai</th>
                                           <a href="<?php echo base_url('admin/print_selesai/' . $detail['id_db_permintaan']); ?>" class="tombol-edit btn btn-danger "><i class="fas fa-print"></i> Cetak Permintaan</a>
                                       <?php endif; ?>
                                       

                                   </tr>
                               
                           </div>
                           <div class="row">
                           <div class="col-md-10">
                           <div class="card-body">
                               <div class="table-responsive">
                                   <table class="table table-bordered" id="table">
                                       <thead>
                                       
                                      </tr>
                                      </table>
                                       </div>
                                       </div>
                                       </div>
                                       </div>

                                       
   <div class="modal fade" id="proses">
       <div class="modal-dialog modal-lg">
           <div class="modal-content">
               <div class="modal-header">
                   <h4 class="modal-title">Proses Permintaan</h4>
               </div>
               <div class="modal-body">
                   <div class="box-body">
                   <?php echo form_open_multipart('admin/ubah_proses/' . $detail['id_db_permintaan']); ?>
                <br>

            <div class="row">

            <div class="col-md-6">
            <div class="form-group">
                     <label for="name" >Tanggal Mulai</label>
                         <input type="date" class="form-control" name="tgl_mulai"  required>
                    </div>
                </div>
                <div class="col-md-6">
            <div class="form-group">
                     <label for="name" >Jam Mulai</label>
                         <input type="time" class="form-control" name="jam_mulai"  required>
                    </div>
                </div>
                                
                 <div class="col-md-12">
                    <div class="form-group">
                    <label>Pelaksana</label>
                           <select class="form-control form-control-sm" name="petugas_id" required>
                               <?php foreach ($petugas  as $petugas1 ) : ?>
                                <option value="" selected disabled hidden>- Pilih -</option>  
                                   <option value="<?php echo $petugas1['id_petugas']; ?>"><?php echo $petugas1['nama_petugas']; ?></option  required>
                               <?php endforeach; ?>
                           </select>
                    </div>
                </div>
                <hr>
                <hr>
                <div class="col-md-12">
                     <div class="form-group">
                        <label>Upload Scan Tanda Tangan Disposisi Kepala</label>
                            <input type="file" class="form-control-file" name="signature_iprs" required>
                    </div>  
                    <div class="text-muted mb-1">
                           * Ekstensi file jpg, png, dan jpeg
                           <br>
                           * Ukuran file tidak lebih dari 5 MB
                       </div>    
                               </div>   
                       </div>         
                       <hr>         
                       <div class="box-footer">
                           <button type="submit" class="btn btn-primary" >Simpan Data</button>
                       </div>
                       </form>
                       <div class="box-footer">
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>




   <div class="modal fade" id="selesai">
       <div class="modal-dialog modal-lg">
           <div class="modal-content">
               <div class="modal-header">
                   <h4 class="modal-title">Selesaikan Permintaan?</h4>
               </div>
               <div class="modal-body">
                   <div class="box-body">
                       <?php echo form_open_multipart('admin/ubah_selesai/' . $detail['id_db_permintaan']); ?>
                <br>

            <div class="row">

            <div class="col-md-6">
            <div class="form-group">
                     <label for="name" >Tanggal Selesai</label>
                         <input type="date" class="form-control" name="tgl_selesai"  required>
                    </div>
                </div>
                <div class="col-md-6">
            <div class="form-group">
                     <label for="name" >Jam Selesai</label>
                         <input type="time" class="form-control" name="jam_selesai"  required>
                    </div>
                </div>
                                
                 <div class="col-md-12">
                    <div class="form-group">
                    <label>Pelaksana</label>
                           <select class="form-control form-control-sm" name="petugas_id" required>
                               <?php foreach ($petugas  as $petugas1 ) : ?>
                                   <option value="<?php echo $petugas1['id_petugas']; ?>"><?php echo $petugas1['nama_petugas']; ?></option  required>
                               <?php endforeach; ?>
                           </select>
                    </div>
                </div>
                <hr>
                
                <div class="col-md-12">
                    <div class="form-group">
                    <label>Hasil Kegiatan Pelaksanaan Pekerjaan</label>
                         <textarea class="form-control" name="hasil_kgt" rows="2" required  ></textarea>
                </div>  
                 </div> 
                 <div class="col-md-12">
                    <div class="form-group">
                    <label>Bahan Hasil Pelaksanaan Pekerjaan</label>
                         <textarea class="form-control" name="bhn_hasil" rows="2" required ></textarea>
                </div>   
                <hr>
                <div class="col-md-12">
                     <div class="form-group">
                        <label>Upload Scan Tanda Tangan Mengetahui</label>
                            <input type="file" class="form-control-file" name="signature_mengetahui" required>
                    </div>  
                    <div class="text-muted mb-1">
                           * Ekstensi file jpg, png, dan jpeg
                           <br>
                           * Ukuran file tidak lebih dari 5 MB
                       </div>    
                               </div>   
                       </div>         
                       <hr>         
                       <div class="box-footer">
                           <button type="submit" class="btn btn-primary" >Simpan Data</button>
                       </div>
                       </form>
                       <div class="box-footer">
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>

   <div class="modal fade" id="upload">
       <div class="modal-dialog modal-sm">
           <div class="modal-content">
               <div class="modal-body">
                   <div class="box-body">
                       <div class="box-footer">
                           <button type="submit" class="btn btn-primary">Unggah</button>
                           <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
                       </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
   </div>