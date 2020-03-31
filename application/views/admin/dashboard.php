  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<div class="content-header">
  		<div class="container-fluid">
  			<div class="row mb-2">
  				<div class="col-sm-6">
  					<h1 class="m-0 text-dark">Dashboard</h1>
  				</div><!-- /.col -->
  				<div class="col-sm-6">
  					<ol class="breadcrumb float-sm-right">
  						<li class="breadcrumb-item active">Dashboard</li>
  					</ol>
  				</div><!-- /.col -->
  			</div><!-- /.row -->
  		</div><!-- /.container-fluid -->
  	</div>
  	<!-- /.content-header -->

  	<!-- Main content -->
  	<section class="content">
  		<div class="container-fluid">
  			<!-- Small boxes (Stat box) -->
  			<div class="row">
  				<div class="col-lg-3 col-6">
  					<!-- small box -->
  					<div class="small-box bg-info">
  						<div class="inner">
  							<h3>
  								<?php $query = $this->db->query('select*from aktifitas');
								echo $query->num_rows($query)?>
  							</h3>

  							<p>Aktivitas</p>
  						</div>
  						<div class="icon">
  							<i class="fas fa-tasks"></i>
  						</div>
  						<a href="<?= base_url('admin/aktifitas') ?>" class="small-box-footer">Detail <i
  								class="fas fa-arrow-circle-right"></i></a>
  					</div>
  				</div>
  				<!-- ./col -->
  				<div class="col-lg-3 col-6">
  					<!-- small box -->
  					<div class="small-box bg-success">
  						<div class="inner">
  							<h3>
  								<?php $query = $this->db->query('select*from artikel');
								echo $query->num_rows($query)?>
  							</h3>

  							<p>Artikel</p>
  						</div>
  						<div class="icon">
  							<i class="fas fa-newspaper"></i>
  						</div>
  						<a href="<?= base_url('admin/artikel') ?>" class="small-box-footer">Detail <i
  								class="fas fa-arrow-circle-right"></i></a>
  					</div>
  				</div>
  				<!-- ./col -->
  				<div class="col-lg-3 col-6">
  					<!-- small box -->
  					<div class="small-box bg-warning">
  						<div class="inner">
  							<h3><?php $query = $this->db->query('select*from user');
								echo $query->num_rows($query)?></h3>

  							<p>User</p>
  						</div>
  						<div class="icon">
  							<i class="fas fa-users"></i>
  						</div>
  						<a href="<?= base_url('admin/user') ?>" class="small-box-footer">Detail <i
  								class="fas fa-arrow-circle-right"></i></a>
  					</div>
  				</div>
  				<!-- ./col -->
  				<div class="col-lg-3 col-6">
  					<!-- small box -->
  					<div class="small-box bg-danger">
  						<div class="inner">
  							<h3>3</h3>

  							<p>Peminjaman</p>
  						</div>
  						<div class="icon">
  							<i class="fas fa-book"></i>
  						</div>
  						<a href="<?= base_url('admin/peminjaman') ?>" class="small-box-footer">Detail <i
  								class="fas fa-arrow-circle-right"></i></a>
  					</div>
  				</div>
  				<!-- ./col -->
  			</div>
  			<!-- /.row -->
  			<!-- Main row -->

  			<!-- /.card-header -->

  			<!-- /.card-body -->

  			<div class="row">
  				<div class="col-md-6">
  					<div class="card">
  						<div class="card-header bg-secondary border-0">
  							<h3 class="card-title"><b>Aktifitas Yang Akan Datang</b></h3>
  							<div class="card-tools">
							  <span class="badge bg-info">NEW</span>
  							</div>
  						</div>
  						<div class="card-body table-responsive p-0">
  							<table class="table table-condensed table-valign-middle">  	
								<thead>
									<th>Nama Aktifitas</th>
									<th>Tanggal Mulai</th>
									<th>Tanggal berakhir</th>
								</thead>							
  								<tbody>
  									<tr>
  										<td>
  											Some Product
  										</td>
  										<td>$13 USD</td>
  										<td>
  											12,000 Sold
  										</td>
  									</tr>
  									<tr>
  										<td>
  											Another Product
  										</td>
  										<td>$29 USD</td>
  										<td>
  											123,234 Sold
  										</td>
  									</tr>
  									<tr>
  										<td>
  											Amazing Product
  										</td>
  										<td>$1,230 USD</td>
  										<td>
  											198 Sold
  										</td>
  									</tr>
  								</tbody>
  							</table>
  						</div>
  					</div>
  				</div>
  			</div>

  		</div>
  		<!-- /.card -->
  </div>
  <!-- /.card -->
  </section>
  <!-- right col -->
  </div>
