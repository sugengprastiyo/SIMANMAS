<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Data Peminjaman</h1>
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
						<i class="fas fa-user"></i>
						Tambah Data Peminjaman
					</div>
					<div class="col-6 mt-2">
						<a href="<?=base_url('admin/peminjaman/index')?>" class="btn btn-warning btn-xs">
							<i class="fas fa-arrow-left"></i>
							Kembali
						</a>
					</div>


				</div>
				<div class="card-body">
                    <?php $today = date("Y-m-d") ?>
					<?php echo form_open('admin/peminjaman/add'); ?>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="start_date">Start Date</label>
								<input class="form-control" id="start_date" type="datetime-local" min="<?= $today ?>" name="start_date"
									value="<?php echo $this->input->post('start_date'); ?>" />
								<span class="text-danger"><?php echo form_error('start_date');?></span>
							</div>
                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input class="form-control" type="date" id="end_date" name="end_date"
                                    value="<?php echo $this->input->post('end_date'); ?>" />
                                <span class="text-danger"><?php echo form_error('end_date');?></span>
                            </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="status">Status</label>
								<input class="form-control" type="text" name="status"
									value="<?php echo $this->input->post('status'); ?>" />
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

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

                    <script>
                    $(document).ready(function(){
                        $("#start_date").change(function(){
                            var date = $("#start_date").val();
                            console.log(date);
                            document.getElementById('end_date').setAttribute("min", date);
                        });
                    });
                    </script>
				</div>
			</div>
		</div>
	</section>
</div>

