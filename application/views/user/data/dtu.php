<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
        <?php echo $this->session->flashdata('msg'); ?>
     
    <div class="container-fluid">
        <h5 class="h5 mb-0 text-gray-800"><?php echo $title; ?></h5>
        <?php echo form_open_multipart('user/dtu'); ?>
                <br>

            <div class="row">
                        <input type="hidden" class="form-control form-control-sm" name="no_dokumen" value="<?php echo 'jombatan/' . date('Ymd/His'); ?>">
                        <input type="hidden" class="form-control" name="tgl_lahir" value="<?php echo $user['tanggal_lahir_lgn']; ?>">
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
                         <label>Nama Usaha</label>
                         <input type="text" class="form-control form-control-sm" name="nama_usaha" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Alamat usaha</label>
                            <input type="text" class="form-control form-control-sm" name="alamat_usaha" required>
                    </div>
                </div>                        
             </div>

            <div class="row">
            <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Pemilik</label>
                        <input type="text" class="form-control form-control-sm" name="pembuat" value="<?php echo $user['nama']; ?>" required>
                    </div>
                </div>                        
            

            <div class="col-md-6">
                    <div class="form-group">
                        <label>Alamat Pemilik</label>
                        <input type="text" class="form-control form-control-sm" name="alamat_pembuat" required>
                    </div>
                </div>                        
                </div>

                <div class="row">               
                <div class="col-md-6">
                    <div class="form-group">
                        <label>No NIK</label>
                            <input type="text" class="form-control form-control-sm" name="nik" pattern="[0-9]+" maxlength="16" required>
                    </div>
                </div>    

                <div class="col-md-6">
                    <div class="form-group">
                        <label>No Handphone</label>
                             <input type="text" class="form-control form-control-sm" name="no_hp" pattern="[0-9]+" value="<?php echo $user['hp']; ?>" maxlength="13"required>
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
                        <label>Upload Scan KTP Pimpinan</label>
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
                        <label>Upload Scan NPWP Usaha</label>
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