<!-- Begin Page Content -->
        <div class="container-fluid">

          <?= $this->session->flashdata('message'); ?>
			

			<div class="card shadow-sm border-bottom-success">
			    <div class="card-header bg-white py-3">
			        <div class="row">
			            <div class="col">
			                <h1 class="h5 align-middle m-0 font-weight-bold text-success">
			                    Riwayat Data Barang Masuk
			                </h1>
			            </div>
			            <div class="col-auto">
			                <a href="<?= base_url('barangmasuk/add') ?>" class="btn btn-outline-primary">
			                    <span class="icon">
			                        <i class="fa fa-plus"></i>
			                    </span>
			                    <span class="text">
			                        Input Barang Masuk
			                    </span>
			                </a>
			            </div>
			        </div>
			    </div>
			    
			    <div class="card-body">
			    <div class="table-responsive">
			        <table class="table table-striped table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
			            <thead>
			                <tr>
			                    <th>No. </th>
			                    <th>No Transaksi</th>
			                    <th>Tanggal Masuk</th>
			                    <th>Nama Barang</th>
			                    <th>Jumlah Masuk</th>
			                    <th>Petugas</th>
			                    <th>Hapus</th>
			                </tr>
			            </thead>
			            <tbody>
			                <?php
			                $no = 1;
			                if ($barangmasuk) :
			                    foreach ($barangmasuk as $bm) :
			                        ?>
			                        <tr>
			                            <td><?= $no++; ?></td>
			                            <td><?= $bm['id_barang_masuk']; ?></td>
			                            <td><?= $bm['tanggal_masuk']; ?></td>
			                            <td><?= $bm['nama_brg']; ?></td>
			                            <td><?= $bm['jumlah_masuk'] . ' ' . $bm['nama_satuan']; ?></td>
			                            <td><?= $bm['name']; ?></td>
			                            <td>
			                                <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('barangmasuk/delete/') . $bm['id_barang_masuk'] ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
			                            </td>
			                        </tr>
			                    <?php endforeach; ?>
			                <?php else : ?>
			                    <tr>
			                        <td colspan="8" class="text-center">
			                            Data Kosong
			                        </td>
			                    </tr>
			                <?php endif; ?>
			            </tbody>
			        </table>
			    </div>
			  </div>
</div>
			
        
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

     