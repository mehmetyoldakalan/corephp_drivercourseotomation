<?php
session_start();
ob_start();
include "db.php";
include "sessionControl.php";
?>


<html>
<head>
	<title>Sürücü kursu otomasyonu</title>
	<meta name="Abstract" content="Sitenizin özeti">
	<meta name="Author" content="Adınız, E-Posta Adresiniz"> 
	<meta name="Copyright" content="telif hakkı cümlesi">
	<meta name="description" content="Sitenizin içeriği hakkında geniş bilgi">	
	<meta name="keywords" content="kelime1 kelime2 kelime3 kelime4 kelime5"><!--sitenin anahtar kelimeleri-->
	<meta http-equiv="content-language" content="tr"><!--sitenin varsayılan dili -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>	
	<style>
		body{	
		text-decoration: none;
		background:url(https://hdqwalls.com/download/material-design-4k-2048x1152.jpg) fixed;
		}	
		span{
    	font-size:15px;
    	
		}
		a{
		  text-decoration:none; 
		  color: #282726;
		  border-bottom:2px solid #0062cc;

		}
		a:link{
			color: #282726;
			text-decoration: none;

		}
		a:hover{
			color:#282726;
			text-decoration: none;

		}
		
		.box{
		    padding:60px 0px;
		    margin-right:auto;

		}

		.box-part{
		    background:#FFF;
		    border-radius:0;
		    padding:60px 10px;
		    margin:30px 0px;

		}
		.text{
		    margin:20px 0px;
		}

		.fa{
		     color:#4183D7;
		}
	</style>
</head>


<body>
<div class="box">
					<div style="float: right; margin-right: 5px; ">
						<button style="width: 100px; margin-top: 30px;"onclick="window.location.href='ayarlar'"  type="button" class="btn btn-primary btn-md">
	    				<i>ayarlar</i>
					</button><br>
					
					<button style="width: 100px;margin-top: 5px;"onclick="window.location.href='logout.php'" type="button" class="btn btn-danger btn-md">
	    				<i>çıkış</i>
					</button>

					</div>
				
			    <div class="container">
			    	


			     	<div class="row">
						
						    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			               
								<a href="personel-info">
									<div class="box-part text-center">
			                        
			                        <i></i>
			                        
									<div class="title">
										<h4>Personel bilgileri</h4>
									</div>
			                        
									<div class="text">
										<span>Personel bilgilerini bu kısımdan görebilir ve yönetebilirsiniz</span>
									</div>
			                        
									
			                        
								 </div>
								 </a>
							</div>	 
						
						 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		               		<a href="kursiyer-info">
							<div class="box-part text-center">
		                        
		                        <i></i>
		                        
								<div class="title">
									<h4>Kursiyer bilgileri</h4>
								</div>
		                        
								<div class="text">
									<span>Kursiyer bilgilerini bu kısımdan görebilir ve yönetebilirsiniz</span>
								</div>
		                        
								
		                        
							 </div>
							 	</a>
						</div>	
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		               		<a href="kursiyer-odeme">
							<div class="box-part text-center">
		                        
		                        <i></i>
		                        
								<div class="title">
									<h4>Ödeme sayfası</h4>
								</div>
		                        
								<div class="text">
									<span>Bu kısımda kursiyerlerin kurs ödemelerini alabilirsiniz</span>
								</div>
		                        
								
		                        
							 </div>
							 	</a>
						</div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<a href="sinav-bilgileri">
							<div class="box-part text-center">
		                        
		                        <i></i>
		                        
								<div class="title">
									<h4>Sınav Bilgileri</h4>
								</div>
		                        
								<div class="text">
									<span>Sınav tarihlerini bu kısımdan görebilir ve güncelleme yapabilirsiniz</span>
								</div>						
		                        
							 </div>
							 </a>
						</div> 
						
						 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						 <a href="ucret-bilgileri">
							<div class="box-part text-center">
		                        
		                        <i></i>
		                        
								<div class="title">
									<h4>Ücret tablosu</h4>
								</div>
		                        
								<div class="text">
									<span>ücret tablosunu bu kısımdan görebilir ve güncelleme yapabilirsiniz</span>
								</div>
		                        
							 </div>
							 </a>
						</div>	 
						
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		                <a href="muhasebe">
							<div class="box-part text-center">
		                        
		                        <i></i>
		                        
								<div class="title">
									<h4>muhasebe bilgileri</h4>
								</div>
		                        
								<div class="text">
									<span>muhasebe bilgilerini bu kısımdan görebilir ve yönetebilirsiniz</span>
								</div>
		                        
								
		                        
							 </div>
							 </a>
						</div>	
                        
                            
								
		    		</div>
				</div>
</body>
</html>