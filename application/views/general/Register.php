<div class="container" style="margin-top: 10%;">
	<div class="row">
		<div class="col-md-12">
			<form action="" method="post">
				<div class="card">
					<div class="card-header">
						<h3>🕌 Register</h3>
					</div>
					<div class="card-body">
						<div class="form-group">
						  <label for="">Username</label>
						  <input type="text" name="" id="" class="form-control" placeholder="Masukkan Username yang akan digunakan">
						</div>
						<div class="form-group">
						  <label for="">Password</label>
						  <input type="password" name="" id="" class="form-control" placeholder="Masukkan Password">
						</div>
						<div class="form-group">
						  <label for="">Name</label>
						  <input type="text" name="" id="" class="form-control" placeholder="Masukkan nama asli anda">
						</div>
						<div class="form-group">
						  <label for="alamat">Alamat</label>
						  <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Masukkan alamat anda"></textarea>
						</div>
						<small id="helpId" class="text-muted">
							<a href="<?= base_url();?>general/login">Sudah punya akun ?</a>
						</small>
					</div>
					<div class="card-footer text-muted">
						<button type="submit" class="btn btn-primary mr-2">
							Daftar
						</button>
						<button type="reset" class="btn btn-danger">Cancel</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
