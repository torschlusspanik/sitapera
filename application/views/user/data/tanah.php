<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
        <?php echo $this->session->flashdata('msg'); ?>
     
    <div class="container-fluid">
        <h5 class="h5 mb-0 text-gray-800"><?php echo $title; ?></h5>
        <?php echo form_open_multipart('user/tanah'); ?>
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
                        <label>Alamat</label>
                        <input type="text" class="form-control form-control-sm" name="alamat_pembuat" required>
                    </div>
                </div>                    
            

                <div class="col-md-6">
                    <div class="form-group">
                        <label>No Handphone</label>
                             <input type="text" class="form-control form-control-sm" name="no_hp" pattern="[0-9]+" value="<?php echo $user['hp']; ?>" required>
                    </div>
                 </div>                      
                </div>

                <div class="row">
            <div class="col-md-6">
                    <div class="form-group">
                        <label>No Polisi</label>
                        <input type="text" class="form-control form-control-sm" name="no_polisi" required>
                    </div>
                </div>                    
            

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Atas nama</label>
                             <input type="text" class="form-control form-control-sm" name="atn"  required>
                    </div>
                 </div>                      
                </div>

                <div class="row">
            <div class="col-md-6">
                    <div class="form-group">
                        <label>Jenis</label>
                        <input type="text" class="form-control form-control-sm" name="jns" required>
                    </div>
                </div>                    
            

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Warna</label>
                             <input type="text" class="form-control form-control-sm" name="wrn"  required>
                    </div>
                 </div>                      
                </div>

                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>No rangka</label>
                             <input type="text" class="form-control form-control-sm" name="no_rgk" pattern="[0-9]+" value="<?php echo $user['hp']; ?>" required>
                    </div>
                 </div>                      

                <div class="col-md-6">
                    <div class="form-group">
                        <label>No Mesin</label>
                             <input type="text" class="form-control form-control-sm" name="no_msn" pattern="[0-9]+" value="<?php echo $user['hp']; ?>" required>
                    </div>
                 </div>                      
                </div>

                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>No BPKB</label>
                             <input type="text" class="form-control form-control-sm" name="no_bpkb" pattern="[0-9]+" value="<?php echo $user['hp']; ?>" required>
                    </div>
                 </div>   
                 <div class="col-md-6">
                    <div class="form-group">
                        <label>Tahun</label>
                             <input type="text" class="form-control form-control-sm" name="tahun" pattern="[0-9]+" required>
                    </div>
                 </div>                  
                </div>
                <div class="form-group">
                    <label>Keterangan (Opsional)</label>
                         <textarea class="form-control" name="keterangan" rows="3"  ></textarea>
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
                        <label>Pengantar RT/RW</label>
                            <input type="file" class="form-control-file" name="pengantar" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Upload Scan STNK</label>
                            <input type="file" class="form-control-file" name="lampiran2" required >
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