
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



          <div class="row ">
          	<div class="col-lg">

          		<?= form_error('menu', '<div class="alert alert-danger" role="alert">Kolom menu wajb diisi!</div>'); ?>
          		<?php if (validation_errors()) :?>
          			<div class="alert alert-danger" role="alert">
          				<?= validation_errors(); ?>
          			</div>
          		<?php endif; ?>



          		<?= $this->session->flashdata('message'); ?>

          		<a href="" class="btn btn-primary mb-3"  data-toggle="modal" data-target="#newAturanModal"> Tambah Data Aturan Baru <i class="fas fa-plus"></i></a>

          		  <p style="font-style: bold; color: red; font-size: 13px;">*MB[H|E]: Ukuran kepercayaan (measure of belief) terhadap hipotesis H yang dipengaruhi oleh gejala E.
				 	<br>*MD[H|E]: Ukuran ketidakpercayaan (measure of disbelief) terhadap hipotesis H yang dipengaruhi oleh gejala E.</p>

          		<div class="container">
          			<div class="table-responsive">
          		<table class="table table-striped table-bordered table-hover">
				  <thead>
				    <tr>
				      <th scope="col" style="text-align: center;">Kode</th>
				      <th scope="col" style="text-align: center;">Gejala</th>
				      <th scope="col" style="text-align: center;">Kerusakan</th>
				      <th scope="col" style="text-align: center;">mb</th>
				      <th scope="col" style="text-align: center;">md</th>
				      <th scope="col" style="text-align: center;">Opsi</th>
				      
				    </tr>
				  </thead>
				  <tbody>
				  	
				  	<?php foreach ($subGejala as $ru) :?>

				    <tr>
				      
				      <td style="text-align: center;"><?= $ru['kode_rule'];?></td>
				      <td style="text-align: center;"><?= $ru['kode_gejala'];?></td>
				      <td style="text-align: center;"><?= $ru['kode_kerusakan'];?></td>
				      <td style="text-align: center;"><?= $ru['mb'];?></td>
				      <td style="text-align: center;"><?= $ru['md'];?></td>
				      <td style="text-align: center;">
				      	
				      	<a href="<?php echo base_url('aturan/edit/'.$ru['id']) ?>" class="badge badge-success" > Ubah <i class="fas fa-edit"></i></a>

				      		<?php echo '|' ?>


				      	<a href="<?php echo base_url('aturan/delete/'.$ru['id']) ?>" onclick="javascript: return confirm('Apakah yakin menghapus')" class="badge badge-danger"><i class="fas fa-trash-alt"></i> Hapus</a>

				      </td>
				    </tr>
				    
					<?php endforeach; ?>
				  </tbody>
				</table>

				</div>
				<?php echo $pagging_link; ?>
				</div>
				 
          	</div>
          </div>
          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- MODAL -->

<!-- Modal ADD-->
<div class="modal fade" id="newAturanModal" tabindex="-1" role="dialog" aria-labelledby="newAturanModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newAturanModalLabel">Tambah Data Aturan Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"> </span>
        </button>
      </div>
      <form  action="<?= base_url('aturan');?>" method="post" >
	      <div class="modal-body">
		        <div class="form-group">
		        	<label for="kode_rule" class="col-sm-2 col-form-label">Kode</label>
				    <input type="text" class="form-control" id="kode_rule" name="kode_rule" placeholder="Kode rule baru" >
				</div>
				<div class="form-group">
					<label for="gejala_id" class="col-sm-2 col-form-label">Gejala</label>
				    <select  name="gejala_id" id="gejala_id" class="form-control">
				    	<option value="">Select gejala</option>
				    	<?php foreach ($gjls as $gj) :?>
				    		<option value="<?= $gj['id']; ?>"><?= $gj['nama_gejala']; ?></option>
				    	<?php endforeach; ?>
				    </select>
				</div>
				<div class="form-group">
					<label for="kerusakan_id" class="col-sm-2 col-form-label">Kerusakan</label>
				    <select   name="kerusakan_id" id="kerusakan_id" class="form-control">
				    	<option value="">Select kerusakan</option>
				    	<?php foreach ($krskns as $ksk) :?>
				    		<option value="<?= $ksk['id']; ?>"><?= $ksk['nama_kerusakan']; ?></option>
				    	<?php endforeach; ?>
				    </select>
				</div>
				<div class="form-group">
					<label for="mb" class="col-sm-2 col-form-label">Mb</label>
				    <input type="text" class="form-control" id="mb" name="mb" placeholder="mb baru" >
				</div>
				<div class="form-group">
					<label for="md" class="col-sm-2 col-form-label">Md</label>
				    <input type="text" class="form-control" id="md" name="md" placeholder="md baru" >
				</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
	        <button type="submit" class="btn btn-primary">Simpan</button>
      	</div>
      </form>
    </div>
  </div>
</div>


