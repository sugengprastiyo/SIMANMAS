<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Artikel</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item active">Artikel</li>
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
						Tambah Artikel
					</div>
					<div class="col-6 mt-2">
						<a href="<?=base_url('admin/artikel/index')?>" class="btn btn-warning btn-xs">
							<i class="fas fa-arrow-left"></i>
							Kembali
						</a>
					</div>


				</div>
				<div class="card-body">
					<form action="<?= base_url('admin/artikel/add')?>" method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group col-md-6">
								<label for="title">Judul</label>
								<input class="form-control" type="text" name="title"
									value="<?php echo $this->input->post('title'); ?>" />
								<span class="text-danger"><?php echo form_error('title');?></span>
							</div>
							<div class="form-group col-md-6">
                                <label>Thumbnail</label>
                                <input type="file" name="thumbnail" class="form-control">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="content">Konten</label>
                                    <textarea class="form-control" id="content" name="content"><?php echo $this->input->post('content'); ?></textarea>
                                <span class="text-danger"><?php echo form_error('content');?></span>
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


<script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
<script>
        CKEDITOR.replace( 'content', {
			height: 450,
            filebrowserUploadUrl: '<?= base_url('admin/artikel/upload_gambar')?>',
            filebrowserUploadMethod: "form"
		} );
</script>