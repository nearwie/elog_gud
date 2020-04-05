<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="card shadow mb-4">

    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-success"><?= $title; ?></h6>
    </div>
      <div class="card-body">
      
    <!-- Page Heading -->
    
    
      <form action="<?= base_url('alat/edit/'.$a['id']);?>" method="post">

        <div class="form-group row">
          <input type="hidden" name="id" value="<?php echo $a['id'] ?>">
            <label for="nama_alat" class="col-sm-2 col-form-label">Nama Peralatan</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nama_alat" name="nama_alat" placeholder="Nama Peralatan" value="<?php echo $a['nama_alat'] ?>" >
            <?= form_error('nama_alat', '<small class="text-danger pl-3">', '</small>');?>
          </div>
        </div>
           <div class="form-group row">
            <label for="merk" class="col-sm-2 col-form-label">Merk/Type</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="merk" name="merk" placeholder="Merk/Type" value="<?php echo $a['merk'] ?>" >
            <?= form_error('merk', '<small class="text-danger pl-3">', '</small>');?>
          </div>
        </div>
           <div class="form-group row">
            <label for="merk" class="col-sm-2 col-form-label">SN</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="sn" name="sn" placeholder="sn" value="<?php echo $a['sn'] ?>" > <?= form_error('sn', '<small class="text-danger pl-3">', '</small>');?>
          </div>
        </div>
           <div class="form-group row">
            <label for="lokasi" class="col-sm-2 col-form-label">Lokasi</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Lokasi" value="<?php echo $a['lokasi'] ?>" > <?= form_error('lokasi', '<small class="text-danger pl-3">', '</small>');?>
          </div>
        </div>
           <div class="form-group row">
            <label for="rentang" class="col-sm-2 col-form-label">Range</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="rentang" name="rentang" placeholder="Rentang" value="<?php echo $a['rentang'] ?>" > <?= form_error('rentang', '<small class="text-danger pl-3">', '</small>');?>
          </div>
        </div>
           <div class="form-group row">
            <label for="resolusi" class="col-sm-2 col-form-label">Resolusi</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="resolusi" name="resolusi" placeholder="Resolusi" value="<?php echo $a['resolusi'] ?>" > <?= form_error('resolusi', '<small class="text-danger pl-3">', '</small>');?>
          </div>
        </div>
          <div class="form-group row">
            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" value="<?php echo $a['keterangan'] ?>" > <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>');?>
          </div>
        </div>
        
        
        <div class="form-group row">
          <div class="col-sm-10">
            <button href="" type="submit" name="submit" value="edit" class="btn btn-success">Simpan </button>
          </div>
        </div>
      </form>
      </div>
  </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

      