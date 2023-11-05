

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- <link rel="stylesheet" href="../css/bootstrap.min.css"> -->
	<script src="../js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("category").change(function(){
				var cid = $("#category").val();
				$.ajax({
					url: 'data.php',
					method: 'post',
					data: 'cid=' + cid
				}).done(function(brand){
					console.log(brand);
					brand = JSON.parse(brand);
					$('#brand').empty();
					books.forEach(function(book){
						$('#brand').append('<option>' + brand.name + '</option>')
					})
				})
			})
		})
	</script>
</head>
<body>
	<div class="container">
		<h1 class="text-center">Dependent Drop Down list In PHP/MySQL using jQuery & Ajax </h1>
		<hr>
		<div class="row">
		    <div class="col-md-6 col-md-offset-3">
				<form role="form" method="post" action="">
		        	<div class="row">
		                <div class="form-group">
		                    <label for="authors">category</label>
		                    <select class="form-control" id="authors" name="authors">
		                    	<option selected="" disabled="">Select category</option>
		                    	<?php 
		                    		// require 'data.php';
		                    		$category = loadAuthors();
		                    		foreach ($category as $category) {
		                    			echo "<option id='".$category['id']."' value='".$category['id']."'>".$category['name']."</option>";
		                    		}
		                    	 ?>
		                    </select>
		                </div>
		            </div>
		            <div class="row">
		                <div class="form-group">
		                    <label for="books">brand</label>
		                    <select class="form-control" id="brand" name="brand">
		                    	
		                    </select>
		                </div>
		            </div>
		        </form>
		    </div>
		</div>
	</div>
</body>
</html>
