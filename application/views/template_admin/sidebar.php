<nav class="main-header navbar navbar-expand navbar-white navbar-light">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
		</li>
		<!-- <li class="nav-item d-none d-sm-inline-block">
			<a href="index3.html" class="nav-link">Home</a>
		</li>
		<li class="nav-item d-none d-sm-inline-block">
			<a href="#" class="nav-link">Contact</a>
		</li> -->
	</ul>

	<!-- SEARCH FORM -->
	<!-- <form class="form-inline ml-3">
		<div class="input-group input-group-sm">
			<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
			<div class="input-group-append">
				<button class="btn btn-navbar" type="submit">
					<i class="fas fa-search"></i>
				</button>
			</div>
		</div>
	</form> -->

	<!-- Right navbar links -->
	<ul class="navbar-nav ml-auto">
		<!-- Notifications Dropdown Menu -->
		<li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#">
				<i class="far fa-bell"></i>
				<span class="badge badge-warning navbar-badge"></span>
			</a>
			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				<span class="dropdown-item dropdown-header">15 Notifications</span>
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item">
					<i class="fas fa-envelope mr-2"></i> 4 new messages
					<span class="float-right text-muted text-sm">3 mins</span>
				</a>
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item">
					<i class="fas fa-users mr-2"></i> 8 friend requests
					<span class="float-right text-muted text-sm">12 hours</span>
				</a>
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item">
					<i class="fas fa-file mr-2"></i> 3 new reports
					<span class="float-right text-muted text-sm">2 days</span>
				</a>
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
			</div>
		</li>
		<li class="nav-item dropdown user user-menu">
			<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
				<img src="<?= base_url('assets/template_adminlte/')?>dist/img/avatar5.png" class="user-image img-circle elevation-2 alt=" User Image">
				<span class="hidden-xs"><?= $this->fungsi->user_login()['nama'] ?></span>
			</a>
			<ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				<!-- User image -->
				<li class="user-header bg-secondary">
					<img src="<?= base_url('assets/template_adminlte/')?>dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">

					<p>
						<?= $this->fungsi->user_login()['nama'] ?>
						<small>Member since <?= date("M, Y",strtotime($this->fungsi->user_login()['created'])) ?></small>
					</p>
        </li>
        
				<!-- Menu Footer-->
				<li class="user-footer">
					<div class="float-right">
						<a href="<?= base_url('auth/logout') ?>" class="btn btn-default btn-flat"><i class="fas fa-sign-out-alt"></i> Sign out</a>
					</div>
				</li>
			</ul>
		</li>
	</ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="<?= base_url()?>" class="brand-link">
		<img src="<?= base_url('assets/template_adminlte/')?>dist/img/logo.png" alt="SIMANMAS"
			class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light ml-4">SIMANMAS</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?= base_url('assets/template_adminlte/')?>dist/img/avatar5.png" class="img-circle elevation-2"
					alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block"><?= $this->fungsi->user_login()['nama'] ?></a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="<?= base_url('admin/dashboard')?>" class="nav-link">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('admin/masjid')?>" class="nav-link">
						<i class="nav-icon fas fa-mosque"></i>
						<p>
							Data Masjid
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('admin/artikel') ?>" class="nav-link">
						<i class="nav-icon fas fa-newspaper"></i>
						<p>
							Artikel
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('admin/aktifitas') ?>" class="nav-link">
						<i class="nav-icon fas fa-tasks"></i>
						<p>
							Data Aktivitas
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('admin/dokumentasi') ?>" class="nav-link">
						<i class="nav-icon fas fa-image"></i>
						<p>
							Dokumentasi
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('admin/peminjaman') ?>" class="nav-link">
						<i class="nav-icon fas fa-book"></i>
						<p>
							Peminjaman
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('admin/user')?>" class="nav-link">
						<i class="nav-icon fas fa-user"></i>
						<p>
							User
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="pages/widgets.html" class="nav-link">
						<i class="nav-icon fas fa-clipboard-list"></i>
						<p>
							Laporan
						</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
