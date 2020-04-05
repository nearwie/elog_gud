<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-success"><?= $title; ?></h6>
    </div>
    <div class="card-body">
    <!-- Page Heading -->

    
      <form action="<?= base_url('lokasi/tambah');?>" method="post">
        <div class="form-group row">
            <label for="id_sta" class="col-sm-2 col-form-label">Id Stasiun</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="id_sta" name="id_sta" placeholder="ID Stasiun" value="<?= set_value('id_sta')?>" >
            <?= form_error('id_sta', '<small class="text-danger pl-3">', '</small>');?>
          </div>
        </div>
        
        <div class="form-group row">
          <label for="nama_sta" class="col-sm-2 col-form-label">Nama Stasiun</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nama_sta" name="nama_sta" placeholder="Nama Stasiun" value="<?= set_value('nama_sta')?>" >
            <?= form_error('nama_sta', '<small class="text-danger pl-3">', '</small>');?>
          </div>
        </div>
        <div class="form-group row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?= set_value('alamat')?>" >
            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>');?>
          </div>
        </div>
           <div class="form-group row">
            <label for="merk" class="col-sm-2 col-form-label">Kab/Kota</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="Kab" name="kab" placeholder="Kab/Kota" value="<?= set_value('kab')?>" >
            <?= form_error('kab', '<small class="text-danger pl-3">', '</small>');?>
          </div>
        </div>
           <div class="form-group row">
            <label for="lat" class="col-sm-2 col-form-label">Lat</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="lat" name="lat" placeholder="Latitude" value="<?= set_value('lat')?>"> <?= form_error('lat', '<small class="text-danger pl-3">', '</small>');?>
          </div>
        </div>
           <div class="form-group row">
            <label for="lokasi" class="col-sm-2 col-form-label">Lng</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="lng" name="lng" placeholder="Longitude" value="<?= set_value('lng')?>"> <?= form_error('lng', '<small class="text-danger pl-3">', '</small>');?>
          </div>
        </div>
           <div class="form-group row">
            <label for="rentang" class="col-sm-2 col-form-label">Elevasi</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="elevasi" name="elevasi" placeholder="Elevasi" value="<?= set_value('elevasi')?>" > <?= form_error('elevasi', '<small class="text-danger pl-3">', '</small>');?>
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

      