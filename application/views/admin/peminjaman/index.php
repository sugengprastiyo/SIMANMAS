<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Peminjaman</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item active">Peminjaman</li>
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
						<i class="fas fa-newspaper"></i>
						Data Peminjaman
					</div>
					<div class="col-6 mt-2">
						<a href="<?=base_url('admin/peminjaman/add')?>" class="btn btn-secondary btn-xs">
							<i class="fas fa-plus"></i>
							Tambah Peminjaman
						</a>
					</div>


				</div>
				<div class="card-body">
					<table class="table table-striped table-bordered" id="datatables">
						<thead>
                            <th>No</th>
							<th>User</th>
							<th>Start Date</th>
							<th>End Date</th>
							<th>Status</th>
							<th>Actions</th>
						</thead>
						<tbody>
                            <?php 
                            $no=1;
                            foreach($peminjaman as $pmj){ ?>
							<tr>								
								<td><?php echo $no ?></td>
								<td><?php echo $pmj['nama']; ?></td>
								<td><?php echo indo_date($pmj['start_date']); ?></td>
								<td><?php echo indo_date($pmj['end_date']); ?></td>
								<td><?php echo $pmj['status']; ?></td>
								<td>
                                    <div class="input-group-append justify-content-center">
                                        <a href="<?= base_url('admin/peminjaman/edit/'.$pmj['peminjaman_id']); ?>"
											class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a>
										<a href="<?= base_url('admin/peminjaman/remove/'.$pmj['peminjaman_id']); ?>"
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