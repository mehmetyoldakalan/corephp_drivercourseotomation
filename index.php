<html>
<head>
	
	<title>sürücü kursu otomasyonu</title>
	<meta name="Abstract" content="Sitenizin özeti">
	<meta name="Author" content="Adınız, E-Posta Adresiniz"> 
	<meta name="Copyright" content="telif hakkı cümlesi">
	<meta name="description" content="Sitenizin içeriği hakkında geniş bilgi">	
	<meta name="keywords" content="kelime1 kelime2 kelime3 kelime4 kelime5"><!--sitenin anahtar kelimeleri-->
	<meta http-equiv="content-language" content="tr"><!--sitenin varsayılan dili -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="css/style.CSS"/>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	<style type="text/css">
		body{	
			text-decoration: none;
			background:url(https://hdqwalls.com/download/material-design-4k-2048x1152.jpg) fixed;
			}
	</style>
</head>
<body>
	
	<div class="container login-container">
		<div class="row">
			<div class="col-md-12 login-form-1">
				<h3>Personel giriş</h3>

				<form action="process" method="POST">
				<div class="form-group">
					<input type="text" required class="form-control" placeholder="Mail Adresi *" name="mail" value="" />
				</div>
				<div class="form-group">
					<input type="password" required class="form-control" placeholder="Parola *" name="parola" value="" />
				</div> 
				<center> 
				<div class="">
					<input type="submit" name="personelgiris" class="btnSubmit btn btn-success" value="Giriş" />
				</div>
				
				</center>
				
				</form>
			</div>
			
			<script>
		swal({
			title:"merhaba",
			text:"MAİL ADRESİ=test@gmail.com || PAROLA=test",
			icon:"success",
			button:"tamam"
		})
	</script>
	</div>
</div>
</body>
</html>
