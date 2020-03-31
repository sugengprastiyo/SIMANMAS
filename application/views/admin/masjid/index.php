<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Data Masjid</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item active">Masjid</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>


	<section class="content">
		<div class="container-fluid">
			<!-- COLOR PALETTE -->
			<div class="card">
				<div class="card-header">


					<div class="col-6">
						<i class="fas fa-mosque"></i>
						Data Masjid
					</div>
					<?php 
						$row = $this->db->query('select*from masjid');
						if($row->num_rows($row) == 0):
					?>
					<div class="col-6 mt-2">
						<a href="<?=base_url('admin/masjid/add')?>" class="btn btn-secondary btn-xs">
							<i class="fas fa-plus"></i>
							Tambah Data
						</a>
					</div>
					<?php endif ?>


				</div>
				<div class="card-body">
					<table class="table table-striped table-bordered">
						<thead>
							<th>Nama</th>
							<th>Alamat</th>
							<th>Ketua</th>
							<th>Dibangun</th>
							<th>Actions</th>
						</thead>
						<tbody>
                            <?php 
                            $no=1;
                            foreach($masjid as $m){ ?>
							<tr>								
								<td><?php echo $m['nama']; ?></td>
								<td><?php echo $m['alamat']; ?></td>
								<td><?php echo $m['ketua']; ?></td>
								<td><?php echo indo_date($m['dibangun']) ?></td>
								<td>
                                    <div class="input-group-append justify-content-center">
                                        <a href="<?= base_url('admin/masjid/edit/'.$m['masjid_id']); ?>"
											class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a>
										<a href="<?= base_url('admin/masjid/remove/'.$m['masjid_id']); ?>"
										onclick="return confirm('Yakin hapus data ?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                    </div>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
</div>
