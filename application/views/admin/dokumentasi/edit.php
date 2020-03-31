<?php echo form_open('dokumentasi/edit/'.$dokumentasi['dokumentasi_id']); ?>

	<div>
		<span class="text-danger">*</span>Aktifita : 
		<select name="aktifitas_id">
			<option value="">select aktifita</option>
			<?php 
			foreach($all_aktifitas as $aktifita)
			{
				$selected = ($aktifita['aktifitas_id'] == $dokumentasi['aktifitas_id']) ? ' selected="selected"' : "";

				echo '<option value="'.$aktifita['aktifitas_id'].'" '.$selected.'>'.$aktifita['nama'].'</option>';
			} 
			?>
		</select>
		<span class="text-danger"><?php echo form_error('aktifitas_id');?></span>
	</div>
	<div>
		<span class="text-danger">*</span>Content Images : 
		<input type="text" name="content_images" value="<?php echo ($this->input->post('content_images') ? $this->input->post('content_images') : $dokumentasi['content_images']); ?>" />
		<span class="text-danger"><?php echo form_error('content_images');?></span>
	</div>
	
	<button type="submit">Save</button>
	
<?php echo form_close(); ?>