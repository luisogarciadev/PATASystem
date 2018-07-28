<body>
	<script type="text/javascript" src="<?php echo base_url('js/bootstrap-filestyle.js'); ?>"> </script>
	<div class="container">
		
		<h1><?php echo $title; ?></h1>
		<form action="<?php echo base_url('PreRegister/PhotoUpload'); ?>" method="post" enctype="multipart/form-data">
			<input name="animalID" type="hidden" value="<?php echo $animalID; ?>">
			<input id="fileUp" name="fileUp" type="file" accept="image/*" capture="camera">
			<br>
			<input class="btn btn-primary" type="submit" value="Enviar foto">
			<br><br>
			<img id="imgup" class="img-responsive" src="#" alt="#">
			<br>
		</form>
	</div>
</body>
<style>
	#imgup {
		display: none;
	}
</style>
<script>
	$(function() {
		$("#fileUp").filestyle();
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();

		        reader.onload = function (e) {
		            $('#imgup').css('display', 'block').attr('src', e.target.result);
		        }

		        reader.readAsDataURL(input.files[0]);
		    }
		}

		$("#fileUp").change(function(){
		    readURL(this);
		});
	});
</script>