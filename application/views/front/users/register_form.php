<div class="col-md-9">
	<?php
		if ($error != null) {
	?> 
			<div class="alert alert-danger" role="alert"> <?php echo $error ?> </div>
	<?php
		}
	?>

		<form method = "post">
			<div class="col-lg-6">
				<div class="form-group">
					<label>Gebruikersnaam</label>
				 	<input type="text" name = "Username" class="form-control" value="<?php echo (isset($Username) ? $Username : "");?>">
				</div>
				<div class="form-group">
					<label>Email</label>
				 	<input type="email" name = "Email" class="form-control" value="<?php echo (isset($Email) ? $Email : "");?>">
				</div>
				<div class="form-group">
					<label>Herhaal Email</label>
				 	<input type="email" name = "Email" class="form-control" value="<?php echo (isset($Email) ? $Email : "");?>">
				</div>
			</div>
			<div class="col-lg-6">

				<div class="form-group">
					<label>Geboortedatum</label>
				 	<input type="text" id="date" name = "Birthdate" class="form-control" value="<?php echo (isset($Birthdate) ? $Birthdate : "");?>">
				</div>
				
				<?php 
					if(! isset($Gender)){
				?>
						<div class="form-group">
							<label>Geslacht</label>	      
						    <select class="form-control" name="Gender">
						        <option value="1">Man</option>
						        <option value="0">Vrouw</option>
						    </select>
						</div>
				<?php
					}
				?>

				<button class="btn btn-success pull-right" type="submit"> <?php echo (isset($Username) ? "Wijzigen" : "Registreren");?> </button>
			</div>
		</form>
		
</div>
<script>
  $(function() {
    $( "#date" ).datepicker({
      changeMonth:	true,
      changeYear:	true,
      yearRange:	("-100:+0"),
      minDate:		("-100Y"),
      maxDate:		("+0D")
    });
  });
  </script>
