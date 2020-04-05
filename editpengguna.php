<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    
      <form action="<?= base_url('pengguna/edit/'.$u['id']);?>" method="post">
        <div class="form-group row">
          <input type="hidden" name="id" value="<?php echo $u['id'] ?>">
          <label for="name" class="col-sm-2 col-form-label">Nama</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" placeholder="name" value="<?php echo $u['name'] ?>" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="email" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
          <input type="text" class="form-control" id="email" name="email" placeholder="email" value="<?php echo $u['email'] ?>" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="nomor" class="col-sm-2 col-form-label">Nomor HP</label>
          <div class="col-sm-10">
          <input type="text" class="form-control" id="nomor" name="nomor" placeholder="nomor" value="<?php echo $u['nomor'] ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="role_id" class="col-sm-2 col-form-label">Akses</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="role_id" name="role_id" placeholder="role" value="<?php echo $u['role_id'] ?>">
          </div>
        </div>
         <div class="form-group row">
          <label for="password" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="password" name="password" placeholder="password" value="<?php echo $u['password'] ?>" readonly>
          </div>
        </div>
         <div class="form-group row">
          <label for="date_created" class="col-sm-2 col-form-label">Member</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="date_created" name="date_created" placeholder="" value="<?php echo $u['date_created'] ?>" readonly>
          </div>
        </div>
        
        <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                  <label class="form-check-label" for="is_active" readonly>
                    Aktif
                  </label>
              </div>
        </div>
        
        
        <div class="form-group row">
          <div class="col-sm-10">
            <button href="" type="submit" name="submit" value="edit " class="btn btn-success">Simpan</button>
            <button href="<?= base_url('pengguna') ?>"type="submit" class="btn btn-success">Kembali</button>
          </div>
        </div>
      </form>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

      