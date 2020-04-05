<style>
	.input-sm
	{
		padding: 4px 4px;
	}
	@media (max-width:780px)
	{
		.btn-group-vertical
		{
			display: block;
		}
	}

	.table-responsive
	{
		min-height:275px;
	
	}
</style>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
         



          <div class="row ">
          	<div class="col-lg">

          		<?= form_error('menu', '<div class="alert alert-danger" role="alert">Kolom menu wajb diisi!</div>'); ?>
          		<?php if (validation_errors()) :?>
          			<div class="alert alert-danger" role="alert">
          				<?= validation_errors(); ?>
          			</div>
          		<?php endif; ?>



          		<?= $this->session->flashdata('message'); ?>

          	
          		<div class="box box-info">
          			<div class="box-header with-border">
						<a href="<?= base_url('alat/tambah');?>" class="btn btn-outline-dark" ><i class="fa fa-plus"></i> Tambah Alat</a>
						<a href="<?= site_url('sid_core/cetak')?>" class="btn btn-outline-warning" title="Cetak Data" target="_blank"><i class="fa fa-print " ></i> Cetak</a>
						<a href="<?= site_url('sid_core/excel')?>" class="btn btn-outline-primary" title="Unduh Data" target="_blank"><i class="fa  fa-download"></i> Unduh</a>
					</div>
					<hr>
					
          		<div class="container">
          			<div class="card shadow mb-4">

          			<div class="card-header py-3">
		              <h6 class="m-0 font-weight-bold text-success"><?= $title; ?></h6>
		            </div>
		        <div class="card-body">
		        	<div class="table-responsive">
          		<table class="table table-striped table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
				  <thead>
				    <tr>
				      
				      <th scope="col" style="text-align: center;" >No</th>
				      <th scope="col" style="text-align: center;">Opsi</th>
				      <th scope="col" style="text-align: center;">Nama Peralatan</th>
				      <th scope="col" style="text-align: center;">Merk/Type</th>
				      <th scope="col" style="text-align: center;">S/N</th>
				      <th scope="col" style="text-align: center;">Lokasi</th>
				      <th scope="col" style="text-align: center;">Range</th>
				      <th scope="col" style="text-align: center;">Resolusi</th>
				      <th scope="col" style="text-align: center;">Keterangan</th>
				      
				      
				    </tr>
				  </thead>
				  <tbody>
				  
				      
				      <?php $i = 1;  ?>
				  		<?php foreach ($alats as $a) :?>
				    <tr>
				      <th scope="row" style="text-align: center;"><?= $i;?></th>
				     
				      <td nowrap style="text-align: center;">
				      	
				      	<a href="<?php echo base_url('alat/edit/'.$a['id']) ?>" class="badge badge-success" > <i class="fas fa-edit"></i>Ubah </a>


				      	<a href="<?php echo base_url('alat/delete/'.$a['id']) ?>" onclick="javascript: return confirm('Apakah yakin menghapus')" class="badge badge-danger"> <i class="fas fa-trash-alt"></i>Hapus </a>

				      </td>
				      
				      <td><?= $a['nama_alat'];?></td>
				      <td><?= $a['merk'];?></td>
				      <td style="text-align: center;" ><?= $a['sn'];?></td>
				      <td nowrap><?= $a['lokasi'];?></td>
				      <td style="text-align: center;"><?= $a['rentang'];?></td>
				      <td style="text-align: center;"><?= $a['resolusi']; ?></td>
				      <td style="text-align: center;"><?= $a['keterangan']; ?></td>
				      
				     
				      
				    </tr>
				   	<?php $i++; ?>
					<?php endforeach; ?>
				  </tbody>
				</table>
				
				</div>
				
				</div>
          	</div>
          </div>
          </div>
          </div>
          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- MODAL -->

<!-- Modal ADD-->
<div class="modal fade" id="newAlatModal" tabindex="-1" role="dialog" aria-labelledby="newAlatModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newAlatModalLabel">Tambahkan Data Peralatan Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  action="<?= base_url('alat');?>" method="post" >
	      <div class="modal-body">
		        <div class="form-group">
				    <input type="text" class="form-control" id="nama_alat" name="nama_alat" placeholder="Nama Peralatan Baru" value="<?= set_value('nama_alat')?>">
				    <?= form_error('nama_alat', '<small class="text-danger pl-3">', '</small>');?>
				</div>
				<div class="form-group">
				    <input type="text" class="form-control" id="merk" name="merk" placeholder="Merk/Type Peralatan baru" value="<?= set_value('merk')?>"> <?= form_error('merk', '<small class="text-danger pl-3">', '</small>');?>
				</div>
				<div class="form-group">
				    <input type="text" class="form-control" id="sn" name="sn" placeholder="SN Peralatan baru" value="<?= set_value('sn')?>"><?= form_error('sn', '<small class="text-danger pl-3">', '</small>');?>
				</div>
				<div class="form-group">
				    <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Lokasi Peralatan " value="<?= set_value('lokasi')?>"> <?= form_error('lokasi', '<small class="text-danger pl-3">', '</small>');?>
				</div>
				<div class="form-group">
				    <input type="text" class="form-control" id="rentang" name="rentang" placeholder="Range Peralatan baru" value="<?= set_value('rentang')?>"> <?= form_error('rentang', '<small class="text-danger pl-3">', '</small>');?>
				</div>
				<div class="form-group">
				    <input type="text" class="form-control" id="resolusi" name="resolusi" placeholder="Resolusi Peralatan baru" value="<?= set_value('resolusi')?>"> <?= form_error('resolusi', '<small class="text-danger pl-3">', '</small>');?>
				</div>
				<div class="form-group">
				    <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="keterangan Peralatan baru" value="<?= set_value('keterangan')?>"> <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>');?>
				</div> 
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
	        <button type="submit" class="btn btn-success">Simpan</button>
      	</div>
      </form>
    </div>
  </div>
</div>


