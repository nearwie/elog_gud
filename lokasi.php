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
						<a href="<?= base_url('lokasi/tambah');?>" class="btn btn-outline-dark" ><i class="fa fa-plus"></i> Tambah Lokasi</a>
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
				      <th scope="col" style="text-align: center;">ID Stasiun</th>
				      <th scope="col" style="text-align: center;">Nama Stasiun</th>
				      <th scope="col" style="text-align: center;">Alamat</th>
				      <th scope="col" style="text-align: center;">Kab/Kota</th>
				      <th scope="col" style="text-align: center;">Lat</th>
				      <th scope="col" style="text-align: center;">Lng</th>
				      <th scope="col" style="text-align: center;">Elevasi</th>
				      
				      
				    </tr>
				  </thead>
				  <tbody>
				  
				      
				      <?php $i = 1 + $this->uri->segment(3);  ?>
				  		<?php foreach ($lokasis as $a) :?>
				    <tr>
				      <th scope="row" style="text-align: center;"><?= $i;?></th>
				     
				      <td nowrap style="text-align: center;">
				      	
				      	<a href="<?php echo base_url('lokasi/edit/'.$a['id']) ?>" class="badge badge-success" > <i class="fas fa-edit"></i>Ubah </a>


				      	<a href="<?php echo base_url('lokasi/delete/'.$a['id']) ?>" onclick="javascript: return confirm('Apakah yakin menghapus')" class="badge badge-danger"> <i class="fas fa-trash-alt"></i>Hapus </a>

				      </td>
				      
				      <td><?= $a['id_sta'];?></td>
				      <td><?= $a['nama_sta'];?></td>
				      <td style="text-align: center;" ><?= $a['alamat'];?></td>
				      <td nowrap><?= $a['kab'];?></td>
				      <td style="text-align: center;"><?= $a['lat'];?></td>
				      <td style="text-align: center;"><?= $a['lng']; ?></td>
				      <td style="text-align: center;"><?= $a['elevasi']; ?></td>
				      
				     
				      
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

    