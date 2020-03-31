<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Dokumentasi</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item active">Dokumentasi</li>
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
						<i class="fas fa-image"></i>
						Tambah Dokumentasi
					</div>
					<div class="col-6 mt-2">
						<a href="<?=base_url('admin/dokumentasi/index')?>" class="btn btn-warning btn-xs">
							<i class="fas fa-arrow-left"></i>
							Kembali
						</a>
					</div>


				</div>
				<div class="card-body">
					<form action="<?= base_url('admin/dokumentasi/add')?>" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group col-md-6">
									<label for="aktifitas_id">Aktifitas</label>
									<select name="aktifitas_id" class="form-control" id="aktifitas_id">
										<option value="">--- Pilih Aktifitas ---</option>
										<?php 
										foreach($all_aktifitas as $aktifita)
										{
											$selected = ($aktifita['aktifitas_id'] == $this->input->post('aktifitas_id')) ? ' selected="selected"' : "";

											echo '<option value="'.$aktifita['aktifitas_id'].'" '.$selected.'>'.$aktifita['nama'].'</option>';
										} 
										?>
									</select>
									<span class="text-danger"><?php echo form_error('aktifitas_id');?></span>
								</div>
								<div class="form-group col-md-6">
                                	<label>Gambar</label>
                                	<input type="file" name="gambar" class="form-control">
                            	</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 text-center">
								<button type="submit" class="btn btn-info mt-4 border"><i></i> Save</button>
								<button type="reset" class="btn btn-danger mt-4 border"><i class=""></i>Reset</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>





