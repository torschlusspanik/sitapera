<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
        <?php echo $this->session->flashdata('msg'); ?>
     
    <div class="container-fluid">
        <h5 class="h5 mb-0 text-gray-800"><?php echo $title; ?></h5>
        <?php echo form_open_multipart('user/du'); ?>
                <br>

            <div class="row">
                        <input type="hidden" class="form-control form-control-sm" name="no_dokumen" value="<?php echo 'jombatan/' . date('Ymd/His'); ?>">

                        <input type="hidden" class="form-control form-control-sm" name="tgl_dokumen" value="<?php echo date('Y/m/d'); ?>">

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Nama Dokumen</label>
                           <select class="form-control form-control-sm" name="dokumen_id" readonly>
                               <?php foreach ($doc as $doc1) : ?>
                                   <option value="<?php echo $doc1['id_dokumen']; ?>"><?php echo $doc1['nama_dokumen']; ?></option>
                               <?php endforeach; ?>
                           </select>
                    </div>
                </div>

                 <div class="col-md-6">
                    <div class="form-group">
                         <label>Nama Lengkap</label>
                            <input type="text" class="form-control form-control-sm" name="pembuat" value="<?php echo $user['nama']; ?>" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>No NIK</label>
                            <input type="text" class="form-control form-control-sm" name="nik" pattern="[0-9]+" required>
                    </div>
                </div>                        
            </div>

            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                             <select class="form-control form-control-sm" name="jk" required>
                             <option value="" selected disabled hidden>- Pilih -</option>
                                   <option value="Perempuan"> Perempuan</option>
                                   <option value="Laki-Laki"> Laki-Laki</option>
                           </select>
                       </div>
                 </div>

            <div class="col-md-6">
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control form-control-sm" name="alamat_pembuat" required>
                    </div>
                </div>   
                

                </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tanggal lahir</label>
                            <input type="date" class="form-control form-control-sm" name="tgl_lahir" value="<?php echo date('Y/m/d'); ?>" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control form-control-sm" name="tmp_lhr" required>
                    </div>
                </div>   
          </div>


          <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                            <label for="jk">Agama</label>
                             <select class="form-control form-control-sm" name="agama" required>
                               <option value="">- Pilih -</option>
                                   <option value="Islam"> Islam</option>
                                   <option value="Kristen"> Kristen</option>
                                   <option value="Katolik"> Katolik</option>
                                   <option value="Hindu"> Hindu</option>
                                   <option value="Buddha">Buddha</option>
                                   <option value="Konghucu"> Konghucu</option>
                           </select>
                       </div>
                 </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>No Handphone</label>
                             <input type="text" class="form-control form-control-sm" name="no_hp" pattern="[0-9]+" required>
                    </div>
                 </div>
                 </div>


                <div class="form-group">
                    <label>Keterangan (Opsional)</label>
                         <textarea class="form-control" name="keterangan" rows="3" ></textarea>
                </div>

            <div class="row">
                <div class="col-md-4">
                     <div class="form-group">
                        <label>Upload Scan KTP</label>
                            <input type="file" class="form-control-file" name="ktp" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                         <label>Upload Scan KK</label>
                                <input type="file" class="form-control-file" name="kk" required>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Pengantar RT/RW</label>
                            <input type="file" class="form-control-file" name="pengantar" required>
                    </div>
                </div>

             </div>

                       <div class="text-muted mb-1">
                           * Ekstensi file jpg, png, jpeg, dan pdf
                           <br>
                           * Ukuran file tidak lebih dari 5 MB
                       </div>

                       <div class="box-footer">
                           <button type="submit" class="btn btn-primary">Simpan Data</button>
                       </div>
                       </form>