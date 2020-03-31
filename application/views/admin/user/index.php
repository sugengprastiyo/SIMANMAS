<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Data User</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item active">User</li>
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
                            List Data User
                        </div>
                        <div class="col-6 mt-2">
                            <a href="<?=base_url('admin/user/add')?>" class="btn btn-secondary btn-xs">
                                <i class="fas fa-plus"></i>
                                Tambah Data
                            </a>
                        </div>
                    
                
              </div>
              <div class="card-body">
              <table class="table table-striped table-bordered" id="datatables">
                  <thead>
                      <th>No</th>
                      <th>Username</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Type</th>
                      <th>Actions</th>
                  </thead>
                  <tbody>
                      
                      <?php 
                      $no=1;
                      foreach($user as $u){ ?>
                      <tr>
                          <td><?= $no++; ?></td>
                          <td><?php echo $u['username']; ?></td>
                          <td><?php echo $u['nama']; ?></td>
                          <td><?php echo $u['alamat']; ?></td>
                          <td><?php echo $u['type']; ?></td>
                          <td>
                              <div class="input-group-append justify-content-center">
                                  <a href="<?= base_url('admin/user/edit/'.$u['user_id']); ?>" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a>
                                  <a href="<?= base_url('admin/user/remove/'.$u['user_id']); ?>" onclick="return confirm('Yakin hapus data ?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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
