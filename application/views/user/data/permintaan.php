<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
        <?php echo $this->session->flashdata('msg'); ?>
     
    <div class="container-fluid">
        <h5 class="h5 mb-0 text-gray-800"><?php echo $title; ?></h5>
        <?php echo form_open_multipart('user/permintaan'); ?>
                <br>

            <div class="row">
                        <input type="hidden" class="form-control form-control-sm" name="tgl_permintaan" value="<?php echo date('Y/m/d'); ?>">
                        <input type="hidden" class="form-control form-control-sm" name="jam_permintaan" value="<?php echo date('H:i:s'); ?>">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>UNIT KERJA</label>
                           <select class="form-control form-control-sm" name="unit_kerja_id" required>
                           <?php foreach ($unit as $unit1) : ?>
                                <option value="" selected disabled hidden>- Pilih -</option>
                                   <option value="<?php echo $unit1['id_unit']; ?>"><?php echo $unit1['nama_unit']; ?></option>
                               <?php endforeach; ?>
                           </select>
                    </div>
                </div>
                                
                 <div class="col-md-6">
                    <div class="form-group">
                    <label>PILIH KATEGORI</label>
                           <select class="form-control form-control-sm" name="kategori_id" required>
                               <?php foreach ($kategori as $kategori1) : ?>
                                   <option value="<?php echo $kategori1['id_kategori']; ?>"><?php echo $kategori1['nama_kategori']; ?></option  required>
                               <?php endforeach; ?>
                           </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                    <label>PILIH SUB KATEGORI</label>
                           <select class="form-control form-control-sm" name="sub_kategori_id" required>
                               <?php foreach ($sub_kategori as $sub_kategori1) : ?>
                                <option value="" selected disabled hidden>- Pilih -</option>
                                   <option value="<?php echo $sub_kategori1['id_sub_kategori']; ?>"><?php echo $sub_kategori1['nama_sub_kategori']; ?></option>
                               <?php endforeach; ?>
                           </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                    <label>Keterangan (Opsional)</label>
                         <textarea class="form-control" name="urgas" rows="3"  ></textarea>
                </div>
                </div>

             </div>

                       
                       <div class="box-footer">
                           <button type="submit" class="btn btn-primary">Simpan Data</button>
                       </div>
                       </form>