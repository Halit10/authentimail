<div class="col-md-9" style="text-allign:center">
	<?php 
		if ($error) {
	?>
			<div class="alert alert-danger">
				<p><?php echo $error ?> </p>
			</div>
	<?php 
		}
	?>	

		<form method = "post">
			<div class="col-lg-3"></div>
			<div class="col-lg-6">
				<div class="form-group">
					<label>Email</label>
				 	<input type="text" name = "email" class="form-control">
				</div>
				<button class="btn btn-success pull-right" type="submit"> Login </button>
			</div>
		

				
			</div>
		</form>
</div>