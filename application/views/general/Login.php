<div class="container">
	<div class="row">
		<div class="col">
			<div class="card" style="margin-top: 25%;">
				<div class="card-header">
					🕌Login
				</div>
				<div class="card-body">
					<form action="<?= base_url('auth/process') ?>" method="post">
						<div class="form-group">
						  <label for="username">Username</label>
						  <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username" aria-describedby="helpId">
						  <small id="helpId" class="text-muted"></small>
						</div>
						<div class="form-group">
						  <label for="password">Password</label>
						  <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" aria-describedby="helpId">
						  <small id="helpId" class="text-muted"></small>
						</div>
						<div>
							<button type="submit" name="login" class="btn btn-primary">Login</button>
							<a href="<?= base_url();?>general/Register" class="btn btn-secondary ml-3">Register</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
