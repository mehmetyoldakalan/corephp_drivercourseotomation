<?php
session_start();
ob_start();
require_once "db.php";
include "sessionControl.php";
$ucretSor=$db->prepare("SELECT * FROM ucretler");
$ucretSor->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
		<title></title>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/kursiyer.CSS"/>
	</head>
<body>
<?php
@$process=$_GET['process'];
switch ($process) {
    case 'updatePay':?>
        <table class="table table-hovertable">
					  <thead>
					    <tr>
					      <th>Ücret sınıfı</th>
					      <th>Ücret</th>
						  
					      
					      				      
						</tr>
					  </thead>
                      <?php
                     
                        $ucret_id=$_POST['ucret_id'];                        
                        $ucretler=$db->prepare("SELECT * FROM ucretler where ucret_id=:ucret_id");
                        $ucretler->execute(array(
                            'ucret_id'=>$ucret_id
                        ));
                        $ucret_yaz=$ucretler->fetch(PDO::FETCH_ASSOC);
                        
                      ?>
					  		
							
								 <tbody>
                                 <form action="process" method="POST">
							    <tr>
                                <input type="hidden" name="ucret_id" value="<?php echo $ucret_yaz['ucret_id'];?>">
                                  <td><input disabled type="text" value="<?php echo $ucret_yaz['ucret_sinif'];?>"></td>
								  <td><input type="number" name="ucret_miktar" value="<?php echo $ucret_yaz['ucret_miktar'];?>"></td>
                                  <td><button type="submit" name="ucret_guncelle" class="btn btn-success">Güncelle</button></td>
							    </tr>	
                                </form>    
							  </tbody>
							
							 
					  			
					  		
					   </table>
        <?php break;
    
   
   
   
                        
   default:?>   
	<div class="container">
					

					<div class="row">                  
						
                        <div style="float: right; margin-right: 5px; position: relative; ">
							<button style="width: 100px; margin-top: 30px;"onclick="window.location.href='anasayfa'"  type="button" class="btn btn-success btn-md">
					    	<i>anasayfa</i>
							</button><br>
                           
						</div>
				    <h1>Ücret Tablosu</h1>
					<div id="durum">
					
					</div>
					<?php
						if(isset($_GET['status'])){
							if ($_GET['status']=="quizdeleted") {
								?>
								<script>
									$("#durum").css('color','white').html("sınav başarıyla silindi").fadeIn(300).fadeOut(6000);
								</script>
								<?php
							}
							elseif ($_GET['status']=="quizadded") {
								?>
								<script>
									$("#durum").css('color','white').html("sınav başarıyla eklendi").fadeIn(300).fadeOut(6000);
								</script>
								<?php
							}
                            elseif ($_GET['status']=="emptyPay") {
								?>
								<script>
									$("#durum").css('color','red').html("ÜCRET BİLGİSİ BOŞ BIRAKILAMAZ!!!").fadeIn(300).fadeOut(10000);
								</script>
								<?php
							}
                            elseif ($_GET['status']=="updatesuccess") {
								?>
								<script>
									$("#durum").css('color','white').html("ücret bilgisi başarıyla güncellenmiştir").fadeIn(300).fadeOut(10000);
								</script>
								<?php
							}
						}
					?>
               
                    <table class="table table-hovertable">
					  <thead>
					    <tr>
                          <th>Ücret sınıfı</th>
						  <th>Ücret</th>   				      
					    </tr>
					  </thead>
					  <?php 
					  		while ($ucretYaz=$ucretSor->fetch(PDO::FETCH_ASSOC)) {?>
					  			<tbody>
							    <tr>
                                  <td><?php echo $ucretYaz['ucret_sinif'];?></td>
								  <td><?php echo $ucretYaz['ucret_miktar'];?></td>
							  	<form action="ucret-bilgileri?process=updatePay" method="POST"> 
							  		<input type="hidden" name="ucret_id" value="<?php echo $ucretYaz['ucret_id']; ?>">
							      <td><button name="ucretGuncelle" type="submit" class="btn btn-danger btn-md"><i>Güncelle</i></button>
							      </td>	
							  	</form>

							    </tr>	    
							  </tbody>
					  		<?php }
					   ?>
					   </table>
					</div>
					</div>




<?php break;}?>







</body>
</html>