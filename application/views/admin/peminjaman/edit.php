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
						<i class="fas fa-user"></i>
						Edit Data Masjid
					</div>
					<div class="col-6 mt-2">
						<a href="<?=base_url('admin/peminjaman/index')?>" class="btn btn-warning btn-xs">
							<i class="fas fa-arrow-left"></i>
							Kembali
						</a>
					</div>


				</div>
				<div class="card-body">
					<?php echo form_open('admin/peminjaman/edit/'.$peminjaman['peminjaman_id']); ?>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="start_date">Start Date</label>
								<input type="hidden" name="peminjaman_id" value="<?= $peminjaman_id=$peminjaman['peminjaman_id']?>">
								<input class="form-control" type="date" name="start_date" value="<?php echo ($this->input->post('start_date') ? $this->input->post('start_date') : $peminjaman['start_date']); ?>" />
								<span class="text-danger"><?php echo form_error('start_date');?></span>
							</div>
							<div class="form-group">
								<label for="end_date">End Date</label>
								<input class="form-control" type="date" name="end_date" value="<?php echo ($this->input->post('end_date') ? $this->input->post('end_date') : $peminjaman['end_date']); ?>" />
								<span class="text-danger"><?php echo form_error('end_date');?></span>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label for="status">Status</label>
								<input class="form-control" type="text" name="status" value="<?php echo ($this->input->post('status') ? $this->input->post('status') : $peminjaman['status']); ?>" />
								<span class="text-danger"><?php echo form_error('status');?></span>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 text-center">
							<button type="submit" class="btn btn-info mt-4 border"><i></i> Save</button>
                            <button type="reset" class="btn btn-danger mt-4 border"><i class=""></i>Reset</button>
						</div>
					</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</section>
</div>



<?php echo form_open('peminjaman/edit/'.$peminjaman['peminjaman_id']); ?>

	<div>
		Start Date : 
		<input type="text" name="start_date" value="<?php echo ($this->input->post('start_date') ? $this->input->post('start_date') : $peminjaman['start_date']); ?>" />
	</div>
	<div>
		End Date : 
		<input type="text" name="end_date" value="<?php echo ($this->input->post('end_date') ? $this->input->post('end_date') : $peminjaman['end_date']); ?>" />
	</div>
	<div>
		Status : 
		<input type="text" name="status" value="<?php echo ($this->input->post('status') ? $this->input->post('status') : $peminjaman['status']); ?>" />
	</div>
	
	<button type="submit">Save</button>
	
<?php echo form_close(); ?>