<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-success"><?= $title; ?></h6>
    </div>
    <div class="card-body">

    <!-- Page Heading -->

    
      <form action="<?= base_url('alat/tambah');?>" method="post">
      
        <div class="form-group row">
          
            <label for="nama_gejala" class="col-sm-2 col-form-label">Nama Peralatan</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nama_alat" name="nama_alat" placeholder="Nama Peralatan" value="<?= set_value('nama_alat')?>" >
            <?= form_error('nama_alat', '<small class="text-danger pl-3">', '</small>');?>
          </div>
        </div>
           <div class="form-group row">
            <label for="merk" class="col-sm-2 col-form-label">Merk/Type</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="merk" name="merk" placeholder="Merk/Type" value="<?= set_value('merk')?>" >
            <?= form_error('merk', '<small class="text-danger pl-3">', '</small>');?>
          </div>
        </div>
           <div class="form-group row">
            <label for="merk" class="col-sm-2 col-form-label">SN</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="sn" name="sn" placeholder="sn" value="<?= set_value('sn')?>"> <?= form_error('sn', '<small class="text-danger pl-3">', '</small>');?>
          </div>
        </div>
           <div class="form-group row">
            <label for="lokasi" class="col-sm-2 col-form-label">Lokasi</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Lokasi" value="<?= set_value('lokasi')?>"> <?= form_error('lokasi', '<small class="text-danger pl-3">', '</small>');?>
          </div>
        </div>
           <div class="form-group row">
            <label for="rentang" class="col-sm-2 col-form-label">Range</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="rentang" name="rentang" placeholder="Rentang" value="<?= set_value('rentang')?>" > <?= form_error('rentang', '<small class="text-danger pl-3">', '</small>');?>
          </div>
        </div>
           <div class="form-group row">
            <label for="resolusi" class="col-sm-2 col-form-label">Resolusi</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="resolusi" name="resolusi" placeholder="Resolusi" value="<?= set_value('resolusi')?>" > <?= form_error('resolusi', '<small class="text-danger pl-3">', '</small>');?>
          </div>
        </div>
          <div class="form-group row">
            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" value="<?= set_value('keterangan')?>"> <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>');?>
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

      