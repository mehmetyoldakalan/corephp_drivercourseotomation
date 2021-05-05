<?php
session_start();
ob_start();
require_once "db.php";
include "sessionControl.php";

						if (isset($_POST['odeme_ara'])) {
							$tarih=$_POST['odeme_tarih_ara'];
							$kasaSor=$db->prepare("SELECT * FROM kasa where odeme_tarih=:odeme_tarih");
							$kasaSor->execute(array(
								'odeme_tarih'=>$tarih
							));
							if ($kasaSor->rowCount()<=0) {
								$kasaSor=$db->prepare("SELECT * FROM kasa");
								$kasaSor->execute();
							}
						}
						else{
							$kasaSor=$db->prepare("SELECT * FROM kasa");
							$kasaSor->execute();
						}
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
    case 'giderEkle':?>
        <table class="table table-hovertable">
					  <thead>
				
                	    <tr>
					      
					      <th>Ücret tutarı</th>
						  <th>Ücret yöntemi</th>
						 
						  <th>Ücret tarihi</th>
						  <th>Ücret saati</th>
					      
					      				      
						</tr>
					  </thead>
                    
					  		
							
								 <tbody>
                                 <form action="process" method="POST">
							    <tr>
                                
                                  <td><input  type="text" name="odeme_tutar"placeholder="1200"></td>
								  <td><input  type="text" name="odeme_yontem" placeholder="kredi-karti/nakit"></td>
								  
								  <td><input disabled type="text" name="odeme_tarih"></td>
								  <td><input disabled type="text" name="odeme_saati"></td>
								  
                                  <td><button type="submit" name="gider_ekle" class="btn btn-success">Ekle</button></td>
							    </tr>	
                                </form>    
							  </tbody>
							
							 
					  			
					  		
					   </table>
        <?php break;
    
   
   
   
                        
   default:?>   
	<div class="container">
					

					<div class="row">                  
						<div style="float: right; margin-right: 5px; position: relative; ">
							<button style="width: 100px; margin-top: 30px;"onclick="window.location.href='muhasebe?process=giderEkle'"  type="button" class="btn btn-primary btn-md">
					    	<i>Gider ekle</i>
							</button><br>
                           
						</div>
                        <div style="float: right; margin-right: 5px; position: relative; ">
							<button style="width: 100px; margin-top: 30px;"onclick="window.location.href='anasayfa'"  type="button" class="btn btn-success btn-md">
					    	<i>anasayfa</i>
							</button><br>
                           
						</div>
						
				    <h1>Muhasebe Bilgileri</h1>
                    <div class="container">
                        <div class="row">
                            <div class="span">
                                <form method="POST" action="muhasebe" class="form-inline" >
                                    <input name="odeme_tarih_ara" type="text"  placeholder="YYYY-MM-DD" >                                    
                                    <button type="submit" name="odeme_ara" class="btn btn-success"> <i class="icon-search icon-white">Ödeme ara</i></button>
									<i class="icon-search icon-red">Lütfen sadece YYYY-MM-DD şeklinde tarih giriniz</i>
									
                                </form>
                            </div>
                        </div>
                    </div>
					<div id="durum">
			
					</div>
				
               
                    <table class="table table-hovertable">
					  <thead>
					    <tr>
                          <th>Ücret tutarı</th>
                          <th>Ücret yöntemi</th>
                          <th>Ücret türü</th>
                          <th>Ücret tarihi</th>
                          <th>Ücret saati</th>									      
					    </tr>
					  </thead>
					  <?php 
					  		while ($kasaYaz=$kasaSor->fetch(PDO::FETCH_ASSOC)) {?>
					  			<tbody>
							    <tr>
                                  <td><?php echo $kasaYaz['odeme_tutar'];?></td>
                                  <td><?php echo $kasaYaz['odeme_yontem'];?></td>
                                  <td><?php echo $kasaYaz['odeme_tur'];?></td>
                                  <td><?php echo $kasaYaz['odeme_tarih'];?></td>
                                  <td><?php echo $kasaYaz['odeme_saat'];?></td>
								  						  	

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